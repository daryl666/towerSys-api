<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/21
 * Time: 上午10:47
 */

namespace App\Api\Controllers;


use App\Api\Transformers\EventSiteCheckTransformer;
use Illuminate\Http\Request;
use App\Models\EventSiteCheck;

/**
 * Class EventSiteCheckController
 * @package App\Api\Controllers
 */
class EventSiteCheckController extends BaseController
{
    public function show(Request $request, $queryCondition)
    {
        if (!is_numeric($queryCondition)) {
            $params = $request->all();
            $eventSiteChecks = ($params['reqCheckStatus'] == 1) ? EventSiteCheck::reqUnchecked() : EventSiteCheck::reqChecked();
            if ($queryCondition != '湖北省') {
                $eventSiteChecks = $eventSiteChecks->where('region', $queryCondition);
            }
            $eventSiteChecks = $params['beginDate'] ? $eventSiteChecks->where('site_check_req_time', '>=', $params['beginDate'] . ' 00:00:00') : $eventSiteChecks;
            $eventSiteChecks = $params['endDate'] ? $eventSiteChecks->where('site_check_req_time', '<=', $params['endDate'] . ' 11:59:59') : $eventSiteChecks;
            if (!$eventSiteChecks) {
                return $this->response()->errorNotFound('not found');
            }
            $eventSiteChecks = $eventSiteChecks->get();
            if ($eventSiteChecks->count() >= 1) {
                return $this->collection($eventSiteChecks, new EventSiteCheckTransformer());
            } else {
                return null;
            }
        } else {
            $eventSiteChecks = EventSiteCheck::find($queryCondition);
            if (!$eventSiteChecks) {
                return $this->response()->errorNotFound('not found');
            }
            if (count($eventSiteChecks) == 1) {
                return $this->item($eventSiteChecks, new EventSiteCheckTransformer());
            } else {
                return null;
            }
        }
    }

    public function store(Request $request)
    {
        $siteCheck = $request->all();
        unset($siteCheck['token']);
        $siteCheckCreate = EventSiteCheck::create($siteCheck);
        if ($siteCheckCreate) {
            return $this->setCustomStatusCode('1011')->customResponse('create successful');
        } else {
            return $this->setCustomStatusCode('1010')->customResponse('create failed');
        }
    }

    public function update($id, Request $request)
    {
        $param = $request->all();
        switch ($param['updateType']) {
            case 1:
                $resultConfirm = EventSiteCheck::where('id', $id)->update([
                    'site_check_result' => transSiteCheckResult($request->site_check_result),
                    'site_check_req_check_status' => 2
                ]);
                if ($resultConfirm) {
                    return $this->setCustomStatusCode('1031')->customResponse('confirm result successful');
                } else {
                    return $this->setCustomStatusCode('1030')->customResponse('confirm result failed');
                }
                break;
            case 2:
                $siteCheckForm = $request->all();
                $updateReq = EventSiteCheck::where('id', $id)->update([
                    'site_check_result' => transSiteCheckResult($siteCheckForm['site_check_result']),
                    'site_check_req_time' => $siteCheckForm['site_check_req_time'],
                    'update_check_status' => 1,
                ]);
                if ($updateReq) {
                    return $this->setCustomStatusCode('1021')->customResponse('update request successful');
                } else {
                    return $this->setCustomStatusCode('1020')->customResponse('update request failed');
                }
                break;
            case 3:
                $siteCheckForm = $request->all();
                $updateCheck = EventSiteCheck::where('id', $id)->update([
                    'update_check_status' => $siteCheckForm['update_check_status'],
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