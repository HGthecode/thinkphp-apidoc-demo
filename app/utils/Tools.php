<?php


namespace app\utils;


class Tools
{

    /**
     * 数据列表转换成树
     * @param  array   $dataArr   数据列表
     * @param  integer $rootId    根节点ID
     * @param  string  $pkName    主键
     * @param  string  $pIdName   父节点名称
     * @param  string  $childName 子节点名称
     * @return array  转换后的树
     */
    public function ListToTree($dataArr, $rootId = "", $pkName = 'id', $pIdName = 'pid', $childName = 'children')
    {
        $arr = [];
        foreach ($dataArr as $sorData)
        {
            if ($sorData[$pIdName] == $rootId)
            {
                $childs = $this->ListToTree($dataArr, $sorData[$pkName], $pkName, $pIdName,$childName);
                if (!empty($childs)){
                    $sorData[$childName] = $childs;
                }

                $arr[]               = $sorData;
            }
        }

        return $arr;
    }

    /**
     * 将tree树形数据转成list数据
     * @param  array  $arr        tree数据
     * @param  string $childName  子节点名称
     * @return array  转换后的list数据
     */
    public function TreeToList($arr,  $childName = 'children')
    {
        $array = array();
        foreach ($arr as $val) {
            $array[] = $val;
            if (isset($val[$childName])) {
                $children = $this->TreeToList($val[$childName], $childName);
                if ($children) {
                    $array = array_merge($array, $children);
                }
            }
        }
        return $array;
    }




}