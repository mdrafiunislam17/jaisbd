<?php

use App\Models\Setting;


function getSetting($key, $default = null) {
    $settings = Setting::query()->pluck("value", "setting_name")->toArray();
    return $settings[$key] ?? $default;
}
