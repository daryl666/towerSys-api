<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/8/2
 * Time: 上午10:18
 */

namespace App\Api\Controllers;


use App\Api\Transformers\EventPowerGnrTransformer;
use App\Models\EventPowerGnr;
use Illuminate\Http\Request;

class EventPowerGnrController extends BaseController
{
    public function show(Request $request, $queryCondition)
    {
        if (!is_numeric($queryCondition)) {
            $params = $request->all();
            $eventPowerGnr = $params['gnrReqCheckStatus'] == 1 ? EventPowerGnr::unfilled() : EventPowerGnr::filled();
            if (isset($params['updateCheckStatus'])) {
                $eventPowerGnr = $params['updateCheckStatus'] == 1 ? $eventPowerGnr->unhandled() : $eventPowerGnr;
                $eventPowerGnr = $params['updateCheckStatus'] == 2 ? $eventPowerGnr->approved() : $eventPowerGnr;
                $eventPowerGnr = $params['updateCheckStatus'] == 3 ? $eventPowerGnr->denied() : $eventPowerGnr;
            }
            $eventPowerGnr = $queryCondition != '湖北省' ? $eventPowerGnr->where('region', $params['region'])->paginate(10) : $eventPowerGnr->paginate(10);
            if (!$eventPowerGnr) {
                return $this->response()->errorNotFound('not found');
            }
            if ($eventPowerGnr->count() >= 1) {
                return $this->response->paginator($eventPowerGnr, new EventPowerGnrTransformer());
            } else {
                return null;
            }
        }
    }

    public function store(Request $request)
    {
        $powerGnr = $request->all();
        unset($powerGnr['token']);
        $powerGnrCreate = EventPowerGnr::create($powerGnr);
        if ($powerGnrCreate) {
            return $this->setCustomStatusCode('1011')->customResponse('create successful');
        } else {
            return $this->setCustomStatusCode('1010')->customResponse('create failed');
        }
    }
}