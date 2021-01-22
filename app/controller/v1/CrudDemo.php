<?php


namespace app\controller\v1;

use app\validate\SaveRoster;
use app\validate\IDInt;
use app\services\Roster as RosterService;
use app\Request;
use hg\apidoc\annotation as Apidoc;

/**
 * @Apidoc\title("增删改查示例")
 * @Apidoc\group("demo")
 */
class CrudDemo
{

    /**
     * @Apidoc\title("查询分页列表")
     * @Apidoc\Desc("根据查询条件获取分页列表")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/crudDemo/list")
     * @Apidoc\method("GET")
     * @Apidoc\param("keyword", type="string", desc="关键词" )
     * @Apidoc\param("status", type="int", desc="状态" )
     * @Apidoc\param( ref="pagingParam")
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
     * @Apidoc\title("根据id查询信息")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/crudDemo/info")
     * @Apidoc\method("GET")
     * @Apidoc\param( ref="getInfo")
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
     * @Apidoc\title("新增")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/crudDemo/add")
     * @Apidoc\method("POST")
     * @Apidoc\param( ref="app\model\Roster\getInfoById",withoutField="id,create_time,update_time")
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
     * @Apidoc\title("编辑")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/crudDemo/edit")
     * @Apidoc\method("PUT")
     * @Apidoc\param( ref="app\model\Roster\getInfoById",withoutField="create_time,update_time")
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
     * @Apidoc\title("删除")
     * @Apidoc\Author("HG")
     * @Apidoc\url("/v1/crudDemo/delete")
     * @Apidoc\method("DELETE")
     * @param name:id type:int require:1 desc:唯一id
     * @Apidoc\Returned("data",type="boolean",desc="删除状态")
     */
    public function delete(Request $request){
        $validate = new IDInt();
        $params = $validate->goCheck();
        $res = (new RosterService())->delete($params['id']);
        return show(0,"",$res);
    }

}