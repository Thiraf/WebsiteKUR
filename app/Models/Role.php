<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'name',
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
