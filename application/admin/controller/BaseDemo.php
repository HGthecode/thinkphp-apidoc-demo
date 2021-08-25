<?php

namespace app\admin\controller;

//use app\admin\services\ApiDoc as ApiDocService;
//use app\admin\services\AuthFunction;
use app\common\controller\ApiBase;
use hg\apidoc\annotation as Apidoc;
use hg\apidoc\parseApi\ParseAnnotation;


/**
 * 基础示例
 * @Apidoc\Group("base")
 *
 */
class BaseDemo extends ApiBase
{

    /**
     * @Apidoc\Title("基础的注释方法")
     * @Apidoc\Desc("最基础的接口注释写法")
     * @Apidoc\Method("GET")
     * @Apidoc\Tag("测试")
     * @Apidoc\Param("username", type="abc",require=true, desc="用户名")
     * @Apidoc\Param("password", type="string",require=true, desc="密码")
     * @Apidoc\Param("phone", type="string",require=true, desc="手机号")
     * @Apidoc\Param("sex", type="int",default="1",desc="性别" )
     * @Apidoc\Returned("data", type="array", desc="返回数据1",replaceGlobal=true,
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
     * @Apidoc\Method("post")
     * @Apidoc\Param("info",type="object",desc="信息",
     *     @Apidoc\Param ("name",type="string",desc="姓名"),
     *     @Apidoc\Param ("sex",type="string",desc="性别"),
     *     @Apidoc\Param ("group",type="object",desc="所属组",
     *          @Apidoc\Param ("group_name",type="string",desc="组名"),
     *          @Apidoc\Param ("group_id",type="int",desc="组id"),
     *          @Apidoc\Param ("data1",type="object",ref="app\common\services\ApiDoc\getUserList",desc="这里也可以用ref")
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
        return show(0,"",$this->request->param());
    }



    /**
     * @Apidoc\title("树形数据结构")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/baseDemo/tree")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("roleData",type="tree", ref="app\common\services\ApiDoc\getUserInfo",desc="树形",childrenField="roles",childrenDesc="权限树",
     *     @Apidoc\Param("sex",type="int",desc="重写性别属性")
     * )
     * @Apidoc\Returned("userData", type="tree", ref="app\model\User\getInfo",desc="用户数据",childrenField="children1")
     */
    public function tree(){
        return show(0,"",$this->request->param());
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
        return show(0,"",$this->request->param());
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
        return show(0,"",$this->request->param());
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
     */
    public function autoApi(){
        return show(0,"url自动生成、method为apidoc.default_method所配置默认的");
    }



    /**
     * 特殊注解参数
     * NotResponses
     * NotDefaultAuthor
     * NotParameters
     * NotHeaders
     * @Apidoc\Desc("注解 NotResponses 不使用apidoc.responses统一响应体返回数据 ")
     * @Apidoc\Url("/admin/baseDemo/notResponses")
     * @Apidoc\Param(ref="pagingParam")
     * @Apidoc\Returned(ref="pagingParam")
     */
    public function notResponses(){
        return show(0,"",$this->request->param());
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
     * 多个请求类型
     * @Apidoc\Url("/admin/baseDemo/multipleMethod")
     * @Apidoc\Method("GET,POST,PUT,DELETE")
     * @Apidoc\Param("name",type="string",desc="姓名")
     * @Apidoc\Param("age",type="int",desc="年龄")
     *
     */
    public function multipleMethod(){
        return show(0,"",$this->request->param());
    }



}