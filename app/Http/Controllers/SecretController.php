<?php

namespace App\Http\Controllers;

class SecretController extends Controller
{
    public function read(string $key)
    {
        return view('secret', ['key' => $key]);
    }
}
