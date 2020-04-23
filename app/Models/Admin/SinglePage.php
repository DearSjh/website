<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/8
 * Time: 10:49
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class SinglePage extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * 添加
     * @param array $data
     * @return bool
     */
    public static function add(array $data)
    {
        $singlePage = new SinglePage();
        $singlePage->title = $data['title']; //title必填，这个不做条件检查了
        !empty($data['category_id']) && $singlePage->category_id = (int)$data['category_id'];
        !empty($data['keywords']) && $singlePage->keywords = $data['keywords'];
        !empty($data['description']) && $singlePage->description = $data['description'];
        !empty($data['main_pic']) && $singlePage->main_pic = $data['main_pic'];
        !empty($data['group_pic']) && $singlePage->group_pic = $data['group_pic'];
        !empty($data['content']) && $singlePage->content = $data['content'];

        return $singlePage->save();

    }

    /**
     * 编辑
     * @param SinglePage $singlePage
     * @param array $data
     * @return bool
     */
    public static function edit(SinglePage $singlePage, array $data)
    {
        !empty($data['title']) && $singlePage->title = $data['title'];
        !empty($data['category_id']) && $singlePage->category_id = (int)$data['category_id'];
        !empty($data['keywords']) && $singlePage->keywords = $data['keywords'];
        !empty($data['description']) && $singlePage->description = $data['description'];
        !empty($data['main_pic']) && $singlePage->main_pic = $data['main_pic'];
        !empty($data['group_pic']) && $singlePage->group_pic = $data['group_pic'];
        !empty($data['content']) && $singlePage->content = $data['content'];

        return $singlePage->update();

    }

    public static function lists()
    {
        return SinglePage::with('category')->orderBy('id', 'DESC')->get();
    }

    public static function del(array $ids)
    {
        return SinglePage::whereIn('id', $ids)->delete();;
    }

}