<?php


namespace app\admin\controller;

use app\common\validate\SaveRoster;
use app\common\validate\IDInt;
use app\admin\services\Roster as RosterService;
use app\Request;
use hg\apidoc\annotation as Apidoc;

/**
 * @Apidoc\Title("增删改查示例")
 * @Apidoc\Group("demo")
 */
class CrudDemo
{

    /**
     * @Apidoc\Title("查询分页列表")
     * @Apidoc\Desc("根据查询条件获取分页列表")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/crudDemo/list")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("keyword", type="string", desc="关键词" )
     * @Apidoc\Param( ref="pagingParam")
     * @Apidoc\Returned(ref="pagingParam")
     * @Apidoc\Returned("data", type="array", ref="app\model\Roster\getList",withoutField="delete_time")
     */
    public function list(Request $request){
        $keyword = $request->param("keyword");
        $page = $request->param("pageIndex",1);
        $limit = $request->param("pageSize",10);
        if ($limit>20){
            throw new \think\exception\HttpException(422, "演示功能，最大查询20条/页");
        }
        $res = (new RosterService())->getList($keyword,$page,$limit);
        return show(0,null,$res);
    }

    /**
     * @Apidoc\Title("根据id查询信息")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/crudDemo/info")
     * @Apidoc\Method("GET")
     * @Apidoc\Param( ref="getInfo")
     * @Apidoc\Returned(ref="app\model\Roster\getInfoById")
     */
    public function info(Request $request){
        $validate = new IDInt();
        $validate->goCheck();
        $id = $request->param("id");
        $res = (new RosterService())->getInfoById($id);
        return show(0,"",$res);
    }



    /**
     * @Apidoc\Title("新增")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/crudDemo/add")
     * @Apidoc\Method("POST")
     * @Apidoc\Param( ref="app\model\Roster\getInfoById",withoutField="id,create_time,update_time")
     * @Apidoc\Returned(ref="app\model\Roster\getInfoById")
     */
    public function add(Request $request){
        $validate = new SaveRoster();
        $validate->goCheck("add");
        $params = $request->post();
        $res = (new RosterService())->add($params);
        return show(0,"",$res);
    }



    /**
     * @Apidoc\Title("编辑")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/crudDemo/edit")
     * @Apidoc\Method("PUT")
     * @Apidoc\Param( ref="app\model\Roster\getInfoById",withoutField="create_time,update_time")
     * @Apidoc\Returned("data",type="boolean",desc="修改状态")
     */
    public function edit(Request $request){
        $validate = new SaveRoster();
        $validate->goCheck("edit");
        $params = $request->post();
        $res = (new RosterService())->update($params);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("删除")
     * @Apidoc\Author("HG")
     * @Apidoc\Url("/admin/crudDemo/delete")
     * @Apidoc\Method("DELETE")
     * @Apidoc\Param("id",type="int",require=true,desc="唯一id")
     * @Apidoc\Returned("data",type="boolean",desc="删除状态")
     */
    public function delete(Request $request){
        $validate = new IDInt();
        $params = $validate->goCheck();
        $res = (new RosterService())->delete($params['id']);
        return show(0,"",$res);
    }

}