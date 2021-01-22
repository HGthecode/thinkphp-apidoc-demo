<?php


namespace app\services;

use app\model\Roster as RosterModel;

class Roster
{

    /**
     * 查询分页数据
     * @param $keyword
     * @param $page
     * @param $limit
     * @return array
     * @throws \think\db\exception\DbException
     */
    public function getList($keyword,$page,$limit){
        $where = [];
        if (!empty($keyword)){
            $where[]=['name','like', "%$keyword%"];
        }
        $res = (new RosterModel())->where($where)->withoutField('delete_time')
            ->paginate(['page' => $page,'list_rows'=> $limit])
            ->toArray();
        return $res;
    }

    /**
     * 根据id查询明细
     * @param $id
     * @return array|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getInfoById($id){
        $res = (new RosterModel())->withoutField(["delete_time"])->where('id',$id)->find();
        return $res;
    }

    /**
     * 新增
     * @param $params
     * @return RosterModel|\think\Model
     */
    public function add($params){
        $res = (new RosterModel())->createInfo($params);
        return $res;
    }

    /**
     * 编辑
     * @param $params
     * @return bool
     */
    public function update($params){
        $res = (new RosterModel())->updateInfo($params['id'],$params);
        return $res;
    }

    public function delete($id){
        $res = (new RosterModel())->where('id',$id)->delete();
        if ($res){
            return true;
        }
        return false;
    }

}