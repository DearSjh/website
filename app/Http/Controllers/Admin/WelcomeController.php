<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/12/26
 * Time: 16:32
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {

        return view('admin.welcome');
    }
}