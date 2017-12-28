<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    const DEFAULT = 0;
    const ENUM_DEFAULT = 1;
    /**
     * Run the migrations.
     * 用户表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->default(static::DEFAULT)->comment('昵称');
            $table->string('email', 50)->unique()->default(static::DEFAULT)->comment('邮箱');
            $table->string('nickname', 50)->default(static::DEFAULT)->comment('名字');
            $table->string('mobile', 50)->unique()->default(static::DEFAULT)->comment('手机号');
            $table->timestamps();
            $table->softDeletes();
            $table->index('name');
            $table->index('email');
            $table->index('nickname');
            $table->index('mobile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
