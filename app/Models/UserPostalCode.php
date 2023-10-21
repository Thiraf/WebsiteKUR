<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPostalCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'postal_code',
    ];

    protected static function boot()
    {
        parent::boot();

        // Set UUID on boot.
        // self::creating(function ($model) {
        //     $model->id = (string)  Str::uuid();
        // });
    }


}
