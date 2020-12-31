<?php


namespace app\services;

use app\model\User as UserModel;

class ApiDoc
{
    /**
     * @title 返回会员信息
     * @param name:id type:int require:1 desc:唯一id
     * @return name:id type:int desc:唯一id
     * @return name:username type:string desc:用户名
     * @return name:nickname type:string desc:昵称
     */
    public function getUserInfo(){
        $res=(new UserModel())->where('id',33)->field(['id','username','nickname'])->find();
        return $res;
    }

    /**
     * @title 返回会员列表
     * @return ref:app\model\User\getList
     */
    public function getUserList(){
        $res=(new UserModel())->getList([],1,3);
        return $res;
    }
}