<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPowerGnr extends Model
{
    protected $table = 'event_power_gnr';

    public function scopeUnfilled($query)
    {
        return $query->where('gnr_req_check_status', 1);
    }

    public function scopeFilled($query)
    {
        return $query->where('gnr_req_check_status', 2);
    }

    public function scopeUnhandled($query)
    {
        return $query->where('update_check_status', 1);
    }

    public function scopeHandled($query)
    {
        return $query->where('update_check_status', '!=', 1);
    }

    public function scopeApproved($query)
    {
        return $query->where('update_check_status', 2);
    }

    public function scopeDenied($query)
    {
        return $query->where('update_check_status', 3);
    }
}
