<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/27
 * Time: 上午10:38
 */

namespace App\Api\Controllers;


use App\Api\Transformers\ShareDiscountTransformer;
use App\Models\ShareDiscount;

class ShareDiscountController extends BaseController
{

    public function index()
    {
        $shareDiscount = ShareDiscount::all();
        if (!$shareDiscount) {
            return $this->response()->errorNotFound('not found');
        }
        if ($shareDiscount->isEmpty()) {
            return null;
        } else {
            return $this->collection($shareDiscount, new ShareDiscountTransformer());
        }
    }
}