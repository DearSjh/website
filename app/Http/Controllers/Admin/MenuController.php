<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/9
 * Time: 18:34
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function add(Request $request)
    {

        if ($request->isMethod('post')) {

            // todo 对新增数据做验证；数据不能重复做验证

            Menu::add($request->input());
            return $this->response->responseJSON();
        }

        return view('admin.menu.add');
    }

    public function addChild(int $id, Request $request)
    {

        // 同时获取父级的信息
        $menu = Menu::where('id', $id)->first();
//        if(empty($category->id)){
//            //跳转到错误页面
//        }

        // 判断不是不post方式提交数据
        if ($request->isMethod('post')) {

            // todo 数据验证；数据不能重复做验证

            Menu::add($request->input());
            return $this->response->responseJSON();
        }

        $data['menu'] = $menu;
        return view('admin.menu.addChild', $data);
    }

    public function edit(int $id, Request $request)
    {

        $category = Menu::where('id', $id)->first();
//        if(empty($category->id)){
//            //跳转到错误页面
//        }

        if ($request->isMethod('post')) {

            // todo 数据验证
            Menu::edit($category, $request->input());
            return $this->response->responseJSON();
        }


        $data['menu'] = $category;
        return view('admin.menu.edit', $data);
    }

    public function editChild(int $id, Request $request)
    {

        $category = Menu::where('id', $id)->first();
//        if(empty($category->id)){
//            //跳转到错误页面
//        }

        if ($request->isMethod('post')) {

            // todo 数据验证
            Menu::edit($category, $request->input());
            return $this->response->responseJSON();
        }


        $data['menu'] = $category;
        return view('admin.menu.editChild', $data);
    }

    public function lists(Request $request)
    {
        $data['menu'] = Menu::lists();
        return view('admin.menu.list', $data);
    }

    public function del(Request $request)
    {
        $delRet = Menu::del($request->input('ids'));
        if (!$delRet) {
            $this->response->setMsg(500, '删除失败');
            return $this->response->responseJSON();
        }

        return $this->response->responseJSON();

    }
}