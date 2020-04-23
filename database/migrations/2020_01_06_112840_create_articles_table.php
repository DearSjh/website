<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->index()->default(0)->comment('分类ID');
            $table->string('title')->comment('标题');
            $table->text('abstract')->nullable()->comment('摘要、概要');
            $table->string('keyword')->default('')->comment('关键字，多个关键字用半角逗号分隔');
            $table->string('main_pic')->default('')->comment('主图');
            $table->string('group_pic')->default('')->comment('组图');
            $table->string('link', 100)->default('')->comment('跳转链接');
            $table->text('content')->nullable()->comment('详情');
            $table->boolean('is_top')->default(0)->comment('是否置顶，0：否，1：是');
            $table->boolean('is_recommended')->default(0)->comment('是否推荐，0：否，1：是');
            $table->boolean('is_rolling')->default(0)->comment('是否滚动，0：否，1：是');
            $table->boolean('is_release')->default(1)->comment('是否发布，0：否，1：是');
            $table->integer('visits')->default(0)->comment('点击次数');
            $table->integer('sort')->default(0)->comment('排序');
            $table->string('file', 30)->default('')->comment('下载文件地址');
            $table->unsignedTinyInteger('lang')->default(1)->comment('语言类型 1：中文,2:英文');
            $table->boolean('is_del')->default(0)->comment('是否删除，0：否，1：是');
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
        Schema::dropIfExists('articles');
    }
}
