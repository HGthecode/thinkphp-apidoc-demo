<?php


namespace app\admin\services;

use app\model\AuthFunction as AuthFunctionModel;
use app\common\utils\Tools;

class AuthFunction
{
    public function getTree()
    {
        $list = (new AuthFunctionModel())->field(['id','name','value','pid'])->order('sort ASC')->select();
        $tree = (new Tools())->ListToTree($list,"","id","pid","children");
        return $tree;
    }
}