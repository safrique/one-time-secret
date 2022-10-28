<?php

namespace App\Services\Secrets;

use App\Models\Secret;
use App\Services\Links\LinkService;
use App\Services\Secrets\Interfaces\SecretInterface;
use Illuminate\Support\Facades\Crypt;

class SecretService implements SecretInterface
{
    private LinkService $linkService;

    public function __construct(LinkService $linkService) { $this->linkService = $linkService; }

    public function create(string $secret)
    : string {
        Secret::create([
            'link'   => ($link = $this->linkService->getNew()),
            'secret' => Crypt::encrypt($secret),
        ]);
        return $link;
    }

    public function delete(string $key)
    {
        Secret::where('link', config('secret_links.endpoint') . '/' . $key)->delete();
    }

    public function read(string $key)
    {
        $secret = Secret::where('link', config('secret_links.endpoint') . '/' . $key)->first();

        if (!$secret) {
            return false;
        }

        $this->delete($key);
        return Crypt::decryptString($secret->secret);
    }
}
