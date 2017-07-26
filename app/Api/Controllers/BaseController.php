<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/11
 * Time: 下午6:00
 */

namespace App\Api\Controllers;


use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;

class BaseController extends Controller
{
    use Helpers;
    private $customStatusCode;

    /**
     * @return int
     */
    public function getCustomStatusCode()
    {
        return $this->customStatusCode;
    }

    /**
     * @param int $customStatusCode
     */
    public function setCustomStatusCode($customStatusCode)
    {
        $this->customStatusCode = $customStatusCode;
        return $this;
    }

    public function customResponse($message)
    {
        return \Response::json([
            'status_code' => $this->customStatusCode,
            'message' => $message
        ]);

    }
}