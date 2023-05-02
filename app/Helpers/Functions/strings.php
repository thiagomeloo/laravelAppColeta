<?php

if(!function_exists('string_without_accents')){
    function string_without_accents(string|array $strs){
        if(is_array($strs)){
            return array_map(function($str){
                return string_without_accents($str);
            }, $strs);
        }

        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $strs);

        return $str;
    }
}
