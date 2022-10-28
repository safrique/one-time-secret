<?php

namespace App\Http\Controllers;

use App\Services\Secrets\Interfaces\SecretInterface;

class SecretController extends Controller
{
    public function create(string $secret, SecretInterface $secretService)
    {
        return view('link', ['link' => $secretService->create($secret)]);
    }

    public function read(string $key, SecretInterface $secretService)
    {
        if (!($secret = $secretService->read($key))) {
            return view('secret', ['error' => $secret]);
        }

        return view('secret', ['secret' => $secret]);
    }
}
