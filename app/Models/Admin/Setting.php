<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/12/27
 * Time: 16:17
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Setting extends Model
{


    public static function add(array $data)
    {
        $setting = new Setting();

        !empty( $data['name']) && $setting->name = $data['name'];
        !empty( $data['logo']) && $setting->logo = $data['logo'];
        !empty( $data['url']) && $setting->url = $data['url'];
        !empty( $data['seo_title']) && $setting->seo_title = $data['seo_title'];
        !empty( $data['main_slogan']) && $setting->main_slogan = $data['main_slogan'];
        !empty( $data['vice_slogan']) && $setting->vice_slogan = $data['vice_slogan'];
        !empty( $data['keyword']) && $setting->keyword = $data['keyword'];
        !empty( $data['describe']) && $setting->describe = $data['describe'];
        !empty( $data['copyright']) && $setting->copyright = $data['copyright'];
        !empty( $data['fax']) && $setting->fax = $data['fax'];
        !empty( $data['hotline']) && $setting->hotline = $data['hotline'];
        !empty( $data['contact']) && $setting->contact = $data['contact'];
        !empty( $data['mobile']) && $setting->mobile = $data['mobile'];
        !empty( $data['email']) && $setting->email = $data['email'];
        !empty( $data['zip_code']) && $setting->zip_code = $data['zip_code'];
        !empty( $data['record_sn']) && $setting->record_sn = $data['record_sn'];
        !empty( $data['address']) && $setting->address = $data['address'];
        !empty( $data['lang']) && $setting->lang = Cookie::get('lang', '1');

        return $setting->save();

    }

    public static function edit(Setting $setting, array $data)
    {

        !empty( $data['name']) && $setting->name = $data['name'];
        !empty( $data['logo']) && $setting->logo = $data['logo'];
        !empty( $data['url']) && $setting->url = $data['url'];
        !empty( $data['seo_title']) && $setting->seo_title = $data['seo_title'];
        !empty( $data['main_slogan']) && $setting->main_slogan = $data['main_slogan'];
        !empty( $data['vice_slogan']) && $setting->vice_slogan = $data['vice_slogan'];
        !empty( $data['keyword']) && $setting->keyword = $data['keyword'];
        !empty( $data['describe']) && $setting->describe = $data['describe'];
        !empty( $data['copyright']) && $setting->copyright = $data['copyright'];
        !empty( $data['fax']) && $setting->fax = $data['fax'];
        !empty( $data['hotline']) && $setting->hotline = $data['hotline'];
        !empty( $data['contact']) && $setting->contact = $data['contact'];
        !empty( $data['mobile']) && $setting->mobile = $data['mobile'];
        !empty( $data['email']) && $setting->email = $data['email'];
        !empty( $data['zip_code']) && $setting->zip_code = $data['zip_code'];
        !empty( $data['record_sn']) && $setting->record_sn = $data['record_sn'];
        !empty( $data['address']) && $setting->address = $data['address'];
        !empty( $data['lang']) && $setting->lang = Cookie::get('lang', '1');

        return $setting->update();

    }
}