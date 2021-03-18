<?php
namespace app\demo\services;

use app\model\TestAuto as TestAutoModel;

class TestAuto
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

        $res = (new TestAutoModel())->where($where)->field('id,create_time,name,age,sex')
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
        $res = (new TestAutoModel())->withoutField('delete_time')->where('id',$id)->find();
        return $res;
    }

    /**
     * 新增
     * @param $params
     * @return RosterModel|\think\Model
     */
    public function add($params){
        $res = (new TestAutoModel())->createInfo($params);
        return $res;
    }

    /**
     * 编辑
     * @param $params
     * @return bool
     */
    public function update($params){
        $res = (new TestAutoModel())->updateInfo($params['id'],$params);
        return $res;
    }

    public function delete($id){
        $res = (new TestAutoModel())->where('id',$id)->delete();
        if ($res){
            return true;
        }
        return false;
    }

}