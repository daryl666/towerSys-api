<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/8/2
 * Time: 上午10:42
 */

namespace App\Api\Transformers;


use App\Models\EventPowerGnr;
use League\Fractal\TransformerAbstract;

class EventPowerGnrTransformer extends TransformerAbstract
{
    public function transform(EventPowerGnr $eventPowerGnr)
    {
        $item = [
            'id' => $eventPowerGnr['id'],
            'region' => $eventPowerGnr['region'],
            'site_code' => $eventPowerGnr['site_code'],
            'gnr_req_time' => $eventPowerGnr['gnr_req_time'],
            'gnr_raise_side' => transGnrRaiseSide($eventPowerGnr['gnr_raise_side']),
            'gnr_status' => transGnrStatus($eventPowerGnr['gnr_status']),
        ];
        if ($eventPowerGnr['gnr_req_check_status'] == 2) {
            array_merge($item, [
                'gnr_result' => transGnrResult($eventPowerGnr['gnr_result']),
                'gnr_start_time' => $eventPowerGnr['gnr_start_time'],
                'gnr_stop_time' => $eventPowerGnr['gnr_stop_time'],
                'gnr_len' => $eventPowerGnr['gnr_len'],
                'fee_gnr' => $eventPowerGnr['fee_gnr'],
                'is_long' => $eventPowerGnr['is_long'],
                'is_short' => $eventPowerGnr['is_short'],
            ]);
        }
        return $item;
    }
}