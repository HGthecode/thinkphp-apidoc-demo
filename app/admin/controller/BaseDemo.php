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


/**
 * 基础示例
 * @Apidoc\Group("base")
 */
class BaseDemo extends BaseController
{

    /**
     * @Apidoc\Title("基础的注释方法")
     * @Apidoc\Desc("最基础的接口注释写法")
     * @Apidoc\Method("GET")
     * @Apidoc\Tag("测试 基础")
     * @Apidoc\Url("/admin/baseDemo/base")
     * @Apidoc\Param("username", type="abc",require=true, desc="用户名" )
     * @Apidoc\Param("password", type="string",require=true, desc="密码" )
     * @Apidoc\Param("phone", type="string",require=true, desc="手机号" )
     * @Apidoc\Param("sex", type="int",default="1",desc="性别" )
     * @Apidoc\Returned("data", type="array", desc="返回数据",
     *     @Apidoc\Returned("id", type="int", desc="id"),
     * )
     */
    public function base(){
        $res=(new ParseAnnotation())->renderApiData("admin");
        return show(0,"",$res);
    }

    /**
     * 直接定义多层结构的参数
     * @Apidoc\Desc("仅在一个方法注释中定义多层数据结构的参数")
     * @Apidoc\Url("/admin/baseDemo/completeParams")
     * @Apidoc\Param("info",type="object",desc="信息",
     *     @Apidoc\Param ("name",type="string",desc="姓名"),
     *     @Apidoc\Param ("sex",type="string",desc="性别"),
     *     @Apidoc\Param ("group",type="object",desc="所属组",
     *          @Apidoc\Param ("group_name",type="string",desc="组名"),
     *          @Apidoc\Param ("group_id",type="int",desc="组id"),
     *          @Apidoc\Param ("data1",type="object",ref="app\admin\services\ApiDoc\getUserList",desc="这里也可以用ref")
     *     )
     * )
     * @Apidoc\Returned("info",type="object",desc="信息",
     *     @Apidoc\Returned ("name",type="string",desc="姓名"),
     *     @Apidoc\Returned ("sex",type="string",desc="性别"),
     *     @Apidoc\Returned ("group",type="object",desc="所属组",
     *          @Apidoc\Returned ("group_name",type="string",desc="组名"),
     *          @Apidoc\Returned ("group_id",type="int",desc="组id"),
     *     )
     * )
     *
     * @Apidoc\Param("array_array_object",type="array",childrenType="array",desc="多层数组类型嵌套",
     *     @Apidoc\Param("arrObj",type="object",desc="多层数组子节点",
     *          @Apidoc\Param("name",type="string",desc="名称"),
     *          @Apidoc\Param("code",type="string",desc="编码"),
     *     ),
     * )
     * @Apidoc\Param("array_object_object",type="array",childrenType="object",desc="多层对象类型嵌套",
     *     @Apidoc\Param("arrObj",type="object",desc="多层数组子节点",
     *          @Apidoc\Param("name",type="string",desc="名称"),
     *          @Apidoc\Param("code",type="string",desc="编码"),
     *     ),
     * )
     * @Apidoc\Param("array_object",type="array",childrenType="object",desc="对象数组类型",
     *     @Apidoc\Param("name",type="string",desc="名称"),
     *     @Apidoc\Param("code",type="string",desc="编码"),
     * )
     * @Apidoc\Param("array_string",type="array",childrenType="boolean",desc="数组")
     */
    public function completeParams(){
        return [
            'total'=>0,
            'data'=>[]
        ];
    }

    /**
     * @Apidoc\Title("引入通用注释")
     * @Apidoc\Desc("引入通用注释所定义的通用参数")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/baseDemo/definitions")
     * @Apidoc\Method("GET")
     * @Apidoc\Header( ref="auth")
     * @Apidoc\Param("code",type="int", desc="独立的code")
     * @Apidoc\Param( ref="pagingParam")
     * @Apidoc\Param("page",type="object", ref="pagingParam",desc="分页参数")
     * @Apidoc\Returned("list", type="array",ref="dictionary", desc="字典列表")
     */
    public function definitions(){
        $list=[];
        $list[]=["id"=>1,"name"=>"名称","value"=>"hello apidoc"];
        return show(0,"",$list);
    }



    /**
     * @Apidoc\Title("引入逻辑层注释")
     * @Apidoc\Desc("引入业务逻辑层的注释参数")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/baseDemo/service")
     * @Apidoc\Method("GET")
     * @Apidoc\Param(ref="app\admin\services\ApiDoc\getUserInfo")
     * @Apidoc\Returned("userInfo",type="object",ref="app\admin\services\ApiDoc\getUserList")
     */
    public function service(){
        $res = (new ApiDocService())->getUserInfo();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("引入模型注释")
     * @Apidoc\Desc("param参数为直接引用模型参数；return则是引用逻辑层，通过逻辑层引用模型参数")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/baseDemo/model")
     * @Apidoc\Method("GET")
     * @Apidoc\Param(ref="app\model\User\getInfo")
     * @Apidoc\Returned("userList",type="array",ref="app\model\User\getInfo")
     */
    public function model(){
        $res = (new ApiDocService())->getUserList();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\title("树形数据结构")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/baseDemo/tree")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("roleData",type="tree", ref="app\admin\services\ApiDoc\getUserInfo",desc="树形",childrenField="roles",childrenDesc="权限树")
     * @Apidoc\Returned("userData", type="tree", ref="app\model\User\getInfo",desc="用户数据")
     */
    public function tree(){
        $res = (new AuthFunction())->getTree();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("多层数据引用")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/baseDemo/ref")
     * @Apidoc\Method("GET")
     * @Apidoc\Returned("refData",type="object", ref="app\admin\services\ApiDoc\getUserData" )
     */
    public function ref(){
        // 伪代码实现
        $res = [
            'refData'=>[
                'user_data'=>[
                    'list'=>[
                        ['id'=>1,'username'=>'admin','nickname'=>'管理员'],
                        ['id'=>2,'username'=>'test','nickname'=>'测试员'],
                    ],
                    'total'=>2
                ],
                'info'=>[
                    'id'=>1,
                    'name'=>"张三",
                    'phone'=>"12345678999"
                ]
            ]
        ];
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("formdata参数")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/baseDemo/formdata")
     * @Apidoc\Method("POST")
     * @Apidoc\ParamType("formdata")
     * @Apidoc\Param("name",type="string", require=true,default="1",desc="用户名")
     * @Apidoc\Param("phone",type="string", require=true,desc="电话")
     * @Apidoc\Returned("res", type="boolean",desc="保存状态")
     */
    public function formdata(){
        return show(0,"",true);
    }

    /**
     * @Apidoc\Title("文件上传")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/baseDemo/upload")
     * @Apidoc\Method("POST")
     * @Apidoc\ParamType("formdata")
     * @Apidoc\Param("file",type="file", require=true,desc="附件")
     * @Apidoc\Returned("url", type="string",desc="文件地址")
     */
    public function upload(){
        return show(0,"",true);
    }

    /**
     * @Apidoc\Title ("路由带参")
     * @Apidoc\Url("/admin/baseDemo/routeParam/:name/<age>")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("name",type="string",desc="姓名")
     * @Apidoc\Param("age",type="string",desc="年龄")
     * @Apidoc\ParamType("route")
     *
     */
    public function routeParam($name,$age){
        return show(0,"",['name'=>$name,'age'=>$age]);
    }

    /**
     * 自动生成，标题也可以这样写
     * @Apidoc\Desc("url自动生成、method为apidoc.default_method所配置默认的")
     * @Apidoc\Param(ref="pagingParam")
     * @Apidoc\Returned(ref="pagingParam")
     * @Apidoc\Returned("data", type="array", ref="app\model\TestCrud\getList",withoutField="delete_time")
     */
    public function autoApi(){
        return show(0,"url自动生成、method为apidoc.default_method所配置默认的");
    }

    /**
     * 不使用统一返回响应体的返回数据
     * NotResponses
     * NotDefaultAuthor
     * NotParameters
     * NotHeaders
     * @Apidoc\Desc("配置 NotResponses 不使用apidoc.responses统一响应体返回数据 ")
     * @Apidoc\Url("/admin/baseDemo/notResponses")
     * @Apidoc\Param(ref="pagingParam")
     * @Apidoc\Returned(ref="pagingParam")
     * @Apidoc\Returned("data", type="array", ref="app\model\TestCrud\getList",withoutField="delete_time")
     */
    public function notResponses(){
        return [
            'total'=>0,
            'data'=>[]
        ];
    }


    /**
     * NotParse
     * @Apidoc\Param("name",type="string",desc="姓名")
     * @Apidoc\Param("age",type="string",desc="年龄")
     */
    public function notApi(){
        return show(0,"通过 notApi 标记该方法不解析");
    }

    /**
     * 各种字段类型测试
     * @Apidoc\Param("string",type="string",desc="字符串")
     * @Apidoc\Param("int",type="int",desc="整形")
     * @Apidoc\Param("boolean",type="boolean",desc="布尔")
     * @Apidoc\Param("date",type="date",desc="日期")
     * @Apidoc\Param("time",type="time",desc="时间")
     * @Apidoc\Param("datetime",type="datetime",desc="日期时间")
     *
     */
    public function fieldType(){
        return show(0,"1");
    }

    /**
     * 多个请求类型
     * @Apidoc\Url("/admin/baseDemo/multipleMethod")
     * @Apidoc\Method("GET,POST,PUT,DELETE")
     * @Apidoc\Param("name",type="string",desc="姓名")
     * @Apidoc\Param("age",type="int",desc="年龄")
     *
     */
    public function multipleMethod(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }



}