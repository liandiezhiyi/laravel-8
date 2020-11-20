<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaraProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lara_product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name',100)->comment('商品名称');
            $table->string("Description",100)->comment("描述");
            $table->integer('add_time')->comment('添加时间');
            $table->double("Fixed_price",10)->comment("市场价");
            $table->double(" reduced_price",10)->comment("折扣价");
            $table->string("keywords",200)->comment("关键字");
            $table->integer("Has_deleted")->comment("是否被删");
            $table->string("Product_pic",200)->comment("图片链接");
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
        Schema::dropIfExists('lara_product');
    }
}
