<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * Tests the welcome page API
     *
     * @return void
     */
    public function test_welcome_page_url()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
