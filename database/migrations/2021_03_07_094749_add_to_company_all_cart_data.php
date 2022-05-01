<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToCompanyAllCartData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_cart_data', function (Blueprint $table) {
            $table->string("company")->nullable()->after("title");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_cart_data', function (Blueprint $table) {
            
            $table->dropColumn("company")->nullable()->after("title");

        });
    }
}
