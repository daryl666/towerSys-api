<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/8/2
 * Time: 上午10:18
 */

namespace App\Api\Controllers;



use Illuminate\Http\Request;

class EventPowerGnrController extends BaseController
{
    public function show(Request $request, $queryCondition)
    {
        if (!is_numeric($queryCondition)) {
            $params = $request->all();

        }
    }
}