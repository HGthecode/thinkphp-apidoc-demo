<?php


namespace app\model;

use think\Model;
use hg\apidoc\annotation\Field;
use hg\apidoc\annotation\WithoutField;
use hg\apidoc\annotation\AddField;

class User extends BaseModel
{


    /**
     * @field("id,username,nickname")
     * @addField("openid",type="string",default="abc",desc="微信openid")
     * @addField("senkey",type="string",default="key",desc="微信key")
     */
    public function getInfo($id){
        $res = $this->get($id);
        return $res;
    }
}