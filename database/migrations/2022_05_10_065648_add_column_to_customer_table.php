<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Up function will add new columns using Schema::table function
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('country',50)->nullable()->after('address');
            $table->string('state', 50)->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

     //down function will delete any column/columns using Schema::table function
    public function down()
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->string('state');
        });
    }
};
