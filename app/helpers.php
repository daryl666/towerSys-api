<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/7/17
 * Time: 下午2:41
 */

/**
 * 账单状态字段映射
 */
if (!function_exists('transBillStatus')) {
    function transBillStatus($post_type)
    {
        $map = [
            0 => '未出账',
            1 => '已出账',
        ];

        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}
/**
 * 铁塔类型字段映射
 */
if (!function_exists('transTowerType')) {

    function transTowerType($post_type)
    {
        $map = [
            1 => '普通地面塔',
            2 => '景观塔',
            3 => '简易塔',
            4 => '普通楼面塔',
            5 => '楼面抱杆',
            '普通地面塔' => 1,
            '景观塔' => 2,
            '简易塔' => 3,
            '普通楼面塔' => 4,
            '楼面抱杆' => 5,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

if (!function_exists('transProductType')) {

    function transProductType($post_type)
    {
        $map = [
            1 => '铁塔+自有机房+配套',
            2 => '铁塔+租赁机房+配套',
            3 => '铁塔+一体化机柜+配套',
            4 => '铁塔+RRU拉远+配套',
            5 => '铁塔(无机房及配套)',
            '铁塔+自有机房+配套' => 1,
            '铁塔+租赁机房+配套' => 2,
            '铁塔+一体化机柜+配套' => 3,
            '铁塔+RRU拉远+配套' => 4,
            '铁塔(无机房及配套)' => 5,
            '铁塔(无机房及配套)' => 5,
            'RRU拉远' => 4,
            '无机房' => 5,
            '一体化机房' => 3,
            '一体化机柜' => 3,
            '自建彩钢板机房' => 1,
            '自建砖混机房' => 1,
            '其他机房' => 1,
            '租用机房' => 2,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*系统挂高字段定义*/
if (!function_exists('transSysHeight')) {
    function transSysHeight($post_type)
    {
        $map = [
            1 => 'H<20',
            2 => 'H<30',
            3 => '20<=H<25',
            4 => '25<=H<30',
            5 => '30<=H<35',
            6 => '35<=H<40',
            7 => '40<=H<45',
            8 => '45<=H<50',
            9 => '任意高度',
            'H<20' => 1,
            'H≤20' => 1,
            'H<30' => 2,
            'H≤30' => 2,
            '20<=H<25' => 3,
            '20≤H<25' => 3,
            '20≤H≤25' => 3,
            '25<=H<30' => 4,
            '25≤H<30' => 4,
            '25≤H≤30' => 4,
            '30<=H<35' => 5,
            '30≤H<35' => 5,
            '30≤H≤35' => 5,
            '35<=H<40' => 6,
            '35≤H<40' => 6,
            '35≤H≤40' => 6,
            '40<=H<45' => 7,
            '40≤H<45' => 7,
            '40≤H≤45' => 7,
            '45<=H<50' => 8,
            '45≤H<50' => 8,
            '45≤H≤50' => 8,
            '任意高度' => 9,
            '-' => 9,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*是否竞合站点字段定义*/
if (!function_exists('transIsCoOpetition')) {
    function transIsCoOpetition($post_type)
    {
        $map = [
            0 => '否',
            1 => '是',
            '否' => 0,
            '是' => 1,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*是否存在新增共享字段定义*/
if (!function_exists('transIsNewlyAdded')) {
    function transIsNewlyAdded($post_type)
    {
        $map = [
            0 => '否',
            1 => '是',
            '否' => 0,
            '是' => 1,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*共享类型字段定义*/
if (!function_exists('transShareNum')) {
    function transShareNum($post_type)
    {
        $map = [
            1 => '电信独享',
            1 => '电信独享',
            2 => '两家共享',
            3 => '三家共享',
            0 => '未知',
            '电信独享' => 1,
            '两家共享' => 2,
            '三家共享' => 3,
            '' => 0,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*站址所在地区类型字段定义*/
if (!function_exists('transSiteDistType')) {
    function transSiteDistType($post_type)
    {
        $map = [
            1 => '市区',
            2 => '城镇',
            3 => '农村',
            999 => '未知',
            '市区' => 1,
            '城镇' => 2,
            '农村' => 3,
            '' => 999,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*是否RRU拉远字段定义*/
if (!function_exists('transIsRRUAway')) {
    function transIsRRUAway($post_type)
    {
        $map = [
            0 => '否',
            1 => '是',
            '否' => 0,
            '是' => 1,
            'RRU拉远' => 1,
            '无机房' => 0,
            '一体化机房' => 0,
            '一体化机柜' => 0,
            '自建彩钢板机房' => 0,
            '自建砖混机房' => 0,
            '其他机房' => 0,
            '租用机房' => 0,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*用户类型字段定义*/
if (!function_exists('transUserType')) {
    function transUserType($post_type)
    {
        $map = [
            1 => '锚定用户',
            2 => '其他用户',
            3 => '原产权',
            4 => '既有共享',
            5 => '新增共享',
            6 => '其他',
            '锚定用户' => 1,
            '其他用户' => 2,
            '原产权' => 3,
            '原产权方' => 3,
            '既有共享' => 4,
            '新增共享' => 5,
            '其他' => 6,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*是否为新建站字段定义*/
if (!function_exists('transIsNewTower')) {
    function transIsNewTower($post_type)
    {
        $map = [
            0 => '否',
            1 => '是',
            '否' => 0,
            '是' => 1,
            '新建' => 1,
            '存量改造' => 0,
            '既有共享' => 0,
            '原产权方' => 0,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*引电类型字段定义*/
if (!function_exists('transElecType')) {
    function transElecType($post_type)
    {
        $map = [
            1 => '220V',
            2 => '380V',
            999 => '未知',
            '220V' => 1,
            '380V' => 2,
            '未知' => 999,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*覆盖地形字段定义*/
if (!function_exists('transLandForm')) {
    function transLandForm($post_type)
    {
        $map = [
            1 => '平原',
            2 => '山区',
            '平原' => 1,
            '山区' => 2,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*上站结果字段定义*/
if (!function_exists('transSiteCheckResult')) {
    function transSiteCheckResult($post_type)
    {
        $map = [
            1 => '失败',
            2 => '成功',
            '失败' => 1,
            '成功' => 2,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*退服原因字段定义*/
if (!function_exists('transOsReason')) {

    function transOsReason($post_type)
    {
        $map = [
            1 => '停电',
            2 => '电源设别',
            3 => '传输线路',
            4 => '传输设备',
            5 => '物业',
            6 => '核心网',
            7 => '高温',
            8 => '其他',
            9 => '局端',
            10 => '主设备',
            '停电' => 1,
            '电源设备' => 2,
            '传输线路' => 3,
            '传输设备' => 4,
            '物业' => 5,
            '核心网' => 6,
            '高温' => 7,
            '其他' => 8,
            '局端' => 9,
            '主设备' => 10,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

/*责任单位字段定义*/
if (!function_exists('transRespUnit')) {

    function transRespUnit($post_type)
    {
        $map = [
            1 => '铁塔',
            2 => '电信',
            3 => '移动',
            4 => '联通',
            '铁塔' => 1,
            '电信' => 2,
            '移动' => 3,
            '联通' => 4,
        ];
        if ($post_type === 'all') {
            return $map;
        }
        if (isset($map[$post_type])) {
            return $map[$post_type];
        }
        return '';
    }
}

