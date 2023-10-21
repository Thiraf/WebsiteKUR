<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class KurType extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'name',
        'min_value',
        'max_value',
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
        return $this->hasMany(CreditRequest::class, 'kur_type_id', 'id');
    }

    // public function kur_type()
    // {
    //     return $this->belongsTo('App\KurType','kur_type_id');
    // }

}
