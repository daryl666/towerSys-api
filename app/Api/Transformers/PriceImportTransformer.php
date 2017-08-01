<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 下午2:57
 */

namespace App\Api\Transformers;


use App\Models\PriceImport;
use League\Fractal\TransformerAbstract;

class PriceImportTransformer extends TransformerAbstract
{
    public function transform(PriceImport $priceImport)
    {
        return [
            'region' => $priceImport['region'],
            'elec_introduced_type' => transElecType($priceImport['elec_introduced_type']),
            'price_import' => $priceImport['price_import']
        ];
    }
}