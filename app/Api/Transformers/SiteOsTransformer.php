<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/25
 * Time: 上午10:53
 */

namespace App\Api\Transformers;


use App\Models\SiteOs;
use League\Fractal\TransformerAbstract;

class SiteOsTransformer extends TransformerAbstract
{
    public function transform(SiteOs $siteOs)
    {
        $item = [
            'id' => $siteOs['id'],
            'region' => $siteOs['region'],
            'site_code' => $siteOs['site_name'],
            'os_start_time' => $siteOs['os_start_time'],
            'os_end_time' => $siteOs['os_end_time'],
            'os_time' => $siteOs['os_time'],
        ];
        if ($siteOs['os_reason']) {
            $item['os_reason'] = $siteOs['os_reason'];
        }
        if ($siteOs['response_unit']) {
            $item['response_unit'] = $siteOs['response_unit'];
        }
        return $item;
    }

}