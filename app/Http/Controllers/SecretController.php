<?php

namespace App\Http\Controllers;

use App\Services\Secrets\Interfaces\GetSecretInterface;
use App\Services\Secrets\Interfaces\StoreSecretInterface;
use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function create(Request $request, StoreSecretInterface $secretService)
    {
        return view('welcome', ['link' => $secretService->store($request->input('secret'))]);
    }

    public function read(string $key, GetSecretInterface $secretService)
    {
        $data = ($secret = $secretService->get($key)) ? ['secret' => $secret] : ['error' => $secret];
        return view('secret', $data);
    }
}
