<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/19
 * Time: 13:39
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Services\Utils;
use App\Models\Admin\WebInfo;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    /**
     * @return \Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function del()
    {

        Utils::delDir('../storage/framework/cache/');

        $webInfo = WebInfo::select('web_cache')->first();
        if (!empty($webInfo)) {
            if ($webInfo->web_cache) {
                Cache::forever('open_web_cache', true);
            } else {
                Cache::forever('open_web_cache', false);
            }

        }
        return $this->responseJSON();

    }
}