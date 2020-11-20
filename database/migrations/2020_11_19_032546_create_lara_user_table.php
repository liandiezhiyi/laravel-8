<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaraUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lara_user', function (Blueprint $table) {
            $table->id();
            $table->string("email",50)->comment("邮箱");
            $table->string("nickname",50)->comment("昵称");
            $table->string("password")->comment("密码");
            $table->integer("User_points")->comment("用户积分");
            $table->char("Is_email_verify")->comment("邮箱是否验证");
            $table->string("Email_verify_code")->comment("邮箱验证码");
            $table->bigInteger("Last_login_time")->comment("最近登录时间");
            $table->string("Last_login_ip",50)->comment("最近登录IP");
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
        Schema::dropIfExists('lara_user');
    }
}
