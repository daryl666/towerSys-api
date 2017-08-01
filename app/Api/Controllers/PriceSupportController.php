<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 下午2:51
 */

namespace App\Api\Controllers;


use App\Api\Transformers\PriceSupportTransformer;
use App\Models\PriceSupport;

class PriceSupportController extends BaseController
{
    public function index()
    {
        $priceSupport = PriceSupport::all();
        if (!$priceSupport) {
            return $this->response()->errorNotFound('not found');
        }
        if ($priceSupport->isEmpty()) {
            return null;
        } else {
            return $this->collection($priceSupport, new PriceSupportTransformer());
        }

    }
}