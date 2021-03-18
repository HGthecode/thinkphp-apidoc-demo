<?php
namespace app\demo\controller\v2;

use hg\apidoc\annotation as Apidoc;
use app\BaseController;
use app\Request;
use app\demo\services\TestAuto as TestAutoService;
use app\demo\validate\TestAuto as TestAutoValidate;

/**
 * @Apidoc\Title("测试生成")
 * @Apidoc\Group("demo")
 */
class TestAuto extends BaseController
{

    /**
     * @Apidoc\Title("查询分页列表")
     * @Apidoc\Url("/demo/v2/testAuto/pagelist")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("name",type="varchar",require=true,desc="姓名")

     * @Apidoc\Param(ref="pagingParam")
     * @Apidoc\Returned(ref="pagingParam")
     * @Apidoc\Returned("data", type="array", ref="app\model\TestAuto\getList",withoutField="update_time,delete_time")
     */
    public function pagelist(Request $request){

        $page = $request->param("pageIndex",config('app.defaultPage'));
        $limit = $request->param("pageSize",config('app.defaultLimit'));
        $param = $request->param();
        $res = (new TestAutoService())->getPageList($page,$limit,$param);
        return show(0,null,$res);
    }

    /**
     * @Apidoc\Title("根据id查询明细")
     * @Apidoc\Url("/demo/v2/testAuto")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("id",type="int",require=true,desc="唯一id")
     * @Apidoc\Returned(ref="app\model\TestAuto\getInfoById",withoutField="delete_time")
     */
    public function detail(Request $request){
        $id = $request->param("id");
        $res = (new TestAutoService())->getInfoById($id);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("新增")
     * @Apidoc\Url("/demo/v2/testAuto")
     * @Apidoc\Method("POST")
     * @Apidoc\Param(ref="app\model\TestAuto\getInfoById",withoutField="id,create_time,update_time,delete_time")
     * @Apidoc\Returned(ref="app\model\TestAuto\getInfoById",withoutField="delete_time")
     */
    public function add(Request $request){
        $validate = new TestAutoValidate();
        $validate->goCheck("add");

        $params = $request->post();
        $res = (new TestAutoService())->add($params);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("编辑")
     * @Apidoc\Url("/demo/v2/testAuto")
     * @Apidoc\Method("PUT")
     * @Apidoc\Param( ref="app\model\TestAuto\getInfoById",withoutField="create_time,update_time,delete_time")
     * @Apidoc\Returned("data",type="boolean",desc="修改状态")
     */
    public function edit(Request $request){
        $validate = new TestAutoValidate();
        $validate->goCheck("edit");

        $params = $request->post();
        $res = (new TestAutoService())->update($params);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("删除")
     * @Apidoc\Url("/demo/v2/testAuto")
     * @Apidoc\Method("DELETE")
     * @Apidoc\Param("id",type="int",require=true,desc="唯一id")
     * @Apidoc\Returned("data",type="boolean",desc="删除状态")
     */
    public function delete(Request $request){
        $validate = new TestAutoValidate();
        $validate->goCheck("delete");

        $id = $request->param("id");
        $res = (new TestAutoService())->delete($id);
        return show(0,"",$res);
    }

}