<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/11
 * Time: 18:30
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class JobController extends Controller
{
    /**
     * @return mixed|string
     * @throws \Throwable
     */
    public function index()
    {

        return $this->view('job');
    }
}