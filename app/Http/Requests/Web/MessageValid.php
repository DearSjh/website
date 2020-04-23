<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Web;

class MessageValid
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [
            'name' => 'required|string',
            'mobile' => 'required',
            'email' => 'email|max:255',
            'vercode' => 'required|string',
        ];
    }

    static public function msg()
    {
        return [

            'name.required' => '姓名必填',
            'name.string' => '姓名类型错误',

            'mobile.required' => '手机号必填',

            'email.email' => '邮箱格式错误',
            'email.max' => '邮箱过长',

            'vercode.required' => '验证码必填',
            'vercode.string' => '验证码类型错误',

        ];
    }

    static public function attr()
    {
        return [
            'name' => '姓名',
            'mobile' => '手机号',
            'email' => '邮箱',
            'vercode' => '验证码',
        ];
    }
}
