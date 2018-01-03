<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class Attachment extends Model
{
    protected $fillable = [
        'booking_id', 'attachment',
    ];

    public function booking()
    {
        return $this->hasOne('App\Booking', 'id', 'booking_id');
    }

    public function getIdAttribute($value)
    {
        return Hashids::encode($value);
    }
}
