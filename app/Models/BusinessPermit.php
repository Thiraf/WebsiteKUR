<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;


class BusinessPermit extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        parent::boot();

        // Set UUID on boot.
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
