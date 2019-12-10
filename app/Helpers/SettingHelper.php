<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

if (!function_exists('setting')) {

    /**
     * Get the value of setting or return default
     *
     * @param $key
     * @param $default
     * @return string
     */
    function setting($key, $default = null): string
    {
        $globalCache = env('CACHE_DRIVER', 'file') === 'file' || env('CACHE_DRIVER', 'file') === 'database' ? false : true;
        if ($globalCache && Cache::tags('settings')->has($key)) {
            return Cache::tags('settings')->get($key);
        }

        $found = null;

        if ($globalCache) {
            // A key is requested that is not in the cache
            // this is a good opportunity to update all keys
            // albeit not strictly necessary
            Cache::tags('settings')->flush();
            foreach (Setting::all() as $setting) {
                if ($setting->key === $key) {
                    $found = $setting->value;
                }

                Cache::tags('settings')->forever($setting->key, $setting->value);
            }
        } else {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                $found = $setting->value;
            }
        }

        return $found ?? $default;
    }
}
