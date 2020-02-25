<?php

use App\Models\Component;
use Illuminate\Support\Facades\Cache;

if (!function_exists('component')) {

    /**
     * Get the value of component or return default
     *
     * @param $key
     * @param $default
     * @return mixed
     */
    function component($key, $default = null)
    {
        $globalCache = env('CACHE_DRIVER', 'file') === 'file' || env('CACHE_DRIVER', 'file') === 'database' ? false : true;
        if ($globalCache && Cache::tags('components')->has($key)) {
            return Cache::tags('components')->get($key);
        }

        $found = null;

        if ($globalCache) {
            // A key is requested that is not in the cache
            // this is a good opportunity to update all keys
            // albeit not strictly necessary
            Cache::tags('components')->flush();
            foreach (Component::all() as $component) {
                if ($component->key === $key) {
                    $found = $component->value;
                }

                Cache::tags('components')->forever($component->key, $component->value);
            }
        } else {
            $component = Component::where('key', $key)->first();
            if ($component) {
                $found = $component->value;
            }
        }

        return $found ?? $default;
    }
}
