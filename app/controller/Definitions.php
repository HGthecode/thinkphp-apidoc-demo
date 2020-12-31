<?php


namespace app\controller;


class Definitions
{
    /**
     * @title 获取分页数据列表的参数
     * @param name:pageIndex type:int require:0 default:0 desc:查询页数
     * @param name:pageSize type:int require:0 default:20 desc:查询条数
     */
    public function pagingParam(){}

    /**
     * @title 返回字典数据
     * @return name:id type:int desc:唯一id
     * @return name:name type:string desc:字典名
     * @return name:value type:string desc:字典值
     */
    public function dictionary(){}

    /**
     * @title 获取一条数据明细
     * @param name:id type:int require:1 default: desc:唯一id
     */
    public function getInfo(){}
}