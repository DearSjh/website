<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/10
 * Time: 12:08
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function add(Request $request)
    {

        if ($request->isMethod('post')) {
            // todo 验证数据；防止重复数据

            Permission::add($request->input());
            return $this->response->responseJSON();
        }

        $data['menu'] = Menu::lists();

        return view('admin.permission.add', $data);
    }

    public function edit(int $id, Request $request)
    {

        $permission = Permission::where('id', $id)->first();
//        if(empty($category->id)){
//            //跳转到错误页面
//        }

        if ($request->isMethod('post')) {

            // todo 验证数据；防止重复数据

            Permission::edit($permission, $request->input());
            return $this->response->responseJSON();
        }

        $data['menu'] = Menu::lists();
        $data['permission'] = $permission;
        return view('admin.permission.edit', $data);
    }

    public function lists(Request $request)
    {

        $data['permission'] = Permission::lists($request->input(), $request->input('page', 0));
        return view('admin.permission.list', $data);
    }

    public function del(Request $request)
    {
        // todo 验证数据
        $rt = Permission::del($request->input('ids'));
        if(!$rt){
            $this->response->setMsg(500,'删除失败');
        }
        return $this->response->responseJSON();

    }
}