<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealmeAccssoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realme_accssories', function (Blueprint $table) {
            $table->id();
            $table->string("company")->nuallable();
            $table->string("title")->nuallable();
            $table->string("type")->nuallable();
            $table->string("price")->nuallable();
            $table->string("image")->nuallable();
            $table->string("qantity")->nuallable();
            $table->string("desc")->nuallable();
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
        Schema::dropIfExists('realme_accssories');
    }
}
