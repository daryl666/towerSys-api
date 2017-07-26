<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EventSiteCheck
 * @package App\Models
 */
class EventSiteCheck extends Model
{
    /**
     * @var string
     */
    protected $table = 'event_site_check';
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeReqChecked($query)
    {
        return $query->where('site_check_req_check_status', 2);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeReqUnchecked($query)
    {
        return $query->where('site_check_req_check_status', 1);
    }
}
