<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',20)->default('')->comment('标题');
            $table->string('name',20)->default('')->comment('姓名');
            $table->string('mobile',11)->default('')->comment('联系人手机号');
            $table->string('email',30)->default('')->comment('联系人电子邮箱');
            $table->string('address',40)->default('')->comment('联系人地址');
            $table->string('content',300)->default('')->comment('留言内容');
            $table->boolean('state')->default(0)->comment('查看状态');
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
        Schema::dropIfExists('messages');
    }
}
