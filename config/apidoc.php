<?php


// 表字段可选的字段类型
$tableFieldTypes = ["int", "tinyint", "integer", "float", "decimal", "char", "varchar", "blob", "text", "point"];
// 表字段可选的验证规则
$tableFieldCheckOptions = [
    ['label'=>'必填','value'=>'require','message'=>'缺少必要参数{$item.field}'],
    ['label'=>'数字','value'=>'number','message'=>'{$item.field}字段类型为数字'],
    ['label'=>'整数','value'=>'integer','message'=>'{$item.field}为整数'],
    ['label'=>'布尔','value'=>'boolean','message'=>'{$item.field}为布尔值'],
];
// 主表默认字段
$tableDefaultRows = [
    [
        'field'=> 'id',
        'desc'=> '唯一id',
        'type'=> 'int',
        'length'=> 11,
        'default'=> '',
        'not_null'=> true,
        'main_key'=> true,
        'incremental'=> true,
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
    ]
];

// crud的表配置自定义列
$crudTableColumns=[
    [
        'title'=>'验证',
        'field'=>'check',
        'type'=>'select',
        'width'=>180,
        'props'=>[
            'placeholder'=>'请输入',
            'mode' =>'multiple',
            'maxTagCount'=>1,
            'options'=>$tableFieldCheckOptions
        ],
    ],
    [
        'title'=>'查询',
        'field'=>'query',
        'type'=>'checkbox',
        'width'=>60
    ],
    [
        'title'=>'列表',
        'field'=>'list',
        'type'=>'checkbox',
        'width'=>60
    ],
    [
        'title'=>'明细',
        'field'=>'detail',
        'type'=>'checkbox',
        'width'=>60
    ],
    [
        'title'=>'新增',
        'field'=>'add',
        'type'=>'checkbox',
        'width'=>60
    ],
    [
        'title'=>'编辑',
        'field'=>'edit',
        'type'=>'checkbox',
        'width'=>60
    ]
];
// 模型名规则
$modelNameRules=[
    ['pattern'=>'^[A-Z]{1}([a-zA-Z0-9]|[._]){2,19}$','message'=>'模型文件名错误，请输入大写字母开头的字母+数字，长度2-19的组合']
];
// 表名规则
$tableNameRules=[
    ['pattern'=>'^[a-z]{1}([a-z0-9]|[_]){2,19}$','message'=>'表名错误，请输入小写字母开头的字母+数字/下划线，长度2-19的组合']
];


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
    'generator' =>[
        [
            'title'=>'创建Crud',
            'enable'=>true,
            'middleware'=>[
                \app\common\middleware\CreateCrudMiddleware::class
            ],
            'form' =>[
                'colspan'=>3,
                'items'=>[
                    [
                        'title'=>'控制器标题',
                        'field'=>'controller_title',
                        'type'=>'input'
                    ],
                ]
            ],
            'files'=>[
                [
                    'path'=>'application\${app[0].folder}\controller\${app[1].folder}',
                    'namespace'=>'app\${app[0].folder}\controller\${app[1].folder}',
                    'template'=>'template\crud\controller.tpl',
                    'name'=>'controller',
                    'rules'=>[
                        ['required'=>true,'message'=>'请输入控制器文件名'],
                        ['pattern'=>'^[A-Z]{1}([a-zA-Z0-9]|[._]){2,19}$','message'=>'请输入正确的目录名'],
                    ]
                ],
                [
                    'name'=>'service',
                    'path'=>'application\${app[0].folder}\services',
                    'namespace'=>'app\${app[0].folder}\services',
                    'template'=>'template\crud\service.tpl',
                ],
                [
                    'name'=>'validate',
                    'path'=>'application\${app[0].folder}\validate',
                    'namespace'=>'app\${app[0].folder}\validate',
                    'template'=>'template\crud\validate.tpl',
                ],
                [
                    'name'=>'route',
                    'path'=>'route\route.php',
                    'template'=>'template\crud\route.tpl',
                ],
            ],
            'table'=>[
                'field_types'=>$tableFieldTypes,
                'items'=>[
                    [
                        'title'=>'数据表',
                        'namespace'=>'app\model',
                        'path'=>"application\model",
                        'template'=>"template\crud\model.tpl",
                        'model_rules'=>$modelNameRules,
                        'table_rules'=>$tableNameRules,
                        'columns'=>$crudTableColumns,
                        'default_fields'=>$tableDefaultRows,
                        'default_values'=>[
                            'type'=>'varchar',
                            'length'=>255,
                            'list'=>true,
                            'detail'=>true,
                            'add'=>true,
                            'edit'=>true,
                        ],
                    ],
                ]
            ]
        ],
    ]



];
