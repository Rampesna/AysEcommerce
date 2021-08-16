<?php

if (!function_exists('theme')) {
    function theme()
    {
        return \App\Models\Option::find(1)->theme;
    }
}

if (!function_exists('customer_theme')) {
    function customer_theme()
    {
        return \App\Models\Option::find(1)->customer_theme;
    }
}
