<?php


namespace app\common\middleware;


use app\common\model\Config;
use app\Request;
use think\facade\Log;

class ApiCrossDomain
{
    protected $header = [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Credentials' => 'true',
        'Access-Control-Max-Age'           => 1800,
        'Access-Control-Allow-Methods'     => 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
        'Access-Control-Allow-Headers'     => 'Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, X-CSRF-TOKEN, X-Requested-With',
    ];

    public function handle (Request $request, \Closure $next, string $permission = ''){

//        $config_list = (new Config())->getConfigObject();
//        config($config_list,'app_config');
//        // 根据配置参数设置允许跨域的域名
//        $allow_originArr = config('app_config.allow_origin');

        $header = [];
        $header = !empty($header) ? array_merge($this->header, $header) : $this->header;
        $origin = $request->header('origin');
//        if (!empty($allow_originArr) && is_array($allow_originArr) && in_array($origin, $allow_originArr)) {
//            $header['Access-Control-Allow-Origin'] = $origin;
//        }
        $response = $next($request);
        $response->header($header);
        return $response;

    }



    /**
     * 中间件结束调度
     * @param \think\Response $response
     */
    public function end(\think\Response $response){

    }
}