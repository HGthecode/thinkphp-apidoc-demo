<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

//Route::rule(':version/:controller', ':version.:controller/index');
Route::get('/', function () {
    return 'hello,ThinkPHP ApiDoc！ 查看演示请访问 https://apidoc.demo.hg-code.com/apidoc/';
});

Route::rule(':version/:controller/:action', ':version.:controller/:action');

Route::get('baseDemo/base', 'BaseDemo/base');
Route::post('baseDemo/definitions', 'BaseDemo/definitions');
Route::post('baseDemo/service', 'BaseDemo/service');
Route::post('baseDemo/model', 'BaseDemo/model');


