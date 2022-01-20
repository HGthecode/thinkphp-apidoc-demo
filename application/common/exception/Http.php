<?php


namespace app\common\exception;


use Exception;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;

class Http extends Handle
{
    public function render(Exception $e)
    {
        // 参数验证错误
        if ($e instanceof ValidateException) {
            return json($e->getError(), 422);
        }

        // 请求异常
        if ($e instanceof HttpException && request()->isAjax()) {
            return response($e->getMessage(), $e->getStatusCode());
        }

        if(method_exists($e, "getStatusCode")) {
            $httpStatus = $e->getStatusCode();
        }else{
            $httpStatus = 500;
        }

        return show(-1, $e->getMessage(), [], $httpStatus);

        // 其他错误交给系统处理
//        return parent::render($e);
    }

}