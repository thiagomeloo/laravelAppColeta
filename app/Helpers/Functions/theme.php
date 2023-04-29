<?php

use App\Helpers\ThemeHelper;

if(!function_exists('getTheme')){
    function getTheme(){
        return ThemeHelper::getTheme();
    }
}

if(!function_exists('setTheme')){
    function setTheme(string $theme){
        ThemeHelper::setTheme($theme);
    }
}

if(!function_exists('getThemeColors')){
    function getThemeColors(){
        return ThemeHelper::getThemeColors();
    }
}



