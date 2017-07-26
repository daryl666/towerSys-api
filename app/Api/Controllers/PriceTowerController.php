<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 上午10:44
 */

namespace App\Api\Controllers;


use App\Api\Transformers\PriceTowerTransformer;
use App\Models\PriceTower;

class PriceTowerController extends BaseController
{
    public function index()
    {
        $priceTower = PriceTower::all();
        if (!$priceTower) {
            return $this->response()->errorNotFound('not found');
        }
        if ($priceTower->isEmpty()) {
            return null;
        } else {
            return $this->collection($priceTower, new PriceTowerTransformer());
        }
    }

}