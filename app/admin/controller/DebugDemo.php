<?php
/**
 * dddd
 */

namespace app\admin\controller;

use app\admin\services\ApiDoc as ApiDocService;
use app\admin\services\AuthFunction;
use app\BaseController;
use app\Request;
use hg\apidoc\annotation as Apidoc;
use hg\apidoc\parseApi\ParseAnnotation;
use hg\apidoc\Utils;
use think\facade\App;
use think\facade\Lang;


/**
 * 调试事件与Mock
 * @Apidoc\Group("base")
 * @Apidoc\Sort(3)
 */
class DebugDemo extends BaseController
{

//    /**
//     * @Apidoc\Title ("调试时事件测试")
//     * @Apidoc\Url("/admin/debugDemo/eventTest")
//     * @Apidoc\Param("name",type="string",desc="姓名")
//     * @Apidoc\Param("phone",type="string",desc="电话")
//     * @Apidoc\Param("myValue",type="string",desc="我的临时请求头参数")
//     * @Apidoc\Before(event="setParam",key="jjjjj",value="6666")
//     * @Apidoc\Before(event="ajax",url="/admin/test/getFormToken",method="GET",contentType="appicateion-json",
//     *    @Apidoc\Before(event="setParam",key="abc",value="params.phone"),
//     *    @Apidoc\Before(event="setParam",key="cc",value="123456"),
//     *    @Apidoc\After(event="setHeader",key="X-CSRF-TOKEN",value="res.data.data")
//     * )
//     */
//    public function eventTest(Request $request){
//        $params = $request->param();
//        return show(0,"",$params);
//    }


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
    public function login(Request $request){
        $params = $request->param();
        $res = [
            'uid'=>1,
            'username'=>  $params['username'],
            'token' =>  "Bearer xxxxxxxx".uniqid()
        ];
        return show(0,"",$res);
    }


    /**
     * @Apidoc\Title ("表单token验证")
     * @Apidoc\Desc("在接口请求前通过事件发起一个请求，将该请求响应参数作为该接口的请求头/参数")
     * @Apidoc\Url("/admin/debugDemo/eventFormToken")
     * @Apidoc\Method("POST")
     * @Apidoc\Param("name",type="string",desc="姓名")
     * @Apidoc\Param("phone",type="string",desc="电话")
     * @Apidoc\Before(event="ajax",url="/admin/test/getFormToken",method="GET",contentType="appicateion-json",
     *    @Apidoc\Before(event="setParam",key="key",value="params.phone"),
     *    @Apidoc\Before(event="setParam",key="abc",value="123456"),
     *    @Apidoc\After(event="setHeader",key="X-CSRF-TOKEN",value="res.data.data")
     * )
     */
    public function eventFormToken(Request $request){
        $params = $request->param();
        $header = $request->header();
        $res = [
            "params"=>$params,
            "header"=>$header
        ];
        return show(0,"",$res);
    }


    /**
     * @Apidoc\Title ("调试时事件")
     * @Apidoc\Url("/admin/debugDemo/event")
     * @Apidoc\Param("name",type="string",desc="姓名")
     * @Apidoc\Param("phone",type="string",desc="性别")
     * @Apidoc\Param("myValue",type="string",desc="我的临时请求头参数")
     * @Apidoc\Before(event="setParam",key="abc",value="params.myValue")
     * @Apidoc\Before(event="clearParam",key="myValue")
     * @Apidoc\After(event="setGlobalHeader",key="myGHeader",value="res.data.data.abc",desc="我的全局Header参数")
     */
    public function event(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }


    /**
     * mock调试数据
     * @Apidoc\Url("/admin/debugDemo/mock")
     * @Apidoc\Method("POST")
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
    public function mock(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }


}