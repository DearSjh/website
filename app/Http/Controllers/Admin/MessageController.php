<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/3
 * Time: 12:43
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function lists(Request $request)
    {

        $list = Message::lists($request->input('page', 0));

        $data['list'] = $list;
        return view('admin.message.list', $data);
    }

    public function edit(int $id, Request $request)
    {
        $message = Message::where('id', $id)->first();
        $message->state = 1;
        $message->update();
        $data['message'] = $message;
        return view('admin.message.edit', $data);
    }

    public function del(Request $request)
    {
        $delRet = Message::del($request->input('ids'));
        if (!$delRet) {
            $this->response->setMsg(500, '删除失败');
            return $this->response->responseJSON();
        }

        return $this->response->responseJSON();

    }

    public function status(int $id, Request $request)
    {

        $message = Message::where('id', $id)->first();
        if (empty($message->id)) {
            $this->response->setMsg(400, '信息不存在');
            return $this->response->responseJSON();
        }


        Message::state($message);

        $this->response->setData(['state' => (int)$message->state]);
        return $this->response->responseJSON();
    }
}