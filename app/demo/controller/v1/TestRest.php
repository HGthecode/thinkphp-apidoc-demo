<?php
namespace app\demo\controller\v1;

use hg\apidoc\annotation as Apidoc;
use app\BaseController;
use app\Request;
use app\demo\services\TestRest as TestRestService;
use app\demo\validate\TestRest as TestRestValidate;

/**
 * @Apidoc\Title("测试REST")
 * @Apidoc\Group("test")
 */
class TestRest extends BaseController
{

    /**
     * @Apidoc\Title("查询分页列表")
     * @Apidoc\Url("/demo/v1/testRest/pagelist")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("name",type="varchar",require=true,desc="姓名")

     * @Apidoc\Param(ref="pagingParam")
     * @Apidoc\Returned(ref="pagingParam")
     * @Apidoc\Returned("data", type="array", ref="app\model\TestRest\getList",withoutField="delete_time")
     */
    public function pagelist(Request $request){

        $page = $request->param("pageIndex",config('app.defaultPage'));
        $limit = $request->param("pageSize",config('app.defaultLimit'));
        $param = $request->param();
        $res = (new TestRestService())->getPageList($page,$limit,$param);
        return show(0,null,$res);
    }

    /**
     * @Apidoc\Title("根据id查询明细")
     * @Apidoc\Url("/demo/v1/testRest")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("id",type="int",require=true,desc="唯一id")
     * @Apidoc\Returned(ref="app\model\TestRest\getInfoById",withoutField="delete_time")
     */
    public function detail(Request $request){
        $id = $request->param("id");
        $res = (new TestRestService())->getInfoById($id);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("新增")
     * @Apidoc\Url("/demo/v1/testRest")
     * @Apidoc\Method("POST")
     * @Apidoc\Param(ref="app\model\TestRest\getInfoById",withoutField="id,create_time,update_time,delete_time")
     * @Apidoc\Returned(ref="app\model\TestRest\getInfoById",withoutField="delete_time")
     */
    public function add(Request $request){
        $validate = new TestRestValidate();
        $validate->goCheck("add");

        $params = $request->post();
        $res = (new TestRestService())->add($params);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("编辑")
     * @Apidoc\Url("/demo/v1/testRest")
     * @Apidoc\Method("PUT")
     * @Apidoc\Param( ref="app\model\TestRest\getInfoById",withoutField="create_time,update_time,delete_time")
     * @Apidoc\Returned("data",type="boolean",desc="修改状态")
     */
    public function edit(Request $request){
        $validate = new TestRestValidate();
        $validate->goCheck("edit");

        $params = $request->post();
        $res = (new TestRestService())->update($params);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("删除")
     * @Apidoc\Url("/demo/v1/testRest")
     * @Apidoc\Method("DELETE")
     * @Apidoc\Param("id",type="int",require=true,desc="唯一id")
     * @Apidoc\Returned("data",type="boolean",desc="删除状态")
     */
    public function delete(Request $request){
        $validate = new TestRestValidate();
        $validate->goCheck("delete");

        $id = $request->param("id");
        $res = (new TestRestService())->delete($id);
        return show(0,"",$res);
    }

}