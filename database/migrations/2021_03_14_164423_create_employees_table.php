<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('division_id')->unsigned();
            $table->bigInteger('position_id')->unsigned();
            $table->string('employee_identity_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('identity_card_number')->unique();
            $table->string('phone_number');
            $table->boolean('active');
            $table->string('image')->nullable();
            $table->timestamps();

             
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
