<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/8/1
 * Time: 上午10:52
 */

namespace App\Api\Transformers;


use App\Models\EventTysysOs;
use League\Fractal\TransformerAbstract;

class EventTysysOsTransformer extends TransformerAbstract
{
    public function transform(EventTysysOs $eventTysysOs)
    {
        $item = [
            'id' => $eventTysysOs['id'],
            'month' => $eventTysysOs['month'],
            'region' => $eventTysysOs['region'],
            'bsc' => $eventTysysOs['bsc'],
            'station_code' => $eventTysysOs['station_code'],
            'station_name' => $eventTysysOs['station_name'],
            'station_level' => $eventTysysOs['station_level'],
            'origin_os_start_time' => $eventTysysOs['origin_os_start_time'],
            'origin_os_end_time' => $eventTysysOs['origin_os_end_time'],
            'proc_os_start_time' => $eventTysysOs['proc_os_start_time'],
            'proc_os_end_time' => $eventTysysOs['proc_os_end_time'],
            'os_time' => $eventTysysOs['os_time'],
        ];
        if ($eventTysysOs['fill_status'] == 2) {
            $item['os_reason'] = transOsReason($eventTysysOs['os_reason']);
            $item['os_detail'] = $eventTysysOs['os_detail'];
            $item['responsible_party'] = transResponsibleParty($eventTysysOs['responsible_party']);
        }
        return $item;
    }
}