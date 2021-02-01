<?php


namespace app\controller\v2;

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
     * @Apidoc\Title("基础的注释方法")
     * @Apidoc\Desc("最基础的接口注释写法")
     * @Apidoc\Url("/v2/baseDemo/base")
     * @Apidoc\Method("GET")
     * @Apidoc\Tag("测试 基础")
     * @Apidoc\Header(
     *     "Authorization",
     *     require=true,
     *     desc="Token"
     * )
     * @Apidoc\Param("username", type="string",require=true, desc="用户名" )
     * @Apidoc\Param("password", type="string",require=true, desc="密码" )
     * @Apidoc\Param("phone", type="string",require=true, desc="手机号" )
     * @Apidoc\Param("sex", type="int",default="1",desc="性别" )
     * @Apidoc\Returned("id", type="int", desc="新增用户的id")
     */
    public function base(){
        return show(0,"",["id"=>1]);
    }

    /**
     * @Apidoc\Title("引入通用注释")
     * @Apidoc\Desc("引入通用注释所定义的通用参数")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/v2/baseDemo/definitions")
     * @Apidoc\Method("GET")
     * @Apidoc\Header( ref="auth")
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
     * @Apidoc\Url("/v2/baseDemo/service")
     * @Apidoc\Method("GET")
     * @Apidoc\Param(ref="app\services\ApiDoc\getUserInfo")
     * @Apidoc\Returned("userInfo",type="object",ref="app\services\ApiDoc\getUserList")
     */
    public function service(){
        $res = (new ApiDocService())->getUserInfo();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("引入模型注释")
     * @Apidoc\Desc("param参数为直接引用模型参数；return则是引用逻辑层，通过逻辑层引用模型参数")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/v2/baseDemo/model")
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
     * @Apidoc\Url("/v2/baseDemo/tree")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("roleData",type="tree", ref="app\services\ApiDoc\getUserInfo",desc="树形",childrenField="roles",childrenDesc="权限树")
     * @Apidoc\Returned("userData", type="tree", ref="app\model\User\getInfo",desc="用户数据")
     */
    public function tree(){
        $res = (new AuthFunction())->getTree();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("多层数据引用")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/v2/baseDemo/ref")
     * @Apidoc\Method("GET")
     * @Apidoc\Returned("refData",type="object", ref="app\services\ApiDoc\getUserData" )
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
     * @Apidoc\Url("/v2/baseDemo/formdata")
     * @Apidoc\Method("POST")
     * @Apidoc\ParamType("formdata")
     * @Apidoc\Param("name",type="string", require=true,desc="用户名")
     * @Apidoc\Param("phone",type="string", require=true,desc="电话")
     * @Apidoc\Returned("res", type="boolean",desc="保存状态")
     */
    public function formdata(){
        return show(0,"",true);
    }

    /**
     * @Apidoc\Title("文件上传")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/v2/baseDemo/upload")
     * @Apidoc\Method("POST")
     * @Apidoc\ParamType("formdata")
     * @Apidoc\Param("file",type="file", require=true,desc="附件")
     * @Apidoc\Returned("url", type="string",desc="文件地址")
     */
    public function upload(){
        return show(0,"",true);
    }




}