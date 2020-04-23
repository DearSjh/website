<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/8
 * Time: 13:34
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\FriendLink;
use Illuminate\Http\Request;

class FriendLinkController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            // todo 数据验证
            FriendLink::add($request->input());
            // todo 判断是否添加成功
            return $this->response->responseJSON();
        }

        return view('admin.friendLink.add');
    }

    public function edit(int $id, Request $request)
    {
        $friendLink = FriendLink::where('id', $id)->first();
        // todo 验证文章是否存在，如果不存在跳转到错误提示页面

        if ($request->isMethod('post')) {
            // todo 数据验证
            FriendLink::edit($friendLink, $request->input());
            // todo 判断是否修改成功
            return $this->response->responseJSON();
        }

        $data['friendLink'] = $friendLink;
        return view('admin.friendLink.edit', $data);
    }

    public function lists(Request $request)
    {
        $data['friendLink'] = FriendLink::lists($request->input());
        return view('admin.friendLink.list', $data);
    }

    public function status(int $id, Request $request)
    {
        $friendLink = FriendLink::where('id', $id)->first();
        if (empty($friendLink->id)) {
            $this->response->setMsg(400, '信息不存在');
            return $this->response->responseJSON();
        }


        FriendLink::status($friendLink);

        $this->response->setData(['state' => (int)$friendLink->state]);
        return $this->response->responseJSON();
    }

    public function del(Request $request)
    {
        $delRet = FriendLink::del($request->input('ids'));
        if (!$delRet) {
            $this->response->setMsg(500, '删除失败');
            return $this->response->responseJSON();
        }

        return $this->response->responseJSON();

    }
}