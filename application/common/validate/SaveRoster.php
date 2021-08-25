<?php
namespace app\common\validate;


class SaveRoster extends  BaseValidate {
    protected $rule = [
        'id' => 'require',
        'name' => 'require',
        'phone' => 'require'
    ];

    protected $message = [
        'id' => '缺少必要参数id',
        'name' => '请填写姓名',
        'state' => '请填写手机号码',
    ];

    protected $scene = [
        'add'  =>  ['name','phone'],
        'edit'  =>  ['id','name','phone'],
    ];

}