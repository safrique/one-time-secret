<?php

namespace App\Services\Secrets\Interfaces;

interface GetSecretInterface
{
    /**
     * @param string $key
     *
     * @return string|false
     */
    public function get(string $key);
}
