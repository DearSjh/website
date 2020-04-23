<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/26
 * Time: 11:04
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\TongJi;
use Illuminate\Http\Request;

class TongJiController extends Controller
{
    public function collect(Request $request)
    {
        $siteUrl = trim(WebInfo('url'), 'www.');
        $currReferer = $_SERVER['HTTP_REFERER'] ?? '';

        if (preg_match('/' . $siteUrl . '/', $currReferer)) {
            TongJi::action($request->input('url', ''), $request->input('referer', ''));
        }

        return $this->responseJSON();
    }
}