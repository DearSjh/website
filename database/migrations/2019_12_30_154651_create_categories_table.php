<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('type')->default(1)->comment('类型，1：列表，2：类型');
            $table->unsignedInteger('parent_id')->default(0)->comment('父类分类ID');
            $table->string('name', 30)->default('')->comment('分类名称');
            $table->string('dir_name', 20)->default('')->comment('目录名称');
            $table->string('link', 50)->default('')->comment('跳转连接');
            $table->string('picture', 50)->default('')->comment('图片');
            $table->string('keyword', 250)->default('')->comment('关键字');
            $table->text('description')->nullable()->comment('描述');
            $table->unsignedInteger('state')->default(1)->comment('是否开启，0：关闭，1：开启');
            $table->unsignedTinyInteger('is_nav')->default(1)->comment('是否作为导航');
            $table->unsignedInteger('sort')->default(0)->comment('排序');
            $table->unsignedTinyInteger('lang')->default(1)->comment('语言类型 1：中文,2:英文');
            $table->unsignedInteger('is_del')->default(0)->comment('是否已经删除，0：未删除，1：已删除');
            $table->timestamps();
            $table->unique(['dir_name', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
