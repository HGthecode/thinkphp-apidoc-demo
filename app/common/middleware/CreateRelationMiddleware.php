<?php

namespace app\common\middleware;

/**
 * 生成器创建关联一对多中间件
 */
class CreateRelationMiddleware
{

    public function before ($tplParams){

        // 验证关联字段
        if (empty($tplParams['form']['relation_field'])){
            throw new \think\exception\HttpException(415, "请填写【关联字段】");
        }
        $relation_field = $tplParams['form']['relation_field'];
        $not_relation_field = true;
        if (!empty($tplParams['tables']) && count($tplParams['tables'])==2 && !empty($tplParams['tables'][1]['datas']) && count($tplParams['tables'][1]['datas'])){
            foreach ($tplParams['tables'][1]['datas'] as $row) {
                if (!empty($row['field']) && $row['field'] === $relation_field){
                    $not_relation_field=false;
                }
            }
        }
        if ($not_relation_field){
            throw new \think\exception\HttpException(415, "副表中不存在关联字段");
        }
    }

    public function after($tplParams){

    }




}