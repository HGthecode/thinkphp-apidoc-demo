<?php

namespace app\admin\controller;

use app\common\controller\ApiBase;
use hg\apidoc\annotation as Apidoc;


/**
 * Ref引用示例
 * @Apidoc\Group("base")
 * @Apidoc\Sort(2)
 */
class RefDemo extends ApiBase
{

    /**
     * @Apidoc\Title("引入通用注释")
     * @Apidoc\Desc("引入配置中definitions的通用注解控制器中所定义的通用参数")
     * @Apidoc\Url("/admin/refDemo/definitions")
     * @Apidoc\Author("HG")
     * @Apidoc\Method("GET")
     * @Apidoc\Header( ref="auth")
     * @Apidoc\Param( ref="pagingParam")
     * @Apidoc\Param("page",type="object", ref="pagingParam",desc="分页参数")
     * @Apidoc\Returned("list", type="array",ref="dictionary", desc="字典列表")
     */
    public function definitions(){
        return show(0,"",$this->request->param());
    }



    /**
     * @Apidoc\Title("引入逻辑层注释")
     * @Apidoc\Desc("引入业务逻辑层（其它分成）的注解参数")
     * @Apidoc\Url("/admin/refDemo/service")
     * @Apidoc\Method("GET")
     * @Apidoc\Param(ref="app\common\services\ApiDoc\getUserInfo")
     * @Apidoc\Returned(ref="\app\common\services\ApiDoc\info")
     */
    public function service(){
        return show(0,"",$this->request->param());
    }

    /**
     * @Apidoc\Title("引入模型注释")
     * @Apidoc\Desc("param参数为直接引用模型参数；return则是引用逻辑层，逻辑层再引用模型参数")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/refDemo/model")
     * @Apidoc\Method("GET")
     * @Apidoc\Param(ref="app\model\User\getInfo")
     * @Apidoc\Returned(ref="app\common\services\ApiDoc\getUserList")
     */
    public function model(){
        return show(0,"",$this->request->param());
    }

    /**
     * @Apidoc\title("树形数据结构")
     * @Apidoc\Desc("")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/refDemo/tree")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("roleData",type="tree", ref="app\common\services\ApiDoc\getUserInfo",desc="树形",childrenField="roles",childrenDesc="权限树")
     * @Apidoc\Returned("userData", type="tree", ref="app\model\User\getInfo",desc="用户数据",childrenField="children1")
     */
    public function tree(){
        return show(0,"",$this->request->param());
    }

    /**
     * @Apidoc\Title("多层数据引用")
     * @Apidoc\Desc("引用逻辑层，逻辑层再继续引用其它层")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/refDemo/ref")
     * @Apidoc\Method("GET")
     * @Apidoc\Returned("refData",type="object", ref="app\common\services\ApiDoc\getUserData" )
     */
    public function ref(){
        return show(0,"",$this->request->param());
    }




}