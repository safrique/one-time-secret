<?php

namespace App\Services\Secrets;

use App\Models\Secret;
use App\Services\Secrets\Interfaces\DeleteSecretInterface;
use App\Services\Secrets\Interfaces\GetSecretInterface;
use Illuminate\Support\Facades\Crypt;

class GetSecretService implements GetSecretInterface
{
    private DeleteSecretInterface $deleteService;

    public function __construct(DeleteSecretInterface $deleteService) { $this->deleteService = $deleteService; }

    /**
     * @param string $key
     *
     * @return false|string
     */
    public function get(string $key)
    {
        $secret = Secret::where('link', config('secret_links.endpoint') . '/' . $key)->first();

        if (!$secret) {
            return false;
        }

        $this->deleteService->delete($key);
        return Crypt::decrypt($secret->secret);
    }
}
