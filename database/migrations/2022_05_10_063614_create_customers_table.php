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

    //Up functin create new table using Schema::create function
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('name',60)->default("Asif");
            $table->string('email',100);
            $table->enum('gender',["Male","Femal","Others"]);
            $table->date('dob')->nullable();
            $table->text('address');
            $table->string('password');

            $table->timestamps(); //created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //Down table delete table if exist and then create it
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
