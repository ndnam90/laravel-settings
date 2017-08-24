<?php

namespace Potato\Settings;


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
        return $this->model->updateOrCreate(
            ['setting_key' => $key],
            ['setting_value' => $value]
        );
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key)
    {
        $setting = $this->model->whereSettingKey($key)->first();

        if ($setting) {
            return $setting->getAttribute('setting_value');
        }

        return null;
    }
}