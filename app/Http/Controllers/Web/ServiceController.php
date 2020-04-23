<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/12/12
 * Time: 16:39
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * @return \Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function index()
    {
        return $this->view('service');
    }
}