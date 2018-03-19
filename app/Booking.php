<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class Booking extends Model
{
    protected $fillable = [
        'organisation', 'email', 'purpose', 'date_start', 'date_end', 'status', 'approved_by',
    ];

    protected $append = [
        'status_human',
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

    public function getStatusHumanAttribute()
    {
        $status = 'Pending';
        if ($this->status == 1) {
            $status = 'Approved';
        } elseif ($this->status == 2) {
            $status = 'Rejected';
        }
        return $status;
    }

    public function getAttachmentsAttribute()
    {
        return Attachment::where('booking_id', Hashids::decode($this->id)[0])->get();
    }
}
