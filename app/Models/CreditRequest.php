<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CreditRequest extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded = ['id'];

    protected $fillable = [
        'registration_number',
        'member_id',
        'business_type_id',
        'business_permit_id',
	    'npwp',
        'business_place_photo',
        'address_business_place',
        'regency_id',
        'district_id',
        'village',
        'postal_code',
        'kur_type_id',
        'amount',
        'tenor',
        'bank_id',
        'status',
        'reject_message',
        'pending_message',
        'process_by',
        'accepted_plafond',
        'pic_contact',
        'is_confirmed'
    ];


    public function pic()
    {
        return $this->belongsTo('App\User','pic_contact');
    }

    public function regency()
    {
        return $this->belongsTo('App\Regency','regency_id');
    }
    public function district()
    {
        return $this->belongsTo('App\District','district_id');
    }
    public function termin()
    {
        return $this->belongsTo('App\Termin','tenor');
    }
    public function member()
    {
        return $this->belongsTo('App\Member','member_id');
    }
    public function kur_type()
    {
        return $this->belongsTo('App\KurType','kur_type_id');
    }
    public function business()
    {
        return $this->belongsTo('App\BusinessType','business_type_id');
    }
    public function business_permit()
    {
        return $this->belongsTo('App\BusinessPermit','business_permit_id');
    }
    public function bank()
    {
        return $this->belongsTo('App\Bank','bank_id');
    }


    protected static function boot()
    {
        parent::boot();

        // Set UUID on boot.
        self::creating(function ($model) {
            $model->id = (string)  Str::uuid();
            $data = \DB::table('credit_requests')->where('created_at','>=',date('Y-m-01'))->where('created_at','<=',date('Y-m-t'))->count();

            $code = "PJ".date('y').date('m').(str_pad($data,4,0,STR_PAD_LEFT));
	    $model->registration_number = $code;
	 });

    }

}
