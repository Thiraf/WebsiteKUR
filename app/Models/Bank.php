<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use HasFactory,  SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'name',
        'link',
        'code',
        'status',
        'reason_status',
        'logo',
    ];

    protected static function boot()
    {
        parent::boot();

        // Set UUID on boot.
        self::creating(function ($model) {
            $model->id = (string)  Str::uuid();
        });
    }

    public function creditRequests()
    {
        return $this->hasMany(CreditRequest::class, 'bank_id', 'id');
        // return $this->hasMany(CreditRequest::class, 'id', 'bank_id');
    }


}
