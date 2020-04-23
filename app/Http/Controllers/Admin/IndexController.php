<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/12/26
 * Time: 11:30
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\Menu;
use App\Models\Admin\Permission;

class IndexController extends Controller
{
    public function index()
    {

        $data['menus'] = Menu::lists();
        $menus = Admin::menuPermissions($this->userId);
//        dump($data['menus']->toArray());
//dd($menus);
        $admin = Admin::find($this->userId);

        $menusId = [];

        if ($admin['user_name'] == SUPER_ADMINISTRATOR) {

            $permissions = Permission::with('menu.parent.parent')->where('is_menu',1)->get();

            foreach ($permissions as $permission) {
                $menusId[$permission['menu_id']] = $permission['path'];
                !empty($permission['menu']['parent']['id']) && $menusId[$permission['menu']['parent']['id']] = '';
                !empty($permission['menu']['parent']['parent']['id']) && $menusId[$permission['menu']['parent']['parent']['id']] = '';
            }


        } else {
            foreach ($menus as $key => $path) {
                $menusId[$key] = $path;
            }
        }


        $data['menusId'] = $menusId;
        $data['userName'] = $admin['user_name'];

        return view('admin/index', $data);
    }
}