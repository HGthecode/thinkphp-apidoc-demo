<?php

namespace app\admin\controller;

use app\admin\services\ApiDoc as ApiDocService;
use app\admin\services\AuthFunction;
use app\BaseController;
use app\Request;
use hg\apidoc\annotation as Apidoc;
use hg\apidoc\parseApi\ParseAnnotation;
use hg\apidoc\Utils;
use think\facade\App;
use think\facade\Lang;


/**
 * lang(apidoc.controller.lang.title)
 * @Apidoc\Group("base")
 * @Apidoc\Sort(4)
 */
class LangDemo extends BaseController
{


    /**
     * @Apidoc\Title ("lang(apidoc.api.lang.title)")
     * @Apidoc\Desc ("lang(apidoc.api.lang.desc)")
     * @Apidoc\Tag("lang(apidoc.api.lang.tags)")
     * @Apidoc\Url("/admin/langDemo/lang")
     * @Apidoc\Method("post")
     * @Apidoc\Author ("小飞机")
     * @Apidoc\Param("number",type="int",desc="lang(apidoc.api.lang.number)")
     * @Apidoc\Param(ref="app\model\Lang\getInfo")
     * @Apidoc\Param("name",desc="lang(apidoc.api.lang.name)")
     * @Apidoc\Param("phone",type="string",mdRef="/docs/apiDesc.md#phone字段${lang}")
     * @Apidoc\Returned(ref="app\admin\services\Lang\getInfo")
     */
    public function lang(Request $request){
        return show(0,"",$request->param());
    }




}