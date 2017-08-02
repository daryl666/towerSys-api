<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 2017/8/1
 * Time: 下午3:02
 */

namespace App\Api\Paginator;


class Paginator
{
    public function paginate($currentPage, $items, $perPage = 10)
    {
        $currentPage = $currentPage <= 0 ? 1 : $currentPage;
        if (is_array($items)) {
            $item = array_slice($items, ($currentPage - 1) * $perPage, $perPage);
            $total = count($items);
            $totalPage = $total / $perPage;
        } else {
            $item = $items->slice(($currentPage - 1) * $perPage, $perPage);
            $total = $items->count();
            $totalPage = $total / $perPage;
        }
        return [$item, $total, $totalPage];
    }
}