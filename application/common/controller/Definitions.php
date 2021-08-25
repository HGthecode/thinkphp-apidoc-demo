<?php


namespace app\common\controller;

use hg\apidoc\annotation\Param;
use hg\apidoc\annotation\Returned;
use hg\apidoc\annotation\Header;

/**
 * NotParse
 */
class Definitions
{
    /**
     * 获取分页数据列表的参数
     * @param("pageIndex",type="int",require=true,default="1",desc="查询页数")
     * @param("pageSize",type="int",require=true,default="20",desc="查询条数")
     * @returned("total",type="int",desc="总条数")
     */
    public function pagingParam(){}

    /**
     * 返回字典数据
     * @returned("id",type="int",desc="唯一id")
     * @returned("name",type="string",desc="字典名")
     * @returned("value",type="string",desc="字典值")
     */
    public function dictionary(){}

    /**
     * 获取一条数据明细
     * @param("id",type="int",require=true,desc="唯一id")
     */
    public function getInfo(){}

    /**
     * @header("Authorization",type="string",require=true,desc="身份票据")
     */
    public function auth(){}
}