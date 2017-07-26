<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    protected $statusCode = 200;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function responseNotFound($message = 'Not Found')
    {
        return \Response::json([
            'status' => 'failed',
            'status_code' => $this->statusCode,
            'message' => $message
        ]);
    }


}
