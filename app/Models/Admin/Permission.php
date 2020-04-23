<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/9
 * Time: 17:53
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permission extends Model
{

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public static function add(array $data)
    {
        $permission = new Permission();
        $permission->menu_id = (int)$data['menu_id'];
        $permission->name = $data['name'];
        $permission->path = $data['path'];
        $permission->is_menu = (int)$data['is_menu'];
        return $permission->save();
    }

    public static function edit(Permission $permission, $data)
    {
        !empty($data['menu_id']) && $permission->menu_id = (int)$data['menu_id'];
        !empty($data['name']) && $permission->name = $data['name'];
        !empty($data['path']) && $permission->path = $data['path'];
        $permission->is_menu = (int)$data['is_menu'] ?? 0;
        return $permission->update();
    }

    public static function lists(array $conditions, int $page = 0, int $parPage = 15)
    {
        $permission = Permission::with('menu');
        !empty($conditions['name']) && $permission->where('name', 'like', "%{$conditions['name']}%"); // 模糊匹配查询

        $permission->orderBy('id', 'DESC');

        return $permission->paginate($parPage, ['*'], 'page', $page);
    }

    public static function del(array $ids)
    {
        try {
            DB::transaction(function () use ($ids) {

                // 删除权限
                Permission::whereIn('id', $ids)->delete();

                // 删除角色权限关系表中的对应的权限
                RolePermission::whereIn('permission_id', $ids)->delete();
            });
        } catch (\Exception $e) {
            return false;
        }
        return true;

    }
}