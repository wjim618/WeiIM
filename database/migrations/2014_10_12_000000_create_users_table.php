<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('wechat_name')->comment('微信名称');
            $table->string('wechat_open_id')->nullable()->unique()->comment('微信open_id');
            $table->string('wechat_session_key')->nullable()->comment('微信session_key');
            $table->string('wechat_avatar')->comment('微信头像');
            $table->unsignedInteger('gender')->comment('性别 1男 2女');
            $table->string('signature')->comment('个性签名');
            $table->tinyInteger('status')->default(0)->comment('0下线 1上线');
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
        Schema::dropIfExists('users');
    }
}
