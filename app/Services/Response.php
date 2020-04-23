<?php

namespace App\Services;


class Response
{

    private $code = 200;
    private $message = '操作成功';
    private $data = [];

    /**
     * 设置返回的信息
     * @param int $code 编号
     * @param string $message 信息
     */
    public function setMsg($code = 200, $message = '')
    {
        $this->code = $code;
        $this->message = $message;
    }

    /**
     * 设置返回的数据
     * @param array $data
     */
    public function setData($data = [])
    {
        $this->data = $data;
    }


    /**
     * 返回JSON数据
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseJSON($code = 200)
    {
        $arrayResult['code'] = $this->code ?? 200;
        $arrayResult['msg'] = $this->message;
        $arrayResult['data'] = $this->data;

        return response()->json($arrayResult, $code)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

//    public function responseXML($code = 200)
//    {
//
//    }
}