<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 30)->comment('名称');
            $table->string('logo', 30)->default('')->comment('logo');
            $table->string('url', 30)->default('')->comment('网址');
            $table->unsignedInteger('sort')->default(1)->comment('排序');
            $table->boolean('is_public')->default(1)->comment('是否公开');
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
        Schema::dropIfExists('friend_links');
    }
}
