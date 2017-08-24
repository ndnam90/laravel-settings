<?php

if( ! function_exists ('setting')) {

    function setting() {

        $setting = new Potato\Settings\Setting();

        if(func_num_args()) {
            return $setting->get(func_get_arg(0));
        }

        return $setting;
    }
}