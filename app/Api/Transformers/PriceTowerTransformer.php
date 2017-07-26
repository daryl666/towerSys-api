<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 上午10:50
 */

namespace App\Api\Transformers;


use App\Models\PriceTower;
use League\Fractal\TransformerAbstract;

class PriceTowerTransformer extends TransformerAbstract
{
    public function transform(PriceTower $priceTower)
    {
        return [
            'tower_type' => transTowerType($priceTower['tower_type']),
            'sys_height' => transSysHeight($priceTower['sys_height']),
            'is_new_tower' => transIsNewTower($priceTower['is_new_tower']),
            'price_tower' => $priceTower['price_tower'],
        ];
    }

}