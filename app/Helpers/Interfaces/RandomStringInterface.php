<?php

namespace App\Helpers\Interfaces;

interface RandomStringInterface
{
    function get(int $length = 10)
    : string;
}
