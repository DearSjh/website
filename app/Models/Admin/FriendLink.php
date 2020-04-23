<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/8
 * Time: 14:12
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class FriendLink extends Model
{


    public static function add(array $data)
    {
        $friendLink = new FriendLink();
        !empty($data['name']) && $friendLink->name = $data['name'];
        !empty($data['logo']) && $friendLink->logo = $data['logo'];
        !empty($data['url']) && $friendLink->url = $data['url'];
        !empty($data['sort']) && $friendLink->sort = (int)$data['sort'];
        !empty($data['is_public']) && $friendLink->is_public = (int)$data['is_public'];
        $friendLink->lang = Cookie::get('lang', '1');

        return $friendLink->save();

    }

    public static function edit(FriendLink $friendLink, $data)
    {

        !empty($data['name']) && $friendLink->name = $data['name'];
        !empty($data['logo']) && $friendLink->logo = $data['logo'];
        !empty($data['url']) && $friendLink->url = $data['url'];
        !empty($data['sort']) && $friendLink->sort = (int)$data['sort'];
        !empty($data['is_public']) && $friendLink->is_public = (int)$data['is_public'];
        $friendLink->lang = Cookie::get('lang', '1');

        return $friendLink->update();
    }

    public static function lists($params)
    {
        $qb = FriendLink::select('*');

//        !empty($params['name']) && $qb->where('name', 'like', '%' . $params['name'] . '%');

        return $qb->get();
    }

    public static function status(FriendLink $friendLink)
    {
        $friendLink->is_public = !$friendLink->is_public;
        $friendLink->update();
    }

    public static function del(array $ids)
    {
        return FriendLink::whereIn('id', $ids)->delete();
    }
}