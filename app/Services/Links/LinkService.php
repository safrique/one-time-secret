<?php

namespace App\Services\Links;

use App\Helpers\Interfaces\RandomStringInterface;
use App\Models\Secret;
use App\Services\Links\Interfaces\LinkInterface;

class LinkService implements LinkInterface
{
    private RandomStringInterface $randomStringService;

    public function __construct(RandomStringInterface $randomStringService)
    {
        $this->randomStringService = $randomStringService;
    }

    public function getNew()
    : string
    {
        $exists = true;
        $endpoint = config('secret_links.endpoint');
        $link = $endpoint;

        while ($exists) {
            $link = $endpoint . '/' . $this->randomStringService->get();
            $exists = Secret::where('link', $link)->exists();
        }

        return $link;
    }
}
