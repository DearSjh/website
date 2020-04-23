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
use Illuminate\Support\Facades\Log;

class Role extends Model
{

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

    public function isMenuPermissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id')
            ->where('is_menu',1);
    }

    public static function add(array $roleData, array $permissionData)
    {

        try {

            DB::transaction(function () use ($roleData, $permissionData) {
                // 保存角色信息
                $role = new Role();
                $role->role_name = $roleData['role_name'];
                $role->save();

                $role->permissions()->attach(array_values($permissionData));
            });

        } catch (\Exception $e) {
            Log::error('添加角色信息失败，失败信息：' . $e->getMessage());
            return false;
        }

        return true;
    }

    public static function edit(Role $role, array $permissionData)
    {
        try {

            $role->permissions()->sync(array_values($permissionData));

        } catch (\Exception $e) {
            Log::error('添加角色信息失败，失败信息：' . $e->getMessage());
            return false;
        }

        return true;

    }

    public static function lists()
    {
        return Role::get();
    }

    public static function del(Role $role)
    {
        $role->delete();
        $role->permissions()->detach();
    }

    public static function isOpen(Role $role)
    {
        $role->state = !$role->state;
        return $role->update();
    }
}