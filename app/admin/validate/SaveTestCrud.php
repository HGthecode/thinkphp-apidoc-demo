<?php
namespace app\admin\validate;

use app\common\validate\BaseValidate;

class SaveTestCrud extends  BaseValidate {
    protected $rule = [
       'id' => 'require',
       'name' => 'require',
       'age' => 'number|between:1,120',
   ];


    protected $message = [
        'id' => 'id不可为空',
        'name' => '缺少必要参数name',
        'age.number' => 'age年龄字段类型为数字',
        'age.between' => 'age只能在1-120之间',
    ];


    protected $scene = [
        'add'  =>  ["name","age"],
        'edit'  =>  ["id","name","age"],
        'delete'  =>  ['id'],
    ];

}