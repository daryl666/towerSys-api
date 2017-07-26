<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/25
 * Time: 上午10:44
 */

namespace App\Api\Controllers;


use App\Api\Transformers\SiteOsTransformer;
use App\Http\Requests\Request;
use App\Models\SiteOs;

class SiteOsController extends BaseController
{
    public function show($queryCondition)
    {
        if (!is_numeric($queryCondition)) {
            if ($queryCondition == '湖北省') {
                $siteOs = SiteOs::unhandled()->orderBy('os_end_time', 'DESC')->get();
            } else {
                $siteOs = SiteOs::unhandled()->where('region', $queryCondition)->orderBy('os_end_time', 'DESC')->get();
            }
            if (!$siteOs) {
                return $this->response()->errorNotFound('not found');
            }
            if ($siteOs->isEmpty()) {
                return null;
            } else {
                return $this->collection($siteOs, new SiteOsTransformer());
            }
        } else {
            $siteOs = SiteOs::find($queryCondition);
            if (!$siteOs) {
                return $this->response()->errorNotFound('not found');
            }
            if ($siteOs->isEmpty()) {
                return null;
            } else {
                return $this->item($siteOs, new SiteOsTransformer());
            }
        }
    }

    public function update(Request $request, $id)
    {
        $param = $request->all();
        switch ($param['updateType']) {
            case 1:
                $reasonConfirm = SiteOs::where('id', $id)->update([
                    'os_reason' => transOsReason($request->os_reason),
                    'response_unit' => transRespUnit($request->response_unit),
                    'confirm_status' => 2
                ]);
                if ($reasonConfirm) {
                    return $this->setCustomStatusCode('1031')->customResponse('confirm os reason successful');
                } else {
                    return $this->setCustomStatusCode('1030')->customResponse('confirm os reason failed');
                }
                break;
            case 2:
                $osReasonForm = $request->all();
                $updateReq = SiteOs::where('id', $id)->update([
                    'os_reason' => transOsReason($osReasonForm['os_reason']),
                    'response_unit' => $osReasonForm['response_unit'],
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
                $updateCheck = SiteOs::where('id', $id)->update([
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