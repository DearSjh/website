<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/18
 * Time: 16:58
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public static function add($data)
    {
        $message = new Message();

        !empty($data['title']) && $message->title = $data['title'] ?? '';
        !empty($data['name']) && $message->name = $data['name'] ?? '';
        !empty($data['mobile']) && $message->mobile = $data['mobile'] ?? '';
        !empty($data['email']) && $message->email = $data['email'] ?? '';
        !empty($data['address']) && $message->address = $data['address'] ?? '';
        !empty($data['content']) && $message->content = $data['content'] ?? '';

        $message->save();
        return $message;

    }

    public static function GetMessageList()
    {
        return Message::orderBy('id', 'DESC')->take(8)->get();
    }
}