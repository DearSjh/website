<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/3
 * Time: 11:54
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public static function lists(int $page = 0, int $parPage = 15)
    {

        $message = Message::orderBy('id', 'DESC');

        return $message->paginate($parPage, ['*'], 'page', $page);
    }

    public static function del(array $ids)
    {

        return Message::whereIn('id', $ids)->delete();
    }

    public static function state(Message $message)
    {
        $message->state = !$message->state;
        $message->update();
    }
}