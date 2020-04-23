<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/8
 * Time: 13:34
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            // todo 数据验证
            Custom::add($request->input());
            // todo 判断是否添加成功
            return $this->response->responseJSON();
        }

        return view('admin.custom.add');
    }

    public function edit(int $id, Request $request)
    {
        $custom = Custom::where('id', $id)->first();
        // todo 验证文章是否存在，如果不存在跳转到错误提示页面

        if ($request->isMethod('post')) {
            // todo 数据验证
            Custom::edit($custom, $request->input());
            // todo 判断是否修改成功
            return $this->response->responseJSON();
        }

        $data['custom'] = $custom;
        return view('admin.custom.edit', $data);
    }

    public function lists(Request $request)
    {
        $data['custom'] = Custom::lists();
        return view('admin.custom.list', $data);
    }

    public function status(int $id, Request $request)
    {
        Log::info('修改');
        $custom = Custom::where('id', $id)->first();
        if (empty($custom->id)) {
            $this->response->setMsg(400, '信息不存在');
            return $this->response->responseJSON();
        }


        Custom::state($custom);

        $this->response->setData(['state' => (int)$custom->state]);
        return $this->response->responseJSON();
    }

    public function del(Request $request)
    {
        $delRet = Custom::del($request->input('ids'));
        if (!$delRet) {
            $this->response->setMsg(500, '删除失败');
            return $this->response->responseJSON();
        }

        return $this->response->responseJSON();

    }
}