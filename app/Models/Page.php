<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'title',
        'content',
        'img',
        'slug',
        'type',
        'category_news_id',
        'short_description',
	'url_yt'
    ];

    public function newscategory()
    {
        return $this->belongsTo('App\Models\NewsCategory', 'category_news_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Set UUID on boot.
        self::creating(function ($model) {
            $model->id = (string)  Str::uuid();
        });
    }


}
