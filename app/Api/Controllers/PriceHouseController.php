<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 上午10:44
 */

namespace App\Api\Controllers;


use App\Api\Transformers\PriceHouseTransformer;
use App\Models\PriceHouse;

class PriceHouseController extends BaseController
{
    public function index()
    {
        $priceHouse= PriceHouse::all();
        if (!$priceHouse) {
            return $this->response()->errorNotFound('not found');
        }
        if ($priceHouse->isEmpty()) {
            return null;
        } else {
            return $this->collection($priceHouse, new PriceHouseTransformer());
        }
    }

}