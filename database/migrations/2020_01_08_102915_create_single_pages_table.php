<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinglePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->default(0)->comment('分类ID');
            $table->string('title', 50)->comment('标题');
            $table->string('keywords', 100)->default('')->comment('关键字');
            $table->string('description', 300)->default('')->comment('描述');
            $table->string('main_pic', 50)->default('')->comment('主图');
            $table->string('group_pic', 500)->default('')->comment('组图');
            $table->unsignedTinyInteger('lang')->default(1)->comment('语言类型 1：中文,2:英文');
            $table->text('content')->comment('内容');
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
        Schema::dropIfExists('single_pages');
    }
}
