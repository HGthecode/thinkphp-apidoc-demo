<?php
use think\facade\Route;


Route::group('baseDemo', function(){
    Route::get('base','BaseDemo/base');
    Route::post('completeParams','BaseDemo/completeParams');
    Route::post('tree','BaseDemo/tree');
    Route::post('formdata','BaseDemo/formdata');
    Route::post('upload','BaseDemo/upload');
    Route::get('routeParam/:name/<age>','BaseDemo/routeParam');
    Route::get('autoApi','BaseDemo/autoApi');
    Route::get('notResponses','BaseDemo/notResponses');
    Route::get('notApi','BaseDemo/notApi');
    Route::get('multipleMethod','BaseDemo/multipleMethod');
    Route::post('multipleMethod','BaseDemo/multipleMethod');
    Route::put('multipleMethod','BaseDemo/multipleMethod');
    Route::delete('multipleMethod','BaseDemo/multipleMethod');
    Route::patch('multipleMethod','BaseDemo/multipleMethod');
})->allowCrossDomain();


Route::group('debugDemo', function(){
    Route::post('login','DebugDemo/login');
    Route::get('event','DebugDemo/event');
    Route::post('mock','DebugDemo/mock');
    Route::get('eventTest','DebugDemo/eventTest');
    Route::post('eventFormToken','DebugDemo/eventFormToken');
})->allowCrossDomain();

Route::group('langDemo', function(){
    Route::get('lang','LangDemo/lang');
})->allowCrossDomain();


Route::group('mdDemo', function(){
    Route::get('mdDesc','MdDemo/mdDesc');
    Route::get('mdRefDesc','MdDemo/mdRefDesc');
    Route::get('mdDoc','MdDemo/mdDoc');
    Route::get('mdApiFieldDesc','MdDemo/mdApiFieldDesc');
    Route::get('refMdApiFieldDesc','MdDemo/refMdApiFieldDesc');
})->allowCrossDomain();


Route::group('refDemo', function(){
    Route::get('definitions','RefDemo/definitions');
    Route::get('service','RefDemo/service');
    Route::get('model','RefDemo/model');
    Route::get('tree','RefDemo/tree');
    Route::get('ref','RefDemo/ref');
})->allowCrossDomain();


Route::group('crudDemo', function(){
    Route::get('list','CrudDemo/list');
    Route::get('info','CrudDemo/info');
    Route::post('add','CrudDemo/add');
    Route::put('edit','CrudDemo/edit');
    Route::delete('delete','CrudDemo/delete');
})->allowCrossDomain();

Route::group('test', function(){
    Route::get('index','Test/index');
    Route::get('getFormToken','Test/getFormToken');
})->allowCrossDomain();

Route::get('user.Blog/index','user.Blog/index')->allowCrossDomain();