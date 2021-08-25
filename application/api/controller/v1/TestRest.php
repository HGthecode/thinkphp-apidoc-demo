<?php
namespace app\api\controller\v1;

use app\common\controller\ApiBase;
use hg\apidoc\annotation as Apidoc;
use app\api\services\TestRest as TestRestService;
use app\api\validate\TestRest as TestRestValidate;

/**
 * @Apidoc\Title("测试REST")
 * @Apidoc\Group("test")
 */
class TestRest extends ApiBase
{

    /**
     * @Apidoc\Title("查询分页列表")
     * @Apidoc\Url("/api/v1/testRest/pagelist")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("name",type="varchar",require=true,desc="姓名")

     * @Apidoc\Param(ref="pagingParam")
     * @Apidoc\Returned(ref="pagingParam")
     * @Apidoc\Returned("data", type="array", ref="app\model\TestRest\getList",withoutField="delete_time")
     */
    public function pagelist(){
        $request=$this->request;
        $page = $request->param("pageIndex",config('app.defaultPage'));
        $limit = $request->param("pageSize",config('app.defaultLimit'));
        $param = $request->param();
        $res = (new TestRestService())->getPageList($page,$limit,$param);
        return show(0,null,$res);
    }

    /**
     * @Apidoc\Title("根据id查询明细")
     * @Apidoc\Url("/api/v1/testRest")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("id",type="int",require=true,desc="唯一id")
     * @Apidoc\Returned(ref="app\model\TestRest\getInfoById",withoutField="delete_time")
     */
    public function detail(){
        $request=$this->request;
        $id = $request->param("id");
        $res = (new TestRestService())->getInfoById($id);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("新增")
     * @Apidoc\Url("/api/v1/testRest")
     * @Apidoc\Method("POST")
     * @Apidoc\Param(ref="app\model\TestRest\getInfoById",withoutField="id,create_time,update_time,delete_time")
     * @Apidoc\Returned(ref="app\model\TestRest\getInfoById",withoutField="delete_time")
     */
    public function add(){
        $request=$this->request;
        $validate = new TestRestValidate();
        $validate->goCheck("add");

        $params = $request->post();
        $res = (new TestRestService())->add($params);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("编辑")
     * @Apidoc\Url("/api/v1/testRest")
     * @Apidoc\Method("PUT")
     * @Apidoc\Param( ref="app\model\TestRest\getInfoById",withoutField="create_time,update_time,delete_time")
     * @Apidoc\Returned("data",type="boolean",desc="修改状态")
     */
    public function edit(){
        $request=$this->request;
        $validate = new TestRestValidate();
        $validate->goCheck("edit");

        $params = $request->post();
        $res = (new TestRestService())->update($params);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("删除")
     * @Apidoc\Url("/api/v1/testRest")
     * @Apidoc\Method("DELETE")
     * @Apidoc\Param("id",type="int",require=true,desc="唯一id")
     * @Apidoc\Returned("data",type="boolean",desc="删除状态")
     */
    public function delete(){
        $request=$this->request;
        $validate = new TestRestValidate();
        $validate->goCheck("delete");

        $id = $request->param("id");
        $res = (new TestRestService())->delete($id);
        return show(0,"",$res);
    }

}