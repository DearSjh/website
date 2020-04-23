<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150)->default('')->comment('标题名称');
            $table->string('main_pic', 150)->default('')->comment('图片');
            $table->string('link', 150)->default('')->comment('跳转链接');
            $table->text('value')->nullable()->comment('内容');
            $table->text('content')->nullable()->comment('详细内容');
            $table->string('group_pic', 150)->default('')->comment('组图');
            $table->string('file', 150)->default('')->comment('视频文件地址');
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
        Schema::dropIfExists('customs');
    }
}
