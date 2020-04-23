<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('permissions')->insert([
            ['menu_id' => 3, 'name' => '修改文章', 'path' => '/admin/category/edit', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 3, 'name' => '添加分类', 'path' => '/admin/category/add', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 3, 'name' => '添加子分类', 'path' => '/admin/category/addChild', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 3, 'name' => '分类列表', 'path' => '/admin/category/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 3, 'name' => '删除文章分类', 'path' => '/admin/category/del', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 3, 'name' => '修改状态', 'path' => '/admin/category/status', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 6, 'name' => '留言列表', 'path' => '/admin/message/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 4, 'name' => '文章列表', 'path' => '/admin/article/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 4, 'name' => '添加文章', 'path' => '/admin/article/add', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 4, 'name' => '编辑文章', 'path' => '/admin/article/edit', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 4, 'name' => '删除文章', 'path' => '/admin/article/del', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 4, 'name' => '文章状态', 'path' => '/admin/article/status', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 5, 'name' => '单页列表', 'path' => '/admin/singlePage/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 5, 'name' => '添加单页', 'path' => '/admin/singlePage/add', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 5, 'name' => '编辑单页', 'path' => '/admin/singlePage/edit', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 5, 'name' => '删除单页', 'path' => '/admin/singlePage/del', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 7, 'name' => '友情链接列表', 'path' => '/admin/friendLink/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 7, 'name' => '添加友情链接', 'path' => '/admin/friendLink/add', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 7, 'name' => '编辑友情链接', 'path' => '/admin/friendLink/edit', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 7, 'name' => '删除友情链接', 'path' => '/admin/friendLink/del', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 7, 'name' => '友情链接状态', 'path' => '/admin/friendLink/status', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 11, 'name' => '菜单列表', 'path' => '/admin/menu/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 11, 'name' => '添加菜单', 'path' => '/admin/menu/add', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 11, 'name' => '添加子菜单', 'path' => '/admin/menu/addChild', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 11, 'name' => '编辑菜单', 'path' => '/admin/menu/edit', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 11, 'name' => '删除菜单', 'path' => '/admin/menu/del', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 12, 'name' => '权限列表', 'path' => '/admin/permission/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 12, 'name' => '添加权限', 'path' => '/admin/permission/add', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 12, 'name' => '编辑权限', 'path' => '/admin/permission/edit', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 12, 'name' => '删除权限', 'path' => '/admin/permission/del', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 10, 'name' => '角色列表', 'path' => '/admin/role/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 10, 'name' => '添加角色', 'path' => '/admin/role/add', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 10, 'name' => '编辑角色', 'path' => '/admin/role/edit', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 10, 'name' => '删除角色', 'path' => '/admin/role/del', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 1, 'name' => '网站配置', 'path' => '/admin/siteSetting', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 9, 'name' => '管理员列表', 'path' => '/admin/admin/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 9, 'name' => '添加管理员', 'path' => '/admin/admin/add', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 9, 'name' => '编辑管理员', 'path' => '/admin/admin/edit', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 9, 'name' => '删除管理员', 'path' => '/admin/admin/del', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 13, 'name' => '轮播图列表', 'path' => '/admin/banner/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 13, 'name' => '添加轮播图', 'path' => '/admin/banner/add', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 13, 'name' => '编辑轮播图', 'path' => '/admin/banner/edit', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 13, 'name' => '删除轮播图', 'path' => '/admin/banner/del', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 14, 'name' => '自定义数据列表', 'path' => '/admin/customData/list', 'is_menu' => '1', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 14, 'name' => '添加自定义数据', 'path' => '/admin/customData/add', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 14, 'name' => '编辑自定义数据', 'path' => '/admin/customData/edit', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['menu_id' => 14, 'name' => '删除自定义数据', 'path' => '/admin/customData/del', 'is_menu' => '0', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
        ]);
    }
}
