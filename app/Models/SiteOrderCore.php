<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteOrderCore extends Model
{
    protected $table = 'site_order_core';
    protected $guarded = ['id'];
    public function scopeIsLatest($query)
    {
        return $query->where('is_latest', 1);
    }

    public function scopeIsValid($query)
    {
        return $query->where('is_valid', 1);
    }

}
