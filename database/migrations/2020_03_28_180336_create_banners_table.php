<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',150)->default('')->comment('标题');
            $table->string('picture',150)->default('')->comment('图片地址');
            $table->string('link',150)->default('')->comment('跳转链接');
            $table->boolean('state')->default(0)->comment('状态，0：未启用，1：已启用');
            $table->integer('sort')->default(0)->comment('排序');
            $table->unsignedTinyInteger('lang')->default(1)->comment('语言类型 1：中文,2:英文');
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
        Schema::dropIfExists('banners');
    }
}
