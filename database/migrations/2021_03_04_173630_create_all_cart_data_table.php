<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllCartDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_cart_data', function (Blueprint $table) {
            $table->id();
            $table->string("product_id")->nullable();
            $table->string("user_id")->nullable();
            $table->string("mobile_id")->nullable();
            $table->string("addQty")->nullable();
            $table->string("price")->nullable();
            $table->string("title")->nullable();
            $table->string("quantity")->nullable();
            $table->string("image")->nullable();
            $table->string("status")->nullable();
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
        Schema::dropIfExists('all_cart_data');
    }
}
