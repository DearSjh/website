<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/11
 * Time: 18:24
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    /**
     * @return mixed|string
     * @throws \Throwable
     */
    public function index()
    {
        return view('web.news');
    }
}