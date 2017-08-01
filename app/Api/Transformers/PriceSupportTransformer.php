<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 下午2:53
 */

namespace App\Api\Transformers;


use App\Models\PriceSupport;
use League\Fractal\TransformerAbstract;

class PriceSupportTransformer extends TransformerAbstract
{
    public function transform(PriceSupport $priceSupport)
    {
        return [
            'tower_type' => transTowerType($priceSupport['tower_type']),
            'product_type' => transProductType($priceSupport['product_type']),
            'is_new_tower' => transIsNewTower($priceSupport['is_new_tower']),
            'price_support' => $priceSupport['price_support'],
        ];
    }
}