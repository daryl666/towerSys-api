<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 上午10:58
 */

namespace App\Api\Transformers;


use App\Models\PriceHouse;
use League\Fractal\TransformerAbstract;

class PriceHouseTransformer extends TransformerAbstract
{
    public function transform(PriceHouse $priceHouse)
    {
        return [
            'tower_type' => transTowerType($priceHouse['tower_type']),
            'product_type' => transProductType($priceHouse['product_type']),
            'is_new_tower' => transIsNewTower($priceHouse['is_new_tower']),
            'price_house' => $priceHouse['price_house'],
        ];
    }

}