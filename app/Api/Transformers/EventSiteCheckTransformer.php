<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/21
 * Time: 下午2:17
 */

namespace App\Api\Transformers;


use App\Models\EventSiteCheck;
use League\Fractal\TransformerAbstract;

class EventSiteCheckTransformer extends TransformerAbstract
{

    public function transform(EventSiteCheck $eventSiteCheck)
    {
        $item = [
            'id' => $eventSiteCheck['id'],
            'site_code' => $eventSiteCheck['site_code'],
            'region' => $eventSiteCheck['region'],
            'type' => $eventSiteCheck['site_check_type'],
            'site_check_req_time' => $eventSiteCheck['site_check_req_time'],
        ];
        if ($eventSiteCheck['site_check_result'] != 0) {
            $item['site_check_result'] = transSiteCheckResult($eventSiteCheck['site_check_result']);
        }
        return $item;
    }

}