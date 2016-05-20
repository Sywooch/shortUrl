<?php

namespace app\components;

class UsefulFunctions
{
    private function __construct() {}

    static function addUrlScheme($url)
    {
        $scheme = 'http://';

        return parse_url($url, PHP_URL_SCHEME) === null ?
            $scheme . $url : $url;
    }
}