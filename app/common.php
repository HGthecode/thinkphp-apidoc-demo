<?php
// 应用公共文件

/**
 * 统一json返回格式
 * @param int $code
 * @param string $message
 * @param array $data
 * @param int $httpStatus
 * @return \think\response\Json
 */
function show($code = 0,$message = "",$data = [],$httpStatus = 200) {
    $result = [
        "code" => $code,
        "message" => $message,
        "data" => $data
    ];
    return json($result, $httpStatus);
}