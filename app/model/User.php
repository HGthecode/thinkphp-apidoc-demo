<?php


namespace app\model;

use think\Model;

class User extends BaseModel
{

    /**
     * @title 根据id获取明细
     * @field id,username,nickname,state,sex
     * @addField name:group_name type:string desc:会员组名称
     * @addField name:role_name type:string desc:角色名称
     */
    public function getInfo($id){
        $res = $this->get($id);
        return $res;
    }
}