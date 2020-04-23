<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/6
 * Time: 15:17
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class TestController extends Controller
{
    /**
     * @return string
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $captcha = $request->input('captcha');

        $key = $_COOKIE['captcha'];

        if(app('captcha')->check($captcha, $key) === false) {
            echo '校验失败';
        }else{
            echo '校验成功';
        }
    }
}