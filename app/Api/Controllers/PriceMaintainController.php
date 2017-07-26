<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 下午2:39
 */

namespace App\Api\Controllers;


use App\Api\Transformers\PriceMaintainTransformer;
use App\Models\PriceMaintain;

class PriceMaintainController extends BaseController
{

    public function index()
    {
        $priceMaintain = PriceMaintain::all();
        if (!$priceMaintain) {
            return $this->response()->errorNotFound('not found');
        }
        if ($priceMaintain->isEmpty()) {
            return null;
        } else {
            return $this->collection($priceMaintain, new PriceMaintainTransformer());
        }
    }

}