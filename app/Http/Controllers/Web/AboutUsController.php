<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/11
 * Time: 18:13
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    /**
     * @return mixed|string
     * @throws \Throwable
     */
    public function index()
    {
        return view('web.aboutUs');
    }
}