<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaraAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lara_admin', function (Blueprint $table) {
            $table->id();
            $table->string('username',64)->comment('用户名');
            $table->string("password",64)->comment("用户密码");
            $table->string('last_login_ip')->nullable()->comment('最后登录IP');
            $table->integer('last_login_time')->nullable()->comment("最后一次登录时间");
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
        Schema::dropIfExists('lara_admin');
    }
}
