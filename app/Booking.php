<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class Booking extends Model
{
    protected $fillable = [
        'organisation', 'email', 'purpose', 'date', 'status', 'approved_by',
    ];

    protected $append = [
        'attachments'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'approved_by');
    }

    public function getIdAttribute($value)
    {
        return Hashids::encode($value);
    }

    public function getAttachmentsAttribute()
    {
        return Attachment::where('booking_id', Hashids::decode($this->id)[0])->get();
    }
}
