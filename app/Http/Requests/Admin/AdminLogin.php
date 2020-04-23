<?php


namespace App\Http\Requests\Admin;


class AdminLogin
{
    static public function rules()
    {
        return [
            'user_name' => 'required|string|max:20|min:2',
            'password' => 'required|string|max:16|min:6',
            'vercode' => 'required|max:4|min:4',
        ];
    }

    static public function msg()
    {
        return [
            'user_name.required' => '用户名必填',
            'user_name.string' => '用户名必须是字符串类型',
            'user_name.min' => '用户名不能低于2个字符',

            'password.required' => '密码必填',
            'password.string' => '密码必须是字符串类型',
            'password.min' => '密码不能低于6个字符',
            'password.max' => '密码不能超过16个字符',

            'vercode.required' => '验证码必填',
            'vercode.string' => '验证码必须是字符串',
            'vercode.min' => '验证码不能少于4个字符',
            'vercode.max' => '验证码不能超过4个字符',


        ];
    }

    static public function attr()
    {
        return [];
    }
}