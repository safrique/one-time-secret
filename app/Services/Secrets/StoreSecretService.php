<?php

namespace App\Services\Secrets;

use App\Models\Secret;
use App\Services\Links\LinkService;
use App\Services\Secrets\Interfaces\StoreSecretInterface;
use Illuminate\Support\Facades\Crypt;

class StoreSecretService implements StoreSecretInterface
{
    private LinkService $linkService;

    public function __construct(LinkService $linkService) { $this->linkService = $linkService; }

    public function store(string $secret)
    : string {
        Secret::create([
            'link'   => ($link = $this->linkService->getNew()),
            'secret' => Crypt::encrypt($secret),
        ]);
        return $link;
    }
}
