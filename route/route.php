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

Route::group('apidoc', function () {
    $controller_namespace = '\hg\apidoc\Controller@';
    Route::get('config'     , $controller_namespace . 'getConfig');
    Route::get('apiData'     , $controller_namespace . 'getApidoc');
    Route::get('mdMenus'     , $controller_namespace . 'getMdMenus');
    Route::get('mdDetail'     , $controller_namespace . 'getMdDetail');
    Route::post('verifyAuth'     , $controller_namespace . 'verifyAuth');
    Route::post('generator'     , $controller_namespace . 'createGenerator');
})->allowCrossDomain();


Route::group('admin', function(){

    Route::group('index', function(){
        Route::get('base','admin/Index/base');
    })->allowCrossDomain();

    Route::group('baseDemo', function(){
        Route::get('base','admin/BaseDemo/base');
        Route::post('completeParams','admin/BaseDemo/completeParams');
        Route::post('tree','admin/BaseDemo/tree');
        Route::post('formdata','admin/BaseDemo/formdata');
        Route::post('upload','admin/BaseDemo/upload');
        Route::get('routeParam/:name/<age>','admin/BaseDemo/routeParam');
        Route::get('autoApi','admin/BaseDemo/autoApi');
        Route::get('notResponses','admin/BaseDemo/notResponses');
        Route::get('notApi','admin/BaseDemo/notApi');
        Route::get('multipleMethod','admin/BaseDemo/multipleMethod');
        Route::post('multipleMethod','admin/BaseDemo/multipleMethod');
        Route::put('multipleMethod','admin/BaseDemo/multipleMethod');
        Route::delete('multipleMethod','admin/BaseDemo/multipleMethod');
        Route::patch('multipleMethod','admin/BaseDemo/multipleMethod');
    })->allowCrossDomain();


    Route::group('debugDemo', function(){
        Route::post('login','admin/DebugDemo/login');
        Route::get('event','admin/DebugDemo/event');
        Route::post('mock','admin/DebugDemo/mock');
    })->allowCrossDomain();


    Route::group('langDemo', function(){
        Route::post('lang','admin/LangDemo/lang');
    })->allowCrossDomain();


    Route::group('mdDemo', function(){
        Route::get('mdDesc','admin/MdDemo/mdDesc');
        Route::get('mdRefDesc','admin/MdDemo/mdRefDesc');
        Route::get('mdDoc','admin/MdDemo/mdDoc');
        Route::get('mdApiFieldDesc','admin/MdDemo/mdApiFieldDesc');
        Route::get('refMdApiFieldDesc','admin/MdDemo/refMdApiFieldDesc');
    })->allowCrossDomain();


    Route::group('refDemo', function(){
        Route::get('definitions','admin/RefDemo/definitions');
        Route::get('service','admin/RefDemo/service');
        Route::get('model','admin/RefDemo/model');
        Route::get('tree','admin/RefDemo/tree');
        Route::get('ref','admin/RefDemo/ref');
    })->allowCrossDomain();


    Route::group('crudDemo', function(){
        Route::get('list','admin/CrudDemo/list');
        Route::get('info','admin/CrudDemo/info');
        Route::post('add','admin/CrudDemo/add');
        Route::put('edit','admin/CrudDemo/edit');
        Route::delete('delete','admin/CrudDemo/delete');
    })->allowCrossDomain();

    Route::get('user.Blog/index','admin/user.Blog/index')->allowCrossDomain();



})->allowCrossDomain();




Route::group('api', function() {

    Route::group('v1', function () {
        Route::get('testRest/pagelist', 'api/v1.TestRest/pagelist');
        Route::get('testRest', 'api/v1.TestRest/detail');
        Route::post('testRest', 'api/v1.TestRest/add');
        Route::put('testRest', 'api/v1.TestRest/edit');
        Route::delete('testRest', 'api/v1.TestRest/delete');
    })->allowCrossDomain();

    Route::group('v2', function () {
        Route::get('testRest/pagelist', 'api/v2.TestRest/pagelist');
        Route::get('testRest', 'api/v2.TestRest/detail');
        Route::post('testRest', 'api/v2.TestRest/add');
        Route::put('testRest', 'api/v2.TestRest/edit');
        Route::delete('testRest', 'api/v2.TestRest/delete');
    })->allowCrossDomain();

})->allowCrossDomain();

