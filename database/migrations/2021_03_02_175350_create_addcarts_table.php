<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddcartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addcarts', function (Blueprint $table) {
            $table->id();
            $table->string("mobile_id")->nullable();
            $table->string("user_id")->nullable();
            $table->string("addQty")->nullable();
            $table->string("status")->nullable();
            $table->string("title")->nullable();
            $table->string("company")->nullable();
            $table->string("price")->nullable();
            $table->string("image")->nullable();
            $table->string("quantity")->nullable();
            $table->string("desc")->nullable();
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
        Schema::dropIfExists('addcarts');
    }
}
