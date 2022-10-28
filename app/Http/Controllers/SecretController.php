<?php

namespace App\Http\Controllers;

use App\Services\Secrets\Interfaces\SecretInterface;
use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function create(Request $request, SecretInterface $secretService)
    {
        return view('welcome', ['link' => $secretService->create($request->input('secret'))]);
    }

    public function read(string $key, SecretInterface $secretService)
    {
        $data = ($secret = $secretService->read($key)) ? ['secret' => $secret] : ['error' => $secret];
        return view('secret', $data);
    }
}
