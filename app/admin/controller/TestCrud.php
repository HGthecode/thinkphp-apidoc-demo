<?php
namespace app\admin\controller;

use hg\apidoc\annotation as Apidoc;
use app\BaseController;
use app\Request;
use app\admin\services\TestCrud as TestCrudService;
use app\admin\validate\SaveTestCrud as SaveTestCrudValidate;

/**
 * @Apidoc\Title("自动生成Crud")
 * @Apidoc\Group("test")
 */
class TestCrud extends BaseController
{

    /**
     * @Apidoc\Title("查询分页列表")
     * @Apidoc\Url("/admin/testCrud/pagelist")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("name",type="varchar",require=true,desc="姓名")

     * @Apidoc\Param(ref="pagingParam")
     * @Apidoc\Returned(ref="pagingParam")
     * @Apidoc\Returned("data", type="array", ref="app\model\TestCrud\getList",withoutField="delete_time")
     */
    public function pagelist(Request $request){

        $page = $request->param("pageIndex",config('app.defaultPage'));
        $limit = $request->param("pageSize",config('app.defaultLimit'));
        $param = $request->param();
        $res = (new TestCrudService())->getPageList($page,$limit,$param);
        return show(0,null,$res);
    }

    /**
     * @Apidoc\Title("根据id查询明细")
     * @Apidoc\Url("/admin/testCrud/detail")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("id",type="int",require=true,desc="唯一id")
     * @Apidoc\Returned(ref="app\model\TestCrud\getInfoById",withoutField="delete_time")
     */
    public function detail(Request $request){
        $id = $request->param("id");
        $res = (new TestCrudService())->getInfoById($id);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("新增")
     * @Apidoc\Url("/admin/testCrud/add")
     * @Apidoc\Method("POST")
     * @Apidoc\Param(ref="app\model\TestCrud\getInfoById",withoutField="id,create_time,update_time,delete_time")
     * @Apidoc\Returned(ref="app\model\TestCrud\getInfoById",withoutField="delete_time")
     */
    public function add(Request $request){
        $validate = new SaveTestCrudValidate();
        $validate->goCheck("add");

        $params = $request->post();
        $res = (new TestCrudService())->add($params);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("编辑")
     * @Apidoc\Url("/admin/testCrud/edit")
     * @Apidoc\Method("PUT")
     * @Apidoc\Param( ref="app\model\TestCrud\getInfoById",withoutField="create_time,update_time,delete_time")
     * @Apidoc\Returned("data",type="boolean",desc="修改状态")
     */
    public function edit(Request $request){
        $validate = new SaveTestCrudValidate();
        $validate->goCheck("edit");

        $params = $request->post();
        $res = (new TestCrudService())->update($params);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("删除")
     * @Apidoc\Url("/admin/testCrud/delete")
     * @Apidoc\Method("DELETE")
     * @Apidoc\Param("id",type="int",require=true,desc="唯一id")
     * @Apidoc\Returned("data",type="boolean",desc="删除状态")
     */
    public function delete(Request $request){
        $validate = new SaveTestCrudValidate();
        $validate->goCheck("delete");

        $id = $request->param("id");
        $res = (new TestCrudService())->delete($id);
        return show(0,"",$res);
    }

}