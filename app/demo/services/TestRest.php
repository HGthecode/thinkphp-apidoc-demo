<?php
namespace app\demo\services;

use app\model\TestRest as TestRestModel;

class TestRest
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
        if(!empty($param['name'])){
            $where[] = ['name','=',$param['name']];
        }

        $res = (new TestRestModel())->where($where)->field('id,create_time,update_time,name,age')
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
        $res = (new TestRestModel())->withoutField('delete_time')->where('id',$id)->find();
        return $res;
    }

    /**
     * 新增
     * @param $params
     * @return RosterModel|\think\Model
     */
    public function add($params){
        $res = (new TestRestModel())->createInfo($params);
        return $res;
    }

    /**
     * 编辑
     * @param $params
     * @return bool
     */
    public function update($params){
        $res = (new TestRestModel())->updateInfo($params['id'],$params);
        return $res;
    }

    public function delete($id){
        $res = (new TestRestModel())->where('id',$id)->delete();
        if ($res){
            return true;
        }
        return false;
    }

}