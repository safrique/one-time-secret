<?php

namespace Tests\Feature;

use App\Models\Secret;
use Tests\TestCase;

class LinkTest extends TestCase
{
    private string $testData = 'Some secret information to send';

    public function test_create_link()
    {
        $response = $this->post('/', ['secret' => $this->testData]);
        $link = $this->getResponseData($response, 'link');

        $response->assertSee($link);
    }

    /**
     * Tests using of the link as well as confirming that the link has been deleted after use
     */
    public function test_use_link()
    {
        $key = $this->getKeyFromLink($this->getLatestLink());
        $response = $this->get($uri = "/secret/$key");

        // Checks the secret data is displayed correctly
        $response->assertSee($this->testData);

        // Checks the secret has been deleted once used
        $response = $this->get($uri);

        $response->assertSee('The link you used is not operational.');
    }

    private function getResponseData($response, $key)
    {
        $data = $response->getOriginalContent()->getData();
        return $data[$key];
    }

    private function getLatestLink(){
        return Secret::latest()->first()->link;
    }

    private function getKeyFromLink(string $link){
        return str_ireplace(config('secret_links.endpoint') . '/', '', $link);
    }
}
