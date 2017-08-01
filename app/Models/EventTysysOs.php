<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventTysysOs extends Model
{
    protected $table = 'event_tysys_os';

    public function scopeUnfilled($query)
    {
        return $query->where('fill_status', 1);
    }

    public function scopeFilled($query)
    {
        return $query->where('fill_status', 2);
    }
}
