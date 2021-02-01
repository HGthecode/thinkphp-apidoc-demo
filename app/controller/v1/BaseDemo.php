<?php


namespace app\controller\v1;

use app\services\ApiDoc as ApiDocService;
use app\services\AuthFunction;
use app\Request;
use hg\apidoc\annotation as Apidoc;


/**
 * @Apidoc\title("基础示例")
 * @Apidoc\group("base")
 */
class BaseDemo
{

    /**
     * @Apidoc\title("基础的注释方法")
     * @Apidoc\Desc("最基础的接口注释写法")
     * @Apidoc\url("/v1/baseDemo/base")
     * @Apidoc\method("GET")
     * @Apidoc\tag("测试 基础")
     * @Apidoc\header(
     *     "Authorization",
     *     require=true,
     *     desc="Token"
     * )
     * @Apidoc\param("username", type="string",require=true, desc="用户名" )
     * @Apidoc\param("password", type="string",require=true, desc="密码" )
     * @Apidoc\param("phone", type="string",require=true, desc="手机号" )
     * @Apidoc\param("sex", type="int",default="1",desc="性别" )
     * @Apidoc\Returned("id", type="int", desc="新增用户的id")
     */
    public function base(){
        return show(0,"",["id"=>1]);
    }

    /**
     * @Apidoc\title("引入通用注释")
     * @Apidoc\Desc("引入通用注释所定义的通用参数")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/baseDemo/definitions")
     * @Apidoc\method("GET")
     * @Apidoc\header( ref="auth")
     * @Apidoc\param( ref="pagingParam")
     * @Apidoc\param("page",type="object", ref="pagingParam",desc="分页参数")
     * @Apidoc\Returned("list", type="array",ref="dictionary", desc="字典列表")
     */
    public function definitions(){
        $list=[];
        $list[]=["id"=>1,"name"=>"名称","value"=>"hello apidoc"];
        return show(0,"",$list);
    }



    /**
     * @Apidoc\title("引入逻辑层注释")
     * @Apidoc\Desc("引入业务逻辑层的注释参数")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/baseDemo/service")
     * @Apidoc\method("GET")
     * @Apidoc\param(ref="app\services\ApiDoc\getUserInfo")
     * @Apidoc\Returned("userInfo",type="object",ref="app\services\ApiDoc\getUserList")
     */
    public function service(){
        $res = (new ApiDocService())->getUserInfo();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\title("引入模型注释")
     * @Apidoc\Desc("param参数为直接引用模型参数；return则是引用逻辑层，通过逻辑层引用模型参数")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/baseDemo/model")
     * @Apidoc\method("GET")
     * @Apidoc\param(ref="app\model\User\getInfo")
     * @Apidoc\Returned("userList",type="array",ref="app\model\User\getInfo")
     */
    public function model(){
        $res = (new ApiDocService())->getUserList();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\title("树形数据结构")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/baseDemo/tree")
     * @Apidoc\method("GET")
     * @Apidoc\param("roleData",type="tree", ref="app\services\ApiDoc\getUserInfo",desc="树形",childrenField="roles",childrenDesc="权限树")
     * @Apidoc\Returned("userData", type="tree", ref="app\model\User\getInfo",desc="用户数据")
     */
    public function tree(){
        $res = (new AuthFunction())->getTree();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\title("多层数据引用")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/baseDemo/ref")
     * @Apidoc\method("GET")
     * @Apidoc\Returned("userData",type="object", ref="app\services\ApiDoc\getUserData" )
     */
    public function ref(){
        $res = (new AuthFunction())->getTree();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\title("formdata参数")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/baseDemo/formdata")
     * @Apidoc\method("POST")
     * @Apidoc\paramType("formdata")
     * @Apidoc\param("name",type="string", require=true,desc="用户名")
     * @Apidoc\param("phone",type="string", require=true,desc="电话")
     * @param name:name type:string require:1 desc:用户名
     * @param name:phone type:string require:1 desc:电话
     * @Apidoc\Returned("res", type="boolean",desc="保存状态")
     */
    public function formdata(){
        return show(0,"",true);
    }

    /**
     * @Apidoc\title("文件上传")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/baseDemo/upload")
     * @Apidoc\method("POST")
     * @Apidoc\paramType("formdata")
     * @Apidoc\param("file",type="file", require=true,desc="附件")
     * @Apidoc\Returned("url", type="string",desc="文件地址")
     */
    public function upload(){
        return show(0,"",true);
    }




}