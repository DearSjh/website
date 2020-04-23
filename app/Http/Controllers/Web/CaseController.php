<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/19
 * Time: 13:39
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    /**
     * @return \Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function index()
    {

        return view('web.case');
    }
}