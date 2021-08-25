<?php


namespace app\api\services;


use app\model\User as UserModel;
use hg\apidoc\annotation\Param;
use hg\apidoc\annotation\Returned;

class Apidoc
{
    /**
     * @param("sex", type="int",require=true,desc="性别")
     * @param("age", type="int",require=true,desc="年龄")
     * @param("id", type="int",require=true,desc="唯一id")
     * @Returned("id", type="int",desc="唯一id")
     * @Returned("name", type="string",desc="姓名")
     * @Returned("phone", type="string",desc="电话")
     */
    public function getUserInfo(){
        $res=(new UserModel())->where('id',33)->field(['id','username','nickname'])->find();
        return $res;
    }

    /**
     * @Param("arr",type="object",desc="数组",
     *  @Param ("key",type="string",desc="参数名"),
     *  @Param ("value",type="string",desc="参数值")
     * )
     * @Returned(ref="app\model\User\getList")
     */
    public function getUserList(){
        $res=(new UserModel())->getList([],1,3);
        return $res;
    }

    /**
     * @Returned("list", type="array", ref="app\model\User\getInfoById",desc="用户列表")
     * @Returned("total", type="int", desc="关联数量")
     */
    public function getRefUserList(){

    }

    /**
     * @Returned("user_data", type="array", ref="app\api\services\Apidoc\getRefUserList",desc="关联用户数据")
     * @Returned("info", type="object", ref="app\api\services\Apidoc\getUserInfo",desc="用户信息")
     */
    public function getUserData(){

    }
}