<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/26
 * Time: 下午2:55
 */

namespace App\Api\Controllers;


use App\Api\Transformers\PriceImportTransformer;
use App\Models\PriceImport;

class PriceImportController extends BaseController
{
    public function index()
    {
        $priceImport = PriceImport::all();
        if (!$priceImport) {
            return $this->response()->errorNotFound('not found');
        }
        if ($priceImport->isEmpty()) {
            return null;
        } else {
            return $this->collection($priceImport, new PriceImportTransformer());
        }
    }

}