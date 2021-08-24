<?php

namespace App\Providers;

use App\Contracts\Customer\ICustomerProductVariantOptionRepository;
use App\Repositories\Customer\CustomerProductVariantOptionRepository;
use Illuminate\Support\ServiceProvider;

use App\Contracts\Auth\IAuthenticationRepository;
use App\Contracts\Auth\IOAuthRepository;
use App\Contracts\Cart\ICartItemRepository;
use App\Contracts\Cart\ICartRepository;
use App\Contracts\Product\IProductRepository;
use App\Contracts\Product\IProductVariantOptionRepository;
use App\Contracts\User\IUserRepository;

use App\Repositories\Auth\AuthenticationRepository;
use App\Repositories\Auth\OAuthRepository;
use App\Repositories\Cart\CartItemRepository;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductVariantOptionRepository;
use App\Repositories\User\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAuthenticationRepository::class, AuthenticationRepository::class);
        $this->app->bind(IOAuthRepository::class, OAuthRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IProductRepository::class, ProductRepository::class);
        $this->app->bind(ICartRepository::class, CartRepository::class);
        $this->app->bind(ICartItemRepository::class, CartItemRepository::class);
        $this->app->bind(IProductVariantOptionRepository::class, ProductVariantOptionRepository::class);
        $this->app->bind(ICustomerProductVariantOptionRepository::class, CustomerProductVariantOptionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
