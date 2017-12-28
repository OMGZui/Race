<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    const DEFAULT = 0;
    const ENUM_DEFAULT = 1;

    /**
     * Run the migrations.
     * 账号表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id',false,true)->default(static::DEFAULT)->comment('用户id');
            $table->string('email',50)->unique()->default(static::DEFAULT)->comment('登录账号');
            $table->string('password',255)->default(static::DEFAULT)->comment('密码');
            $table->string('remember_token', 100)->default(static::DEFAULT)->comment('token');
            $table->string('oauth_name', 50)->default(static::DEFAULT)->comment('第三方名字');
            $table->integer('oauth_id',false,true)->default(static::DEFAULT)->comment('第三方id');
            $table->string('oauth_access_token', 255)->default(static::DEFAULT)->comment('第三方access_token');
            $table->string('oauth_expires', 20)->default(static::DEFAULT)->comment('第三方过期时间');
            $table->timestamps();
            $table->softDeletes();
            $table->index('profile_id');
            $table->index('oauth_id');
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
