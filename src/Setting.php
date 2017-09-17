<?php

namespace Potato\Settings;


use Illuminate\Support\Facades\Cache;

class Setting
{
    /**
     * Laravel Eloquent Model
     * @var
     */
    protected $model;

    /**
     * Setting constructor.
     */
    public function __construct()
    {
        $this->model = new DatabaseSetting();
    }

    /**
     * @param string $key
     * @param string $value
     * @return mixed
     */
    public function set(string $key, string $value)
    {
        $setting = $this->model->updateOrCreate(
            ['setting_key'   => $key],
            ['setting_value' => $value]
        );

        if(Cache::has($key)) {
            Cache::forget($key);
        }

        Cache::forever($key, $value);

        return $setting;
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key)
    {
        if(Cache::has($key)) {
            return Cache::get($key);
        } else {
            $setting = $this->model->whereSettingKey($key)->first();

            if($setting) {
                return $setting->getAttribute('setting_value');
            }

            return null;
        }
    }
}