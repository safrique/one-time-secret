<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'secret',
        'delete_at',
    ];

    /**
     * Adds date to delete secret if not yet used
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::created(
            function ($secret) {
                $secret->update(['delete_at' => Carbon::now()->addDays(7)]);
            }
        );
    }
}
