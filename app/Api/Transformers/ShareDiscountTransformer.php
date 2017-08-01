<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/27
 * Time: 上午10:39
 */

namespace App\Api\Transformers;


use App\Models\ShareDiscount;
use League\Fractal\TransformerAbstract;

class ShareDiscountTransformer extends TransformerAbstract
{
    public function transform(ShareDiscount $shareDiscount)
    {
        return [
            'is_new_tower' => transIsNewTower($shareDiscount['is_new_tower']),
            'share_num' => $shareDiscount['share_num'],
            'user_type' => transUserType($shareDiscount['user_type']),
            'is_newly_added' => transIsNewlyAdded($shareDiscount['is_newly_added']),
            'discount_basic' => $shareDiscount['discount_basic'],
            'discount_site' => $shareDiscount['discount_site'],
            'discount_import' => $shareDiscount['discount_import'],
        ];
    }
}