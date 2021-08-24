<?php

namespace App\Http\View\Composers;

use App\Models\Category\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    /**
     *
     * @var object $categories
     */
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::where('category_id', null)->get();
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
