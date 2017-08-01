<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 下午2:45
 */

namespace App\Api\Transformers;


use App\Models\PriceSite;
use League\Fractal\TransformerAbstract;

class PriceSiteTransformer extends TransformerAbstract
{

    public function transform(PriceSite $priceSite)
    {
        return [
            'region' => $priceSite['region'],
            'site_district_type' => transSiteDistType($priceSite['site_district_type']),
            'is_rru_away' => transIsRRUAway($priceSite['is_rru_away']),
            'price_site' => $priceSite['price_site']
        ];
    }
}