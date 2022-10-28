<?php

namespace App\Helpers;

use App\Helpers\Interfaces\RandomStringInterface;

class RandomStringHelper implements RandomStringInterface
{
    /**
     * Returns a random string
     *  Borrowed & improved from https://stackoverflow.com/questions/4356289/php-random-string-generator
     *
     * @param int $length
     *
     * @return string
     */
    function get(int $length = 10)
    : string {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
