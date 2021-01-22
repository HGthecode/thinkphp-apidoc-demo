<?php


namespace app\services;

use app\model\User as UserModel;
use hg\apidoc\annotation\Title;
use hg\apidoc\annotation\Param;
use hg\apidoc\annotation\Returned;

class ApiDoc
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
     * @Returned(ref="app\model\User\getList")
     */
    public function getUserList(){
        $res=(new UserModel())->getList([],1,3);
        return $res;
    }
}