<?php
return [
    // 文档标题
    'title'              => 'APi接口文档',
    // 文档描述
    'desc'               => '本演示源码地址：https://github.com/HGthecode/thinkphp-apidoc-demo',
    // 默认请求类型
    'default_method'=>'GET',
    // 默认作者
    'default_author'=>'HG-CODE',
    // 允许跨域访问
    'allowCrossDomain'=>true,
    // 设置可选版本
    'apps'           => [
        [
            'title'=>'lang(apidoc.apps.admin)',
            'path'=>'application\admin\controller',
            'folder'=>'admin',
            'groups'             => [
                ['title'=>'lang(apidoc.groups.base)','name'=>'base'],
                ['title'=>'lang(apidoc.groups.demo)','name'=>'demo'],
                ['title'=>'lang(apidoc.groups.test)','name'=>'test'],
                ['title'=>'lang(apidoc.group.nouse)','name'=>'nouse'],
                ['title'=>'多级分组','name'=>'subMenu',
                 'children'=>[
                     ['title'=>'子级1','name'=>'subv1',],
                     ['title'=>'子级2','name'=>'subv2'],
                 ]
                ],
            ],
//            'controllers'=>[
//                'app\admin\controller\BaseDemo',
//                'app\admin\controller\CrudDemo',
//            ]
        ],
        [
            'title'=>'Api接口',
            'folder'=>'api',
            'items'=>[
                ['title'=>'V1.0','path'=>'application\api\controller\v1','folder'=>'v1'],
                ['title'=>'V2.0','path'=>'application\api\controller\v2','folder'=>'v2','password'=>'123']
            ]
        ]
    ],
    // 自动生成url回调函数
    'auto_url' => [
//        'custom' =>function($class,$method){
//            return "/".str_replace('\\','/',$class).$method;
//        },
        // 字母规则
        'letter_rule' => "lcfirst",
        // 多级路由分隔符
        'multistage_route_separator'  =>"."

    ],
    // 指定公共注释定义的文件地址
    'definitions'        => "app\common\controller\Definitions",
    // 缓存配置
    'cache'              => [
        // 是否开启缓存
        'enable' => false,
    ],
    // 权限认证配置
    'auth'               => [
        // 是否启用密码验证
        'enable'     => false,
        // 全局访问密码
        'password'   => "123456",
        // 密码加密盐
        'secret_key' => "apidoc#hg_code",
        // 有效期
        'expire' => 24*60*60
    ],
    // 统一的请求Header
    'headers'=>[
        ['name'=>'Authorization','type'=>'string','require'=>true,'desc'=>'lang(apidoc.config.headers.Authorization)'],
    ],
    // 统一的请求参数Parameters
    'parameters'=>[],
    // 统一的请求响应体
    'responses'=>[
        ['name'=>'code','desc'=>'lang(apidoc.config.responses.code)','type'=>'int'],
        ['name'=>'message','desc'=>'lang(apidoc.config.responses.message)','type'=>'string'],
        ['name'=>'data','desc'=>'lang(apidoc.config.responses.data)','main'=>true,'type'=>'object'],
    ],
    // md文档
    'docs'              => [
        ['title'=>'lang(apidoc.doc.about)','path'=>'docs/readme'],
        ['title'=>'md语法示例','path'=>'docs/Use'],
        [
            'title'=>'HTTP响应编码',
            'children'=>[
                ['title'=>'status错误码说明','path'=>'docs/HttpStatus'],
                ['title'=>'code错误码说明','path'=>'docs/HttpCode_${app[0].folder}_${app[1].folder}'],
            ],
        ]
    ],

];
