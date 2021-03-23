<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_letters', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('number', 15)->unique();
            $table->bigInteger('province_id')->unsigned();
            $table->bigInteger('regency_id')->unsigned();
            $table->bigInteger('subdistrict_id')->unsigned();
            $table->bigInteger('village_id')->unsigned();
            $table->bigInteger('sp_employee_id')->unsigned();
            $table->bigInteger('db_employee_id')->unsigned();
            $table->bigInteger('ss_employee_id')->unsigned();
            $table->bigInteger('surveyor_id')->nullable()->unsigned();
            $table->string('coordinator_name');
            $table->string('address');
            $table->integer('installments_tenor');
            $table->double('coordinator_discount')->nullable();
            $table->integer('reward')->nullable();
            $table->double('dp_discount')->nullable();
            $table->integer('total');
            $table->integer('netto');
            $table->integer('first_installment');
            $table->integer('monthly_installments');
            $table->date('date');
            $table->date('survey_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('phone')->nullable();
            
            $table->primary('id');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('subdistrict_id')->references('id')->on('subdistricts')->onDelete('cascade');
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade');
            $table->foreign('sp_employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('db_employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('ss_employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('surveyor_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_letters');
    }
}
