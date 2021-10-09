<?php


namespace app\common\controller;

use hg\apidoc\annotation\Param;
use hg\apidoc\annotation\Returned;
use hg\apidoc\annotation\Header;
use hg\apidoc\annotation\Before;
use hg\apidoc\annotation\After;

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

    /**
     * @Before(event="setParam",key="hhh",value="555")
     * @Before(event="ajax",url="/admin/test/getFormToken",method="GET",contentType="appicateion-json",
     *    @Before(event="setParam",key="abc",value="params.phone"),
     *    @Before(event="setParam",key="cc",value="123456"),
     *    @After(event="setHeader",key="X-CSRF-TOKEN",value="res.data.data")
     * )
     * @After(event="setGlobalParam",key="hhh",value="res.data.data.name")
     */
    public function formTokenEvent(){}
}