<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 下午2:44
 */

namespace App\Api\Controllers;


use App\Api\Transformers\PriceSiteTransformer;
use App\Models\PriceSite;

class PriceSiteController extends BaseController
{
    public function index()
    {
        $priceSite = PriceSite::all();
        if (!$priceSite) {
            return $this->response()->errorNotFound('not found');
        }
        if ($priceSite->isEmpty()) {
            return null;
        } else {
            return $this->collection($priceSite, new PriceSiteTransformer());
        }
    }
}