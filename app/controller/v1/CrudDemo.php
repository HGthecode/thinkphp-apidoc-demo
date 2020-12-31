<?php


namespace app\controller\v1;

use app\validate\SaveRoster;
use app\validate\IDInt;
use app\services\Roster as RosterService;
use app\Request;

/**
 * @title 增删改查示例
 * @controller CrudDemo
 */
class CrudDemo
{
    /**
     * @title 查询分页列表
     * @author HG
     * @url /v1/crudDemo/list
     * @method GET
     * @param name:keyword type:string desc:关键词 name
     * @param ref:definitions\pagingParam
     * @return name:total type:int desc:总条数
     * @return name:data type:array ref:app\model\Roster\getList withoutField:delete_time
     */
    public function list(Request $request){
        $keyword = $request->param("keyword");
        $page = $request->param("pageIndex",1);
        $limit = $request->param("pageSize",10);
        if ($limit>20){
            throw new \think\exception\HttpException(422, "演示功能，最大查询20条/页");
        }
        $res = (new RosterService())->getList($keyword,$page,$limit);
        return show(null,null,$res);
    }

    /**
     * @title 根据id查询信息
     * @desc
     * @author HG
     * @url /v1/crudDemo/info
     * @method GET
     * @param ref:definitions\getInfo
     * @return ref:app\model\Roster\getInfoById
     */
    public function info(Request $request){
        $validate = new IDInt();
        $validate->goCheck();
        $id = $request->param("id");
        $res = (new RosterService())->getInfoById($id);
        return show(null,"",$res);
    }


    /**
     * @title 新增
     * @desc
     * @author HG
     * @url /v1/crudDemo/add
     * @method POST
     * @param ref:app\model\Roster\getInfoById withoutField:id,create_time,update_time
     * @return ref:app\model\Roster\getInfoById withoutField:delete_time
     */
    public function add(Request $request){
        $validate = new SaveRoster();
        $validate->goCheck("add");
        $params = $request->post();
        $res = (new RosterService())->add($params);
        return show(null,"",$res);
    }

    /**
     * @title 编辑
     * @desc
     * @author HG
     * @url /v1/crudDemo/edit
     * @method PUT
     * @param ref:app\model\Roster\getInfoById withoutField:create_time,update_time
     * @return type:boolean desc:编辑
     */
    public function edit(Request $request){
        $validate = new SaveRoster();
        $validate->goCheck("edit");
        $params = $request->post();
        $res = (new RosterService())->update($params);
        return show(null,"",$res);
    }

    /**
     * @title 删除
     * @desc
     * @author HG
     * @url /v1/crudDemo/delete
     * @method DELETE
     * @param name:id type:int require:1 desc:唯一id
     * @return type:boolean desc:删除状态
     */
    public function delete(Request $request){
        $validate = new IDInt();
        $params = $validate->goCheck();
        $res = (new RosterService())->delete($params['id']);
        return show(null,"",$res);
    }

}