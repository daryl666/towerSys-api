<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 下午2:41
 */

namespace App\Api\Transformers;


use App\Models\PriceMaintain;
use League\Fractal\TransformerAbstract;

class PriceMaintainTransformer extends TransformerAbstract
{
    public function transform(PriceMaintain $priceMaintain)
    {
        return [
            'tower_type' => transTowerType($priceMaintain['tower_type']),
            'product_type' => transProductType($priceMaintain['product_type']),
            'is_new_tower' => transIsNewTower($priceMaintain['is_new_tower']),
            'price_maintain' => $priceMaintain['price_maintain'],
        ];
    }
}