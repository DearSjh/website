<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/12/30
 * Time: 15:44
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Category extends Model
{


    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')
            ->where('is_del', 0)
            ->select(['id', 'type', 'parent_id', 'name', 'dir_name', 'picture', 'state', 'is_nav', 'sort', 'is_del']);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public static function add(array $data)
    {
        $category = new Category();
        !empty($data['type']) && $category->type = (int)$data['type'];
        !empty($data['parent_id']) && $category->parent_id = (int)$data['parent_id'];
        !empty($data['name']) && $category->name = $data['name'];
        !empty($data['dir_name']) && $category->dir_name = $data['dir_name'];
        !empty($data['picture']) && $category->picture = $data['picture'];
        !empty($data['state']) ? $category->state = 1 : $category->state = 0;
        !empty($data['is_nav']) ? $category->is_nav = 1 : $category->is_nav = 0;
        !empty($data['description']) && $category->description = $data['description'];
        !empty($data['keyword']) && $category->keyword = $data['keyword'];
        !empty($data['sort']) && $category->sort = (int)$data['sort'];
        $category->lang = Cookie::get('lang', '1');

        return $category->save();
    }

    public static function edit(Category $category, array $data)
    {
        !empty($data['type']) && $category->type = (int)$data['type'];
        !empty($data['parent_id']) && $category->parent_id = (int)$data['parent_id'];
        !empty($data['name']) && $category->name = $data['name'];
        !empty($data['dir_name']) && $category->dir_name = $data['dir_name'];
        !empty($data['picture']) && $category->picture = $data['picture'];
        !empty($data['sort']) && $category->sort = (int)$data['sort'];
        !empty($data['is_del']) && $category->is_del = (int)$data['is_del'];
        !empty($data['state']) ? $category->state = 1 : $category->state = 0;
        !empty($data['is_nav']) ? $category->is_nav = 1 : $category->is_nav = 0;
        !empty($data['description']) && $category->description = $data['description'];
        !empty($data['keyword']) && $category->keyword = $data['keyword'];
        $category->lang = Cookie::get('lang', '1');
        return $category->update();

    }

    public static function lists()
    {
        return Category::with('child.child')
            ->select(['id', 'type', 'parent_id', 'name', 'dir_name', 'picture', 'is_nav', 'sort', 'is_del', 'state'])
            ->where('parent_id', 0)
            ->where('is_del', 0)
            ->get();
    }

    public static function del(array $ids)
    {

        return Category::whereIn('id', $ids)->update(['is_del' => 1]);
    }

    public static function isOpen(Category $category)
    {
        $category->state = !$category->state;
        return $category->update();
    }

    public static function getCategoryChildrenIdsByParentId(int $pid, $type = 0)
    {
        $category = Category::with('child.child.child');

        $type == 1 && $category->where('type', 1);
        $type == 2 && $category->where('type', 2);

        $category->where('parent_id', $pid);
        $category->where('is_del', 0);
        $category->select(['id', 'name', 'parent_id']);

        return $category->get();
    }


}