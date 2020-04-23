<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/2
 * Time: 14:45
 */

namespace App\Http\Requests\Admin\Category;


class AddCategory
{
    static public function rules()
    {
        return [
            'type' => 'required|in:1,2',
            'name' => 'required|string|max:20',
            'dir_name' => 'required|alpha|max:20',
            'picture' => 'string|max:50',
            'is_nav' => 'required|in:0,1',
        ];
    }

    static public function msg()
    {
        return [
            'type.required' => '类型不能为空',
            'type.in' => '类型错误',

            'name.required' => '分类名称必填',
            'name.string' => '分类名称必须是字符串类型',
            'name.max' => '分类名称不能超过20个字符',

            'dir_name.required' => '目录名必填',
            'dir_name.alpha' => '目录名必须都字母',
            'dir_name.max' => '目录名不能超过20个字符',

            'pic.string' => '图片地址必须是字符串',
            'pic.max' => '图片地址不能超过50个字符',


            'is_nav.required' => '是否作为导航不能为空',
            'is_nav.in' => '是否作为导航错误',


        ];
    }

    static public function attr()
    {
        return [];
    }
}