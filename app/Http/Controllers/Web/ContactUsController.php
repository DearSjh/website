<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/11
 * Time: 18:18
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\Web\MessageValid;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContactUsController extends Controller
{
    /**
     * @return mixed|string
     * @throws \Throwable
     */
    public function index()
    {
        return view('web.contactUs');
    }

    public function message(Request $request)
    {
        $this->validate($request, MessageValid::rules(), MessageValid::msg(), MessageValid::attr());
        $date['code'] = 200;
        $date['msg'] = '操作成功';

        $vercode = $request->get('vercode', '');

        $key = $_COOKIE['captcha'] ?? '';
        if (app('captcha')->check($vercode, $key) === false) {
            $date['msg'] = '验证码错误';
            return $date;

        }
        // 验证码使用完后，消除cookie，为了安全
        setcookie('captcha', $vercode, time() - 10);

        $ipKey = $request->ip();
        if (Cache::has($ipKey)) {
            $date['msg'] = '操作过于频繁';
            return $date;
        }
        Cache::add($ipKey, 1, 10);

        try {

            $add = Message::add($request->input());
            if (empty($add)) {
                $date['code'] = 300;
                $date['msg'] = '添加失败';
                return $date;
            }

            $date['msg'] = '添加成功';
            return $date;

        } catch (\Exception $e) {
            $date['code'] = 500;
            $date['msg'] = $e->getMessage();
            return $date;
        }
    }
}