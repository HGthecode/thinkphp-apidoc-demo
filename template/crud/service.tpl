<?php
namespace {$service.namespace};

use app\model\{$tables[0].model_name} as {$tables[0].model_name}Model;

class {$service.class_name}
{
    protected $model;

    public function __construct()
    {
        $this->model = new {$tables[0].model_name}Model();
    }
    /**
     * 查询分页数据
     * @param $page
     * @param $limit
     * @return array
     * @throws \think\db\exception\DbException
     */
    public function getPageList($page,$limit,$where=[]){
        $res = $this->model->where($where)
        ->order("id desc")
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
        $res = $this->model->where('id',$id)->find();
        return $res;
    }

    /**
    * 新增
    */
    public function add($params){
        $res = $this->model->createInfo($params);
        return $res;
    }

    /**
    * 编辑
    * @param $params
    * @return bool
    */
    public function update($params){
        $res = $this->model->updateInfo($params['id'],$params);
        return $res;
    }

    public function delete($id){
        $info = $this->model->find($id);
        $res = $info->delete();
        if ($res){
            return true;
        }
        return false;
    }


}