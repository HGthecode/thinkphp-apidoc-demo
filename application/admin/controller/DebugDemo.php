<?php
/**
 * dddd
 */

namespace app\admin\controller;

use app\common\controller\ApiBase;
use hg\apidoc\annotation as Apidoc;


/**
 * 调试事件与Mock
 * @Apidoc\Group("base")
 * @Apidoc\Sort(3)
 */
class DebugDemo extends ApiBase
{

    /**
     * @Apidoc\Title ("用户登录")
     * @Apidoc\Desc("通过调试时事件，自动将password转md5，请求响应后设置全局请求头参数的例子")
     * @Apidoc\Method("POST")
     * @Apidoc\Url("/admin/debugDemo/login")
     * @Apidoc\Param("username",type="string",desc="用户名")
     * @Apidoc\Param("password",type="string",desc="登录密码")
     * @Apidoc\Before(event="handleParam",key="md5",value="params.password")
     * @Apidoc\After(event="setGlobalHeader",key="Authorization",value="res.data.data.token",desc="用户登录Toekn")
     */
    public function login(){
        $params = $this->request->param();
        $res = [
            'uid'=>1,
            'username'=>  $params['username'],
            'token' =>  "Bearer xxxxxxxx".uniqid()
        ];
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title ("调试时事件")
     * @Apidoc\Author("大壮")
     * @Apidoc\Url("/admin/debugDemo/event")
     * @Apidoc\Param("name",type="string",desc="姓名")
     * @Apidoc\Param("phone",type="string",desc="性别")
     * @Apidoc\Param("myValue",type="string",desc="我的临时请求头参数")
     * @Apidoc\Before(event="setParam",key="abc",value="params.myValue")
     * @Apidoc\Before(event="clearParam",key="myValue")
     * @Apidoc\After(event="setGlobalHeader",key="myGHeader",value="res.data.data.myGHeader",desc="我的全局Header参数")
     * @Apidoc\After(event="setGlobalParam",key="myGParam",value="123456",desc="我的全局参数")
     */
    public function event(){
        return show(0,"",$this->request->param());
    }


    /**
     * mock调试数据
     * @Apidoc\Url("/admin/debugDemo/mock")
     * @Apidoc\Method("POST")
     * @Apidoc\Author("大壮")
     * @Apidoc\Param("number",type="int",mock="@integer(10, 100)")
     * @Apidoc\Param("boolean",type="boolean",mock="@boolean")
     * @Apidoc\Param("date",type="date",mock="@date")
     * @Apidoc\Param("time",type="time",mock="@time('H:m')")
     * @Apidoc\Param("time",type="datetime",mock="@datetime('yyyy-MM-dd HH:mm:ss')")
     * @Apidoc\Param("string",type="string",mock="@string")
     * @Apidoc\Param("name",type="string",mock="@cname")
     * @Apidoc\Param("text",type="string",mock="@cparagraph")
     * @Apidoc\Param("image",type="string",mock="@image('200x100')")
     * @Apidoc\Param("color",type="string",mock="@color")
     */
    public function mock(){
        return show(0,"",$this->request->param());
    }


}