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
            $eventTysysOs = $params['beginDate'] ? $eventTysysOs->where('proc_os_end_time', '>=', $params['beginDate'] . ' 00:00:00') : $eventTysysOs;
            $eventTysysOs = $params['endDate'] ? $eventTysysOs->where('proc_os_end_time', '<=', $params['endDate'] . ' 11:59:59') : $eventTysysOs;
            if (!$eventTysysOs) {
                return $this->response()->errorNotFound('not found');
            }
            $eventTysysOs = $eventTysysOs->paginate(10);
            if ($eventTysysOs->count() >= 1) {
                return $this->response->paginator($eventTysysOs, new EventTysysOsTransformer());
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

    public function update($id, Request $request)
    {
        $param = $request->all();
        switch ($param['updateType']) {
            case 1:
                $osReasonFill = EventTysysOs::where('id', $id)->update([
                    'os_reason' => transOsReason($request->os_reason),
                    'responsible_party' => transResponsibleParty($request->responsible_party),
                    'os_detail' => $request->os_detail,
                    'fill_status' => 2
                ]);
                if ($osReasonFill) {
                    return $this->setCustomStatusCode('1031')->customResponse('fill os reason successful');
                } else {
                    return $this->setCustomStatusCode('1030')->customResponse('fill os reason failed');
                }
                break;
            case 2:
                $osReasonForm = $request->all();
                $updateReq = EventTysysOs::where('id', $id)->update([
                    'os_reason' => transOsReason($osReasonForm['os_reason']),
                    'responsible_party' => transResponsibleParty($osReasonForm['responsible_party']),
                    'os_detail' => $osReasonForm['os_detail'],
                    'update_check_status' => 1,
                ]);
                if ($updateReq) {
                    return $this->setCustomStatusCode('1021')->customResponse('update request successful');
                } else {
                    return $this->setCustomStatusCode('1020')->customResponse('update request failed');
                }
                break;
            case 3:
                $osReasonForm = $request->all();
                $updateCheck = EventTysysOs::where('id', $id)->update([
                    'update_check_status' => $osReasonForm['update_check_status'],
                ]);
                if ($updateCheck) {
                    return $this->setCustomStatusCode('1041')->customResponse('update check successful');
                } else {
                    return $this->setCustomStatusCode('1040')->customResponse('update check failed');
                }
                break;
            default:
                return null;
        }
    }

}