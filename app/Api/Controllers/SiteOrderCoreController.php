<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/11
 * Time: 下午6:01
 */

namespace App\Api\Controllers;


use App\Models\SiteOrderCore;
use App\Api\Transformers\SiteOrderCoreTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SiteOrderCoreController extends BaseController
{
    public function index()
    {
        $siteOrderCores = SiteOrderCore::all();
        return $this->collection($siteOrderCores, new SiteOrderCoreTransformer());
    }

    public function show($queryCondition)
    {
        if (is_numeric($queryCondition)) {
            $siteOrderCores = SiteOrderCore::find($queryCondition);
            if (!$siteOrderCores) {
                return $this->response->errorNotFound('not found');
            }
            return $this->item($siteOrderCores, new SiteOrderCoreTransformer());
        } else {
            if ($queryCondition == '湖北省') {
                $siteOrderCores = SiteOrderCore::isLatest()->get();
            } else {
                $siteOrderCores = SiteOrderCore::isLatest()->where('region', $queryCondition)->get();
            }
            if (!$siteOrderCores) {
                return $this->response->errorNotFound('not found');
            }
            if (!$siteOrderCores->isEmpty()) {
                return $this->collection($siteOrderCores, new SiteOrderCoreTransformer());
            } else {
                return null;
            }
        }
    }

    public function store(Request $request)
    {
        $siteOrder = $request->all();
        unset($siteOrder['token']);
        $siteOrderCore = SiteOrderCore::create($siteOrder);
        if ($siteOrderCore) {
            return $this->setCustomStatusCode(1011)->customResponse('create successful');
        } else {
            return $this->setCustomStatusCode(1010)->customResponse('create failed');
        }
    }

    public function update(Request $request, $id)
    {
        $siteOrder = $request->all();
        unset($siteOrder['token']);
        $siteOrderUpdate = SiteOrderCore::where('id', $id)->update(['is_latest' => 0]);
        if ($siteOrderUpdate === false) {
            return $this->setCustomStatusCode(1020)->customResponse('update failed');
        } else {
            $siteOrderCreate = SiteOrderCore::create($siteOrder);
            if (!$siteOrderCreate) {
                return $this->setCustomStatusCode(1020)->customResponse('update failed');
            } else {
                return $this->setCustomStatusCode(1021)->customResponse('update success');
            }
        }
    }

}
