<?php


namespace app\model;

use think\Model;
use hg\apidoc\annotation\Field;
use hg\apidoc\annotation\WithoutField;
use hg\apidoc\annotation\AddField;
use hg\apidoc\annotation\Param;

class User extends BaseModel
{


    /**
     * @Field("id,name,nickname,sex,username")
     * @AddField("openid",type="string",default="abc",desc="微信openid")
     * @AddField("senkey",type="string",default="key",desc="微信key")
     * @AddField("role",type="array",desc="重写role",
     *     @Param ("name",type="string",desc="名称"),
     *     @Param ("id",type="string",desc="id"),
     * )
     */
    public function getInfo($id){
        $res = $this->get($id);
        return $res;
    }
}