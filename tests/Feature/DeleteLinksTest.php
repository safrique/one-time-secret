<?php

namespace Tests\Feature;

use App\Models\Secret;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class DeleteLinksTest extends TestCase
{
    public function test_delete_links()
    {
        // Add a row to use for the test
        $secret = Secret::create([
            'link'   => 'some-test-link',
            'secret' => Crypt::encrypt('Some test data')
        ]);

        // Put the delete_at date in the past & run the delete command
        $secret->update(['delete_at' => Carbon::now()->addDays(-1)]);
        Artisan::call('secret:delete');

        $this->assertFalse($secret->exists());
    }
}
