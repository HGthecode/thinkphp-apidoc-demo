Route::group('{if '{$app[1].folder}'}:version/{/if}{$app[0].folder}/{$lcfirst(controller.class_name)}', function(){
    Route::get('list','{if '{$app[1].folder}'}:version.{/if}{$controller.class_name}/getPageList');
    Route::get('detail','{if '{$app[1].folder}'}:version.{/if}{$controller.class_name}/detail');
    Route::post('add','{if '{$app[1].folder}'}:version.{/if}{$controller.class_name}/add');
    Route::put('edit','{if '{$app[1].folder}'}:version.{/if}{$controller.class_name}/edit');
    Route::delete('delete','{if '{$app[1].folder}'}:version.{/if}{$controller.class_name}/delete');
})->allowCrossDomain();