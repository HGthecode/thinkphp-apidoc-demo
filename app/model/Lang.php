<?php


namespace app\model;

use think\Model;
use hg\apidoc\annotation\Field;
use hg\apidoc\annotation\WithoutField;
use hg\apidoc\annotation\AddField;
use hg\apidoc\annotation\Param;

class Lang extends BaseModel
{

    public function getInfo($id){
        $res = $this->get($id);
        return $res;
    }
}