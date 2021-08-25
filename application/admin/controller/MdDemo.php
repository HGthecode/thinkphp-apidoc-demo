<?php

namespace app\admin\controller;

use app\admin\services\ApiDoc as ApiDocService;
use app\admin\services\AuthFunction;
use app\BaseController;
use app\common\controller\ApiBase;
use app\Request;
use hg\apidoc\annotation as Apidoc;
use hg\apidoc\parseApi\ParseAnnotation;
use hg\apidoc\Utils;
use think\facade\App;
use think\facade\Lang;


/**
 * Markdown描述示例
 * @Apidoc\Group("base")
 * @Apidoc\Sort(5)
 */
class MdDemo extends ApiBase
{


    /**
     * 使用md语法写接口说明
     * @Apidoc\Url("/admin/mdDemo/mdDesc")
     * @Apidoc\Method("GET")
     * @Apidoc\Md(" ## 说明

    这里可以使用Markdown语法

    ### 字段说明
    ```javascript
    var a = 1;
    ```");
     * @Apidoc\Method("GET")
     * @Apidoc\Param("username", type="string",require=true, desc="用户名")
     */
    public function mdDesc(){
        return show(0,"",$this->request->param());
    }


    /**
     * 引用md文档写接口说明
     * @Apidoc\Desc("上面那样在注解里面写md语法，很蛋疼。参数引用吧。md地址后加上#xxx 可以只取指定的h2（##）标签的内容")
     * @Apidoc\Url("/admin/mdDemo/mdRefDesc")
     * @Apidoc\Method("GET")
     * @Apidoc\Md (ref="/docs/apiDesc.md#引用Md文档说明")
     * @Apidoc\Param("username", type="string",require=true, desc="用户名")
     */
    public function mdRefDesc(){
        return show(0,"",$this->request->param());
    }


    /**
     * 自定义文档内容
     * @Apidoc\Desc("使用md文档完全自定义接口内容")
     * @Apidoc\Url("/admin/mdDemo/mdDoc")
     * @Apidoc\Method("GET")
     * @Apidoc\Md (ref="/docs/mdApi.md")
     * NotResponses
     * NotParameters
     * NotHeaders
     */
    public function mdDoc(){
        return show(0,"",$this->request->param());
    }


    /**
     * 字段描述使用md语法
     * @Apidoc\Url("/admin/mdDemo/mdApiFieldDesc")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("username", type="abc",require=true, desc="用户名" ,md="
### username字段说明
```javascript
  var a = 1;
```
    ")
     */
    public function mdApiFieldDesc(){
        return show(0,"",$this->request->param());
    }


    /**
     * 字段描述引用md文档
     * @Apidoc\Url("/admin/mdDemo/refMdApiFieldDesc")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("name", type="string",require=true, desc="姓名，点击查看->",mdRef="/docs/apiDesc.md#name字段" )
     */
    public function refMdApiFieldDesc(){
        return show(0,"",$this->request->param());
    }





}