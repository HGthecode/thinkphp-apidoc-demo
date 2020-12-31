<?php


namespace app\controller\v1;

use app\services\ApiDoc as ApiDocService;
use app\services\AuthFunction;

/**
 * @title 基础示例
 * @controller BaseDemo
 */
class BaseDemo
{
    /**
     * @title 基础的注释方法
     * @desc 最基础的接口注释写法
     * @author HG
     * @url /v1/baseDemo/base
     * @method GET
     * @tag 测试 基础
     * @header name:Authorization require:1 desc:Token
     * @param name:username type:string require:1 desc:用户名
     * @param name:password type:string require:1 desc:登录密码MD5
     * @param name:phone type:string require:1 desc:手机号
     * @param name:sex type:int require:0 default:0 desc:性别
     * @return name:id type:int desc:新增用户的id
     */
    public function base(){
        return show(0,"",["id"=>1]);
    }

    /**
     * @title 引入通用注释
     * @desc 引入通用注释所定义的通用参数
     * @author HG
     * @url /v1/baseDemo/definitions
     * @method GET
     * @param name:page type:object ref:definitions\pagingParam desc:分页参数
     * @param ref:definitions\pagingParam
     * @return name:list type:array ref:definitions\dictionary
     */
    public function definitions(){
        $list=[];
        $list[]=["id"=>1,"name"=>"名称","value"=>"hello apidoc"];
        return show(0,"",$list);
    }


    /**
     * @title 引入逻辑层注释
     * @desc 引入业务逻辑层的注释参数
     * @author HG
     * @url /v1/baseDemo/service
     * @method GET
     * @param ref:app\services\ApiDoc\getUserInfo
     * @return name:userInfo type:object ref:app\services\ApiDoc\getUserInfo
     */
    public function service(){
        $res = (new ApiDocService())->getUserInfo();
        return show(0,"",$res);
    }

    /**
     * @title 引入模型注释
     * @desc param参数为直接引用模型参数；return则是引用逻辑层，通过逻辑层引用模型参数
     * @author HG
     * @url /v1/baseDemo/model
     * @method GET
     * @param ref:app\model\User\getInfo
     * @return name:users type:array ref:app\services\ApiDoc\getUserList
     */
    public function model(){
        $res = (new ApiDocService())->getUserList();
        return show(0,"",$res);
    }

    /**
     * @title 树形数据结构
     * @desc
     * @author HG
     * @url /v1/baseDemo/tree
     * @method GET
     * @return name:data type:tree childrenField:children childrenDesc:子节点 ref:app\model\AuthFunction\getList withoutField:update_time,delete_time,create_time
     */
    public function tree(){
        $res = (new AuthFunction())->getTree();
        return show(0,"",$res);
    }

    /**
     * @title formdata参数
     * @desc
     * @author HG
     * @url /v1/baseDemo/formdata
     * @method POST
     * @paramType formdata
     * @param name:name type:string require:1 desc:用户名
     * @param name:phone type:string require:1 desc:电话
     * @return type:boolean desc:保存状态
     */
    public function formdata(){
        return show(0,"",true);
    }

    /**
     * @title 文件上传
     * @desc
     * @author HG
     * @url /v1/baseDemo/upload
     * @method POST
     * @paramType formdata
     * @param name:file type:file require:1 desc:附件
     * @return name:url type:string  desc:文件地址
     */
    public function upload(){
        return show(0,"",true);
    }

}