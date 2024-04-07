<?php


if (!function_exists('strConv')) {
    function strConv($strs) {
        // echo strlen($strs);
        $str = strip_tags($strs);
        return mb_substr($str, 0, 20, 'utf-8');
    }
}


