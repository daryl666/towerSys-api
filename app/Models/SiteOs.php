<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteOs extends Model
{
    protected $table = 'site_os';

    public function scopeUnhandled($query)
    {
        return $query->where('confirm_status', 1);
    }

    public function scopeHandled($query)
    {
        return $query->where('confirm_status', 2);
    }
}
