<?php
use think\facade\Route;

Route::get('baseDemo/base', 'BaseDemo/Base')->allowCrossDomain();
Route::get('baseDemo/definitions', 'BaseDemo/definitions')->allowCrossDomain();
Route::get('baseDemo/service', 'BaseDemo/service')->allowCrossDomain();
Route::get('baseDemo/model', 'BaseDemo/model')->allowCrossDomain();
Route::get('baseDemo/tree', 'BaseDemo/tree')->allowCrossDomain();
Route::get('baseDemo/ref', 'BaseDemo/ref')->allowCrossDomain();
Route::post('baseDemo/formdata', 'BaseDemo/formdata')->allowCrossDomain();
Route::post('baseDemo/upload', 'BaseDemo/upload')->allowCrossDomain();

Route::get('baseDemo/routeParam/:name/<age>', 'BaseDemo/routeParam')->allowCrossDomain();
Route::get('baseDemo/autoApi', 'BaseDemo/autoApi')->allowCrossDomain();
Route::get('baseDemo/notResponses', 'BaseDemo/notResponses')->allowCrossDomain();
Route::get('baseDemo/fieldType', 'BaseDemo/fieldType')->allowCrossDomain();


Route::rule('testCrud/pagelist', 'TestCrud/pagelist', 'GET')->allowCrossDomain();
Route::rule('testCrud/detail', 'TestCrud/detail', 'GET')->allowCrossDomain();
Route::rule('testCrud/add', 'TestCrud/add', 'POST')->allowCrossDomain();
Route::rule('testCrud/edit', 'TestCrud/edit', 'PUT')->allowCrossDomain();
Route::rule('testCrud/delete', 'TestCrud/delete', 'DELETE')->allowCrossDomain();



Route::group('crudDemo', function(){
    Route::get('list','CrudDemo/list');
    Route::get('info','CrudDemo/info');
    Route::post('add','CrudDemo/add');
    Route::put('edit','CrudDemo/edit');
    Route::delete('delete','CrudDemo/delete');
})->allowCrossDomain();

