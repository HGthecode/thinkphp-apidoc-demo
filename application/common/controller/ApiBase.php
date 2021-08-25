<?php


namespace app\common\controller;


use think\Controller;

class ApiBase extends Controller
{
    private $debug = [];

    public function initialize() {



    }

    public function __construct()
    {
        parent::__construct();

    }
    public function show($code = 0, $msg = '操作成功', $data = '')
    {
        $returnbase = [
            'code' => $code,
            'msg'  => $msg,
            'timestamp' => time()
        ];

        $returnbase['data'] = $data;
        if ($this->debug) {
            $returnbase['debug'] = $this->debug;
        }
        return json($returnbase);
    }
}