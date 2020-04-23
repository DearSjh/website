<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/10
 * Time: 16:22
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    public function lists()
    {

        $data['role'] = Role::lists();
        return view('admin.role.list', $data);
    }

    public function add(Request $request)
    {

        if ($request->isMethod('post')) {
            // todo 验证数据；验证角色名是否重复
            Role::add($request->input(), $request->input('id'));
            return $this->response->responseJSON();
        }

        $data['menus'] = Menu::lists(); // 根据菜单查找权限
        return view('admin.role.add', $data);
    }

    public function edit(int $id, Request $request)
    {

        $role = Role::with('permissions')->where('id', $id)->first();
        // todo 如果数据不存在，跳转到错误页面

        if ($request->isMethod('post')) {
            // todo 验证数据；验证角色名是否重复
            Role::edit($role, $request->input('id'));
            return $this->response->responseJSON();
        }

        // 获取该角色下的所有的权限ID，然后放到数组中，便于在视图中判断权限是不是被选中
        $permission = [];
        foreach ($role->permissions as $item) {
            array_push($permission, $item->pivot->permission_id);
        }

        $data['menus'] = Menu::lists(); // 根据菜单查找权限
        $data['role'] = $role;
        $data['permission'] = $permission;

        return view('admin.role.edit', $data);
    }

    public function del(Request $request)
    {
        // todo 验证数据，必须是数组

        try {

            DB::transaction(function () use ($request) {
                // 查询出所有要删除的角色。
                $roles = Role::whereIn('id', $request->input('ids'))->get();

                foreach ($roles as $role) {
                    // 删除角色
                    Role::del($role);
                }
            });


        } catch (\Exception $e) {
            Log::error("删除角色失败，{$e->getMessage()}");
            $this->response->setMsg(500, '删除角色失败');
            return $this->response->responseJSON();
        }

        return $this->response->responseJSON();
    }

    public function status(int $id, Request $request)
    {

        $role = Role::where('id', $id)->first();
        if (empty($role->id)) {
            $this->response->setMsg(400, '信息不存在');
            return $this->response->responseJSON();
        }


        Role::isOpen($role);

        $this->response->setData(['state' => (int)$role->state]);
        return $this->response->responseJSON();
    }
}