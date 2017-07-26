<?php

namespace App\Http\Controllers;

use App\Models\SiteOrderCore;
use Illuminate\Http\Request;

use App\Http\Requests;

class SiteOrderController extends ApiController
{
    public function show($region, $id)
    {
        if ($id) {
            $siteOrders = SiteOrderCore::find($id);
        } else {
            if ($region == '湖北省') {
                $siteOrders = SiteOrderCore::all();
            } else {
                $siteOrders = SiteOrderCore::where('region', $region)->get();
            }
            if ($siteOrders->isEmpty()) {
                return $this->setStatusCode(403)->responseNotFound();
            }
        }

    }

}
