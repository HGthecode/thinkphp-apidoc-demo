<?php
use think\facade\Route;



Route::rule(':version/testRest/pagelist', ':version.TestRest/pagelist', 'GET')->allowCrossDomain();
Route::rule(':version/testRest', ':version.TestRest/detail', 'GET')->allowCrossDomain();
//Route::rule(':version/testRest', ':version.TestRest/add', 'POST')->allowCrossDomain();
Route::rule(':version/testRest', ':version.TestRest/edit', 'PUT')->allowCrossDomain();
Route::rule(':version/testRest', ':version.TestRest/delete', 'DELETE')->allowCrossDomain();

Route::post(":version/testRest",':version.TestRest/add');



Route::rule(':version/testAuto/pagelist', ':version.TestAuto/pagelist', 'GET')->allowCrossDomain();
Route::rule(':version/testAuto', ':version.TestAuto/detail', 'GET')->allowCrossDomain();
Route::rule(':version/testAuto', ':version.TestAuto/add', 'POST')->allowCrossDomain();
Route::rule(':version/testAuto', ':version.TestAuto/edit', 'PUT')->allowCrossDomain();
Route::rule(':version/testAuto', ':version.TestAuto/delete', 'DELETE')->allowCrossDomain();


