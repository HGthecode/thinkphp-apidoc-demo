<?php
namespace app\validate;

class IDInt extends  BaseValidate {
    protected $rule = [
        'id' => 'require|isInteger'
    ];

    protected $message = [
        'id' => '缺少必要参数id'
    ];

}