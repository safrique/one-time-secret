<?php

namespace App\Services\Secrets;

use App\Models\Secret;
use App\Services\Secrets\Interfaces\DeleteSecretInterface;

class DeleteSecretService implements DeleteSecretInterface
{
    public function delete(string $key)
    {
        Secret::where('link', config('secret_links.endpoint') . '/' . $key)->delete();
    }
}
