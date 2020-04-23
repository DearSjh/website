<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class AdminAuthenticate
{

    public function handle($request, Closure $next)
    {

        if(empty($_COOKIE['user_id'])){
            header('location:/admin/login');
            exit;
        }

        try {

            // 在登录的时候，把用户的ID进行加密后放到cookie中。这里是验证，取出coolie解密。如果解密失败，会抛出异常
            $adminId = Crypt::decrypt($_COOKIE['user_id']);

            $adminInfo = Admin::find($adminId);

            // 检查用户是否存在
            if (empty($adminInfo->id)) {
                Throw new \Exception('账号错误');
            }

            if($adminInfo->user_name == SUPER_ADMINISTRATOR){
                return $next($request);
            }

            // 检查启用状态
            if ($adminInfo->state != 1) {
                Throw new \Exception('请联系管理员');
            }

            $path = Input::path();
            if ($path != 'admin/index') {
                $permissions = Admin::allPermissions($adminId);
                //dump($permissions);
                $split = explode('/', $path);
                if(count($split) > 3){
                    array_pop($split);
                }
                $path = implode('/', $split);

                if (!in_array($path, $permissions)) {
                    Throw new \Exception('无权限操作');
                }
            }


        } catch (\Exception $e) {

            // 出错后，可以跳转到错误页面，也可直接返回错误信息

            $arrayResult['code'] = 401;
            $arrayResult['message'] = $e->getMessage();
            $arrayResult['data'] = [];

            return response()->json($arrayResult, 401)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        // $next不能少
        return $next($request);
    }
}
