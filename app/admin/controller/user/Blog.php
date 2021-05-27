<?php


namespace app\admin\controller\user;
use hg\apidoc\annotation as Apidoc;

/**
 * 多级路由测试
 * @package app\admin\controller\user
 */
class Blog
{
    /**
     * @Apidoc\Title("多级路由")
     * @Apidoc\Method("GET")
     * @Apidoc\Tag("测试 基础")
     * @Apidoc\Param("username", type="abc",require=true, desc="用户名" )
     * @Apidoc\Param("password", type="string",require=true, desc="密码" )
     * @Apidoc\Param("phone", type="string",require=true, desc="手机号" )
     * @Apidoc\Param("sex", type="int",default="1",desc="性别" )
     * @Apidoc\Returned("data", type="array", desc="返回数据",
     *     @Apidoc\Returned("id", type="int", desc="id"),
     * )
     */
    public function index()
    {
        return 'index';
    }
}