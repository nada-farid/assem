<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;


if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return Setting::all();
        });

        $setting = $settings->where('key', $key)->first();

        return $setting == null ? $default : $setting->value;
    }
}