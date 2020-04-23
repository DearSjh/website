<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->default('')->comment('网站名称');
            $table->string('logo', 50)->default('')->comment('LOGO');
            $table->string('url', 30)->default('')->comment('网址');
            $table->string('main_slogan')->default('')->comment('网站主标语');
            $table->string('vice_slogan')->default('')->comment('网站副标语');
            $table->string('seo_title')->default('')->comment('SEO标题');
            $table->string('keyword')->default('')->comment('关键字');
            $table->text('describe')->nullable()->comment('网站描述');
            $table->string('copyright', 50)->default('')->comment('版权信息');
            $table->string('hotline', 20)->default('')->comment('客服热线');
            $table->string('contact', 10)->default('')->comment('联系人');
            $table->string('mobile', 11)->default('')->comment('手机号');
            $table->string('fax', 20)->default('')->comment('传真');
            $table->string('email', 20)->default('')->comment('邮箱');
            $table->string('zip_code', 20)->default('')->comment('邮编');
            $table->string('record_sn', 20)->default('')->comment('备案编号');
            $table->unsignedTinyInteger('lang')->default(1)->comment('语言类型 1：中文,2:英文');
            $table->string('address', 120)->default('')->comment('公司地址');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
