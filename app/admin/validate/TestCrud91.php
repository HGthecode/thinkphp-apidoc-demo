<?php
namespace app\admin\validate;

use app\common\validate\BaseValidate;

class TestCrud91 extends  BaseValidate {
    protected $rule = [
       'id' => 'require',
   ];


    protected $message = [
        'id' => 'id不可为空',
    ];


    protected $scene = [
        'add'  =>  [''],
        'edit'  =>  ["id"],
        'delete'  =>  ['id'],
    ];

}