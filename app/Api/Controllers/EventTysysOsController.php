<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/8/1
 * Time: 上午10:22
 */

namespace App\Api\Controllers;


use App\Api\Transformers\EventTysysOsTransformer;
use App\Models\EventTysysOs;
use Illuminate\Http\Request;


class EventTysysOsController extends BaseController
{
    public function show($queryCondition, Request $request)
    {
        if (!is_numeric($queryCondition)) {
            $params = $request->all();
            $eventTysysOs = ($params['fillStatus'] == 1) ? EventTysysOs::Unfilled() : EventTysysOs::Filled();
            if ($queryCondition != '湖北省') {
                $eventTysysOs = $eventTysysOs->where('bsc', 'like', '%' . $queryCondition . '%');
            }
            $eventTysysOs = isset($params['beginDate']) ? $eventTysysOs->where('proc_os_end_time', '>=', $params['beginDate'] . ' 00:00:00') : $eventTysysOs;
            $eventTysysOs = isset($params['endDate']) ? $eventTysysOs->where('proc_os_end_time', '<=', $params['endDate'] . ' 11:59:59') : $eventTysysOs;
            if (!$eventTysysOs) {
                return $this->response()->errorNotFound('not found');
            }
            $eventTysysOs = $eventTysysOs->get();
            if ($eventTysysOs->count() >= 1) {
                return $this->collection($eventTysysOs, new EventTysysOsTransformer());
            } else {
                return null;
            }
        } else {
            $eventTysysOs = EventTysysOs::find($queryCondition);
            if (!$eventTysysOs) {
                return $this->response()->errorNotFound('not found');
            }
            if (count($eventTysysOs) == 1) {
                return $this->item($eventTysysOs, new EventTysysOsTransformer());
            } else {
                return null;
            }
        }
    }
}