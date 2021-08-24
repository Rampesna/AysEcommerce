<?php

namespace App\Repositories\Customer;

use App\Contracts\Customer\ICustomerProductVariantOptionRepository;
use App\Models\Customer\Customer;
use App\Models\Customer\CustomerProductVariantOption;
use App\Models\Product\ProductVariantOption;
use App\Traits\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CustomerProductVariantOptionRepository implements ICustomerProductVariantOptionRepository
{
    use Response;

    public function index(\App\Http\Requests\Basket\IndexRequest $request)
    {
        $customer = Customer::where('token', $request->header('_token'))->first();
        return $this->success('Basket', $customer->getBasketAttribute());
    }

    public function add(\App\Http\Requests\Basket\AddRequest $request)
    {
        $customer = Customer::where('token', $request->header('_token'))->first();
        $customerProductVariantOption = CustomerProductVariantOption::where('customer_id', $customer->id)
            ->where('product_variant_option_id', $request->product_variant_option_id)
            ->first();

        if ($customerProductVariantOption) {
            $customerProductVariantOption->amount += 1;
        } else {
            $customerProductVariantOption = new CustomerProductVariantOption;
            $customerProductVariantOption->customer_id = $customer->id;
            $customerProductVariantOption->product_variant_option_id = $request->product_variant_option_id;
            $customerProductVariantOption->amount = 1;
        }
        $customerProductVariantOption->save();

        return $this->success('Successfully added', $customer->getBasketAttribute());
    }

    public function drop(\App\Http\Requests\Basket\DropRequest $request)
    {
        $customer = Customer::where('token', $request->header('_token'))->first();
        $customerProductVariantOption = CustomerProductVariantOption::where('customer_id', $customer->id)
            ->where('product_variant_option_id', $request->product_variant_option_id)
            ->first();

        if ($customerProductVariantOption) {
            if ($customerProductVariantOption->amount == 1) $customerProductVariantOption->delete();
            $customerProductVariantOption->amount -= 1;
            $customerProductVariantOption->save();
            return $this->success('Successfully dropped', $customer->getBasketAttribute());
        }

        return $this->error('Not found', 404);
    }

    public function remove(\App\Http\Requests\Basket\RemoveRequest $request)
    {
        $customer = Customer::where('token', $request->header('_token'))->first();
        $customerProductVariantOption = CustomerProductVariantOption::where('customer_id', $customer->id)
            ->where('product_variant_option_id', $request->product_variant_option_id)
            ->first();

        if ($customerProductVariantOption) {
            $customerProductVariantOption->delete();
            return $this->success('Successfully removed', null);
        }

        return $this->error('Not found', 404);
    }

    public function indexForWeb(\App\Http\Requests\Basket\IndexRequest $request)
    {
        $basket = Session::get('basket');
        return $this->success('Basket for web', $basket);
    }

    public function addForWeb(\App\Http\Requests\Basket\AddRequest $request)
    {
        if (!Session::has('basket')) Session::put('basket', []);

        $basket = Session::get('basket');

        $index = searchByValue($basket, 'product_variant_option_id', $request->product_variant_option_id);

        if ($index == -1) {
            $basket[] = [
                'product_variant_option_id' => $request->product_variant_option_id,
                'product_variant_option' => ProductVariantOption::with([
                    'product' => function ($product) {
                        $product->select(['id', 'long_name'])->with([
                            'images'
                        ]);
                    }
                ])->find($request->product_variant_option_id),
                'amount' => 1,
            ];
        } else {
            $basket[$index]['amount'] += 1;
        }

        Session::put('basket', $basket);

        return $this->success('Successfully added', null);
    }

    public function dropForWeb(\App\Http\Requests\Basket\DropRequest $request)
    {
        $basket = Session::get('basket');

        $index = searchByValue($basket, 'product_variant_option_id', $request->product_variant_option_id);

        unset($basket[$index]);

        Session::put('basket', $basket);

        return $this->success('Successfully dropped', null);
    }

    public function removeForWeb(\App\Http\Requests\Basket\RemoveRequest $request)
    {
        $basket = Session::get('basket');

        $index = searchByValue($basket, 'product_variant_option_id', $request->product_variant_option_id);

        unset($basket[$index]);

        Session::put('basket', $basket);

        return $this->success('Successfully dropped', null);
    }
}
