<?php

namespace App\Services\Secrets\Interfaces;

interface StoreSecretInterface
{
    public function store(string $secret);
}
