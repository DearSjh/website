<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/8
 * Time: 13:34
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            // todo 数据验证
            Banner::add($request->input());
            // todo 判断是否添加成功
            return $this->response->responseJSON();
        }

        return view('admin.banner.add');
    }

    public function edit(int $id, Request $request)
    {
        $banner = Banner::where('id', $id)->first();
        // todo 验证文章是否存在，如果不存在跳转到错误提示页面

        if ($request->isMethod('post')) {
            // todo 数据验证
            Banner::edit($banner, $request->input());
            // todo 判断是否修改成功
            return $this->response->responseJSON();
        }

        $data['banner'] = $banner;
        return view('admin.banner.edit', $data);
    }

    public function lists(Request $request)
    {
        $data['banner'] = Banner::lists();
        return view('admin.banner.list', $data);
    }

    public function status(int $id, Request $request)
    {

        $banner = Banner::where('id', $id)->first();
        if (empty($banner->id)) {
            $this->response->setMsg(400, '信息不存在');
            return $this->response->responseJSON();
        }


        Banner::state($banner);

        $this->response->setData(['state' => (int)$banner->state]);
        return $this->response->responseJSON();
    }
    public function del(Request $request)
    {
        $delRet = Banner::del($request->input('ids'));
        if (!$delRet) {
            $this->response->setMsg(500, '删除失败');
            return $this->response->responseJSON();
        }

        return $this->response->responseJSON();

    }
}