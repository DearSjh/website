<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/3
 * Time: 16:21
 */


class MenuTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            ['parent_id' => 0, 'name' => '网站配置', 'icon_code' => '&#xe60b;', 'link' => '/admin/siteSetting', 'sort' => 1, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 0, 'name' => '文章管理', 'icon_code' => '&#xe608;', 'link' => '', 'sort' => 3, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 2, 'name' => '分类列表', 'icon_code' => '', 'link' => '/admin/category/list', 'sort' => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 2, 'name' => '文章列表', 'icon_code' => '', 'link' => '/admin/article/list', 'sort' => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 2, 'name' => '单页列表', 'icon_code' => '', 'link' => '/admin/singlePage/list', 'sort' => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 0, 'name' => '在线留言', 'icon_code' => '&#xe603;', 'link' => '/admin/message/list', 'sort' => 6, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 0, 'name' => '友情链接', 'icon_code' => '&#xe60c;', 'link' => '/admin/friendLink/list', 'sort' => 5, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 0, 'name' => 'RBAC', 'icon_code' => '&#xe60a;', 'link' => '', 'sort' => 7, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 8, 'name' => '管理员列表', 'icon_code' => '', 'link' => '/admin/admin/list', 'sort' => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 8, 'name' => '角色管理', 'icon_code' => '', 'link' => '/admin/role/list', 'sort' => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 8, 'name' => '菜单管理', 'icon_code' => '', 'link' => '/admin/menu/list', 'sort' => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 8, 'name' => '权限管理', 'icon_code' => '', 'link' => '/admin/permission/list', 'sort' => 0, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 0, 'name' => '轮播图', 'icon_code' => '&#xe611;', 'link' => '/admin/banner/list', 'sort' => 2, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['parent_id' => 0, 'name' => '自定义数据', 'icon_code' => '&#xe604;', 'link' => '/admin/customData/list', 'sort' => 4, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
        ]);
    }
}
