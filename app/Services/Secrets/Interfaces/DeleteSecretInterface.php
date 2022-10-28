<?php

namespace App\Services\Secrets\Interfaces;

interface DeleteSecretInterface
{
    public function delete(string $key);
}
