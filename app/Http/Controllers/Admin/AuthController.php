<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/12/25
 * Time: 14:48
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {


        return view('admin.login');
    }

    public function logout()
    {


    }
}