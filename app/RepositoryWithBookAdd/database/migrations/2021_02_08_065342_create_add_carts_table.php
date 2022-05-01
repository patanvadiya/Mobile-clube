<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_carts', function (Blueprint $table) {
            $table->id();
            $table->string("price");
            $table->string("title");
            $table->string("quantity");
            $table->string("addQty");
            $table->string("image");
            $table->string("status");
            $table->string("b_id");
            $table->string("user_id");
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
        Schema::dropIfExists('add_carts');
    }
}
