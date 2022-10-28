<?php

namespace App\Services\Secrets\Interfaces;

interface SecretInterface
{
    public function create(string $secret);

    public function delete(string $key);

    public function read(string $key);
}
