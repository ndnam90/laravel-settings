<?php

namespace Potato\Settings;


use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/migrations' => database_path('migrations')
        ], 'migrations');
    }
}