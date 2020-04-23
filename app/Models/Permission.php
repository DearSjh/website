<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/9
 * Time: 17:53
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

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

}