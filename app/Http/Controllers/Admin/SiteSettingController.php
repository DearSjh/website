<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiteSettingController extends Controller
{

    public function set(Request $request)
    {
        $setting = Setting::first();

        if ($request->isXmlHttpRequest()) {
            Log::info('只处理ajax提交的，其他不处理');

            if (!empty($setting->id)) {
                Setting::edit($setting, $request->all());
            } else {
                Setting::add($request->all());
            }

            $this->response->setMsg(200, '成功');
            return $this->response->responseJSON();

        }

        $data['data'] = $setting;
        return view('admin.siteSetting', $data);
    }
}