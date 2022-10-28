<?php

namespace Tests\Unit;

use App\Helpers\RandomStringHelper;
use PHPUnit\Framework\TestCase;

class RandomStringTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_random_string_generation()
    {
        $randomString = (new RandomStringHelper())->get();
        $this->assertIsString($randomString);
    }
}
