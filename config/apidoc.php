<?php
return [
    // 文档标题
    'title'              => 'APi接口文档',
    // 文档描述
    'desc'               => '本演示源码地址：https://github.com/HGthecode/thinkphp-apidoc-demo',
    // 版权申明
    'copyright'          => 'Powered By hg-code',
    // 默认请求类型
    'default_method'=>'GET',
    // 默认作者
    'default_author'=>'HG-CODE',
    // 允许跨域访问
    'allowCrossDomain'=>true,
    // 设置可选版本
    'apps'           => [
        ['title'=>'后台管理','path'=>'app\admin\controller','folder'=>'admin'],
        [
            'title'=>'演示示例',
            'folder'=>'demo',
            'items'=>[
                ['title'=>'V1.0','path'=>'app\demo\controller\v1','folder'=>'v1'],
                ['title'=>'V2.0','path'=>'app\demo\controller\v2','folder'=>'v2','password'=>'123']
            ]
        ]
    ],
    // 控制器分组
    'groups'             => [
        ['title'=>'基础模块','name'=>'base'],
        ['title'=>'示例模块','name'=>'demo'],
        ['title'=>'测试模块','name'=>'test'],
        ['title'=>'无用模块','name'=>'nouse'],
    ],
    // 指定公共注释定义的文件地址
    'definitions'        => "app\common\controller\Definitions",
    //指定生成文档的控制器
    'controllers'        => [],
    // 过滤，不解析的控制器
    'filter_controllers' => [
//        'app\admin\controller\BaseDemo'
    ],
    // 缓存配置
    'cache'              => [
        // 是否开启缓存
        'enable' => false,
        // 缓存文件路径
        'path'   =>  '../runtime/apidoc/',
        // 是否显示更新缓存按钮
        'reload' => true,
        // 最大缓存文件数
        'max'    => 5,  //最大缓存数量
    ],
    // 权限认证配置
    'auth'               => [
        // 是否启用密码验证
        'enable'     => false,
        // 验证密码
        'password'   => "123456",
        // 密码加密盐
        'secret_key' => "apidoc#hg_code",
    ],
    // 过滤、不解析的方法名称
    'filter_method'     => [],
    // 统一的请求Header
    'headers'=>[
        ['name'=>'Authorization','type'=>'string','require'=>true,'desc'=>'登录票据'],
    ],

    // 统一的请求参数Parameters
    'parameters'=>[
//        ['name'=>'code','type'=>'string','desc'=>'全局code'],
    ],
    // 统一的请求响应体
    'responses'=>[
        ['name'=>'code','desc'=>'状态码','type'=>'int'],
        ['name'=>'message','desc'=>'操作描述','type'=>'string'],
        ['name'=>'data','desc'=>'业务数据','main'=>true,'type'=>'object'],
    ],
    // md文档
    'docs'              => [
        'menu_title' => '开发文档',
        'menus'      => [
            ['title'=>'关于Apidoc','path'=>'docs/readme'],
            ['title'=>'md语法示例','path'=>'docs/Use'],
            [
                'title'=>'HTTP响应编码',
                'items'=>[
                    ['title'=>'status错误码说明','path'=>'docs/HttpStatus'],
                    ['title'=>'code错误码说明','path'=>'docs/HttpCode_${app[0].folder}_${app[1].folder}'],
                ],
            ]
        ]
    ],
    'crud'=>[
        'controller'=>[
            'path'=>'app\${app[0].folder}\controller\${app[1].folder}',
            'template'=>'../template/controller',
        ],

        'service'=>[
            'path'=>'app\${app[0].folder}\services',
            'template'=>'../template/service',
        ],

        'model'=>[
            'path'=>'app\model',
            'template'=>'../template/model',
            'default_fields'=>[
                [
                    'field'=> 'id',
                    'desc'=> '唯一id',
                    'type'=> 'int',
                    'length'=> 11,
                    'default'=> '',
                    'not_null'=> true,
                    'main_key'=> true,
                    'incremental'=> true,
                    'validate'=>'',
                    'query'=> false,
                    'list'=> true,
                    'detail'=> true,
                    'add'=> false,
                    'edit'=> true
                ],
                [
                    'field'=> 'create_time',
                    'desc'=> '创建时间',
                    'type'=> 'int',
                    'length'=> 10,
                    'default'=> '',
                    'not_null'=> false,
                    'main_key'=> false,
                    'incremental'=> false,
                    'validate'=>'',
                    'query'=> false,
                    'list'=> true,
                    'detail'=> true,
                    'add'=> false,
                    'edit'=> false
                ],
                [
                    'field'=> 'update_time',
                    'desc'=> '更新时间',
                    'type'=> 'int',
                    'length'=> 10,
                    'default'=> '',
                    'not_null'=> false,
                    'main_key'=> false,
                    'incremental'=> false,
                    'validate'=>'',
                    'query'=> false,
                    'list'=> true,
                    'detail'=> true,
                    'add'=> false,
                    'edit'=> false
                ],
                [
                    'field'=> 'delete_time',
                    'desc'=> '删除时间',
                    'type'=> 'int',
                    'length'=> 10,
                    'default'=> '',
                    'not_null'=> false,
                    'main_key'=> false,
                    'incremental'=> false,
                    'validate'=>'',
                    'query'=> false,
                    'list'=> false,
                    'detail'=> false,
                    'add'=> false,
                    'edit'=> false
                ]
            ],
            'fields_types'=>[
                "int",
                "tinyint",
                "integer",
                "float",
                "decimal",
                "char",
                "varchar",
                "blob",
                "text",
                "point",
            ]
        ],
        'validate'=>[
            'path'=>'app\${app[0].folder}\validate',
            'template'=>'../template/validate',
            'rules'=>[
                ['name'=>'必填','rule'=>'require','message'=>'缺少必要参数${field}'],
                ['name'=>'数字','rule'=>'number','message'=>['${field}字段类型为数字']],
                ['name'=>'年龄','rule'=>'number|between:1,120','message'=>['${field}.number'=>'${field}${desc}字段类型为数字','${field}.between'=>'${field}只能在1-120之间']]
            ]
        ],
        // 生成路由
        'route'=>[
            'path'=>'${app[0].folder}\route\${app[0].folder}.php',
            'template'=>'../template/route_${app[0].folder}',

        ]
    ]

];
