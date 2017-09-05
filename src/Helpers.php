<?php

if( ! function_exists ('setting')) {

    function setting() {

        $setting = new Potato\Settings\Setting();

        if(func_num_args() == 1) {
            return $setting->get(func_get_arg(0));
        }

        if(func_num_args() == 2) {
            return $setting->set(func_get_arg(0), func_get_arg(1));
        }

        return $setting;
    }
}