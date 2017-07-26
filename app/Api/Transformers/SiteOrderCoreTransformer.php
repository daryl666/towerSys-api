<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/11
 * Time: 下午6:05
 */

namespace App\Api\Transformers;


use App\Models\SiteOrderCore;
use League\Fractal\TransformerAbstract;

class SiteOrderCoreTransformer extends TransformerAbstract
{
    public function transform(SiteOrderCore $siteOrderCore)
    {
        return [
            'id' => $siteOrderCore['id'],
            'site_code' => $siteOrderCore['site_code'],
            'site_name' => $siteOrderCore['site_name'],
            'region' => $siteOrderCore['region'],
            'city' => $siteOrderCore['city'],
            'business_code' => $siteOrderCore['business_code'],
            'req_code' => $siteOrderCore['req_code'],
            'site_lng' => $siteOrderCore['site_lng'],
            'site_lat' => $siteOrderCore['site_lat'],
            'site_address' => $siteOrderCore['site_address'],
            'tower_type' => transTowerType($siteOrderCore['tower_type']),
            'product_type' => transProductType($siteOrderCore['product_type']),
            'sys_num' => (string)$siteOrderCore['sys_num'],
            'sys1_height' => transSysHeight($siteOrderCore['sys1_height']),
            'sys2_height' => transSysHeight($siteOrderCore['sys2_height']),
            'sys3_height' => transSysHeight($siteOrderCore['sys3_height']),
            'is_co_opetition' => transIsCoOpetition($siteOrderCore['is_co_opetition']),
            'share_num_house' => (string)$siteOrderCore['share_num_house'],
            'share_num_tower' => (string)$siteOrderCore['share_num_tower'],
            'share_num_support' => (string)$siteOrderCore['share_num_support'],
            'share_num_maintain' => (string)$siteOrderCore['share_num_maintain'],
            'share_num_site' => (string)$siteOrderCore['share_num_site'],
            'share_num_import' => (string)$siteOrderCore['share_num_import'],
            'is_newly_added' => transIsNewlyAdded($siteOrderCore['is_newly_added']),
            'site_district_type' => transSiteDistType($siteOrderCore['site_district_type']),
            'user_type' => transUserType($siteOrderCore['user_type']),
            'is_new_tower' => transIsNewTower($siteOrderCore['is_new_tower']),
            'elec_introduced_type' => transElecType($siteOrderCore['elec_introduced_type']),
            'land_form' => transLandForm($siteOrderCore['land_form']),
            'established_time' => $siteOrderCore['established_time'],
        ];
    }

}
