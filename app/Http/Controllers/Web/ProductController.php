<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/11
 * Time: 18:29
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @return mixed|string
     * @throws \Throwable
     */
    public function index()
    {
        return view('web.product');
    }
}