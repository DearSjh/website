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

class Custom extends Model
{


    public static function add(array $data)
    {
        $custom = new Custom();
        !empty($data['name']) && $custom->name = $data['name'];
        !empty($data['main_pic']) && $custom->main_pic = $data['main_pic'];
        !empty($data['link']) && $custom->link = $data['link'];
        !empty($data['value']) && $custom->value = $data['value'];
        !empty($data['content']) && $custom->content = $data['content'];
        !empty($data['group_pic']) && $custom->group_pic = $data['group_pic'];
        !empty($data['file']) && $custom->file = $data['file'];
        !empty($data['state']) && $custom->state = $data['state'];
        !empty($data['sort']) && $custom->sort = (int)$data['sort'];
        $custom->lang =  Cookie::get('lang', '1');
        return $custom->save();
    }

    public static function edit(Custom $custom, array $data)
    {
        !empty($data['name']) && $custom->name = $data['name'];
        !empty($data['main_pic']) && $custom->main_pic = $data['main_pic'];
        !empty($data['link']) && $custom->link = $data['link'];
        !empty($data['value']) && $custom->value = $data['value'];
        !empty($data['content']) && $custom->content = $data['content'];
        !empty($data['group_pic']) && $custom->group_pic = $data['group_pic'];
        !empty($data['file']) && $custom->file = $data['file'];
        !empty($data['state']) && $custom->state = $data['state'];
        !empty($data['sort']) && $custom->sort = (int)$data['sort'];
        $custom->lang =  Cookie::get('lang', '1');
        return $custom->update();

    }

    public static function lists()
    {
        return Custom::select(['id', 'name',  'main_pic', 'link', 'state', 'created_at'])->get();
    }

    public static function del(array $ids)
    {

        return Custom::whereIn('id', $ids)->delete();
    }

    public static function state(Custom $custom)
    {
        $custom->state = !$custom->state;
        $custom->update();
    }

}