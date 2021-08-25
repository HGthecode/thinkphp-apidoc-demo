<?php


namespace app\model;


class Lang extends BaseModel
{

    public function getInfo($id){
        $res = $this->get($id);
        return $res;
    }
}