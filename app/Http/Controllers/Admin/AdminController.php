<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    public function add(Request $request)
    {

        if ($request->isMethod('post')) {
            // todo 验证数据；验证管理员不能重复
            Admin::add($request->input(), $request->input('roles'));

            return $this->response->responseJSON();
        }

        // 角色列表
        $roles = Role::lists();

        $data['roles'] = $roles;
        return view('admin.admin.add', $data);
    }

    public function edit(int $id, Request $request)
    {

        $admin = Admin::with('roles')->where('id', $id)->first();
        // todo 如果数据不存在，跳转到错误页面

        if ($request->isMethod('post')) {
            if ($request->input('password') != $request->input('repassword')) {
                $this->setMsg(400, '两次输入密码不一致');
                return $this->response->responseJSON();
            }

            // todo 验证数据；验证是否重复
            Admin::edit($admin, $request->input(), $request->input('roles'));
            return $this->response->responseJSON();
        }


        $usedRoles = [];
        foreach ($admin->roles as $item) {
            array_push($usedRoles, $item->pivot->role_id);
        }

        // 角色列表
        $roles = Role::lists();
        $data['roles'] = $roles;
        $data['usedRoles'] = $usedRoles;
        $data['admin'] = $admin;

        return view('admin.admin.edit', $data);
    }


    public function lists(Request $request)
    {

        $admins = Admin::lists($request->input(), $request->input('page', 0));

        $data['admins'] = $admins;
        return view('admin.admin.list', $data);
    }


    public function del(Request $request)
    {
        // todo 验证数据，必须是数组

        try {

            DB::transaction(function () use ($request) {
                // 查询出所有要删除的管理员。
                $admins = Admin::whereIn('id', $request->input('ids'))->get();

                foreach ($admins as $admin) {
                    // 删除管理员
                    Admin::del($admin);
                }
            });


        } catch (\Exception $e) {
            Log::error("删除管理员失败，{$e->getMessage()}");
            $this->response->setMsg(500, '删除管理员失败');
            return $this->response->responseJSON();
        }

        return $this->response->responseJSON();
    }

}