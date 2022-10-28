<?php

namespace App\Console\Commands;

use App\Models\Secret;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;

class DeleteSecretCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secret:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes expired commands';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    : int
    {
        try {
            if (($secrets = Secret::where('delete_at', '<', Carbon::now()))->exists()) {
                foreach ($secrets->get() as $secret) {
                    $secret->delete();
                }
            }
            return 0;
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
            return 1;
        }
    }
}
