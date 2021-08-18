<?php

namespace App\Http\View\Composers;

use App\Models\Option;
use Illuminate\View\View;

class OptionsComposer
{
    /**
     *
     * @var object $options
     */
    protected $options;

    public function __construct()
    {
        $this->options = Option::find(1);
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('options', $this->options);
    }
}
