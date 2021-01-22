<?php


namespace app\model;

use think\Model;
use hg\apidoc\annotation\Field;
use hg\apidoc\annotation\WithoutField;
use hg\apidoc\annotation\AddField;

class BaseModel extends Model
{
    protected $autoWriteTimestamp = true;
    protected  $deleteTime = 'delete_time';

    /**
     * 根据查询条件获取当前模型的 分页列表
     */
    public function getList($where=[],$page=0,$limit=20,$field=[],$order=["id" => "desc"]) {
        $list = $this->where($where)->order($order)->field($field)->withoutField('delete_time')
            ->paginate(['page' => $page,'list_rows'=> $limit])->toArray();
        return $list;
    }

    /**
     * @withoutField("delete_time")
     */
    public function getInfoById($id){
        $info = $this->where('id',$id)->withoutField(['delete_time'])->find();
        return $info;
    }

    /**
     * 新增一条数据
     * @param $data
     * @return BaseModel|array|Model
     */
    public function createInfo($data){
        $res = $this->create($data);
        return $res;
    }

    /**
     * 按id 更新数据
     * @param $id
     * @param $data
     * @return bool
     */
    public function updateInfo($id, $data,$field = true) {
        $res = $this->where(["id" => $id])->field($field)->save($data);
        if ($res){
            return true;
        }else{
            return false;
        }
    }


}