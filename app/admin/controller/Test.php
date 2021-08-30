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
use ReflectionMethod;

/**
 * 测试
 * @Apidoc\Group("test")
 */
class Test extends BaseController
{


    /**
     * 测试接口
     * @Apidoc\Url("/admin/test/index")
     * @Apidoc\Method("GET")
     */
    public function index(Request $request){
//        $res = [];
//        $a = [1,2];
//        $b = [4,5,6];
//
//        $list = [];
//        foreach ($a as $aItem){
//            $c = [];
//            foreach ($b as $bItem){
//                $c[]=[
//                    'a'=>$aItem,
//                    'b'=>$bItem
//                ];
//            }
//            $list[]=$c;
//        }
//        dd($list);
          $a = App::getAppPath();
        return show(0,"",$a);
    }

    public function getFormToken(Request $request){
        return show(0,"","key:".uniqid());
    }




}