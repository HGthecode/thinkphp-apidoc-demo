<?php
namespace app\api\services;

use application\model\TestCrud as TestCrudModel;

class TestCrud
{

    /**
     * 查询分页数据
     * @param $page
     * @param $limit
     * @return array
     * @throws \think\db\exception\DbException
     */
    public function getPageList($page,$limit,$param){
        $where = $where=[];

        $res = (new TestCrudModel())->where($where)->field('id,create_time,update_time,name,age')
            ->paginate($limit, false, ['page' => $page])
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
        $res = (new TestCrudModel())->where('id',$id)->find();
        return $res;
    }

    /**
     * 新增
     * @param $params
     * @return RosterModel|\think\Model
     */
    public function add($params){
        $res = (new TestCrudModel())->createInfo($params);
        return $res;
    }

    /**
     * 编辑
     * @param $params
     * @return bool
     */
    public function update($params){
        $res = (new TestCrudModel())->updateInfo($params['id'],$params);
        return $res;
    }

    public function delete($id){
        $res = (new TestCrudModel())->where('id',$id)->delete();
        if ($res){
            return true;
        }
        return false;
    }

}