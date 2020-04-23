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

class Banner extends Model
{

    public static function add(array $data)
    {
        $banner = new Banner();
        !empty($data['title']) && $banner->title = $data['title'];
        !empty($data['picture']) && $banner->picture = $data['picture'];
        !empty($data['link']) && $banner->link = $data['link'];
        !empty($data['state']) ? $banner->state = 1 : $banner->state = 0;
        !empty($data['sort']) && $banner->sort = (int)$data['sort'];
        $banner->lang = Cookie::get('lang', '1');

        return $banner->save();
    }

    public static function edit(Banner $banner, array $data)
    {
        !empty($data['title']) && $banner->title = $data['title'];
        !empty($data['picture']) && $banner->picture = $data['picture'];
        !empty($data['link']) && $banner->link = $data['link'];
        !empty($data['state']) ? $banner->state = 1 : $banner->state = 0;
        !empty($data['sort']) && $banner->sort = (int)$data['sort'];
        $banner->lang = Cookie::get('lang', '1');

        return $banner->update();

    }

    public static function lists()
    {
        return Banner::select(['id', 'title', 'picture', 'link', 'sort', 'state', 'created_at'])->get();
    }

    public static function del(array $ids)
    {

        return Banner::whereIn('id', $ids)->delete();
    }

    public static function state(Banner $banner)
    {
        $banner->state = !$banner->state;
        $banner->update();
    }

}