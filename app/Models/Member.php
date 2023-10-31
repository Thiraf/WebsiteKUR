<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Member extends Authenticatable

{
    use HasFactory, Notifiable;

    public $incrementing = false;

    protected $fillable = [
        'full_name',
        'nik',
        'email',
        'password',
        'phone',
        'address',
        'second_phone',
        'gender',
        'dob',
        'forgot_token',
        'is_active',
        'is_blocked'
    ];


    public $appends = ['is_complete_submission'];

    protected static function boot()
    {
        parent::boot();

        // Set UUID on boot.
        self::creating(function ($model) {
            $model->id = (string)  Str::uuid();
        });
    }

    public function getIsCompleteSubmissionAttribute($data){
        if($this->is_blocked){
            $creditRequest = CreditRequest::where('member_id', $this->id)->count();

            if($creditRequest > 0){
                $activity = Activity::where('user_id', $this->id)->orderBy('created_at', 'DESC')->first();

                // INI DIKOMEN JD BS WKWKWKW MBOH KEKNYA CUMA BIAR GTW LAH

                // $activity_date = \Carbon\Carbon::parse($activity->created_at);
                // $now = \Carbon\Carbon::now();
                // $diff = $now->diffInDays($activity_date);

                // if($diff >= 30){
                //     return false;
                // }
                // else{
                //     return true;
                // }

                return true;
            }

            // return $creditRequest > 0 ? true : false;
        }else{
            return false;
        }

    }








}
