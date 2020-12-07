<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->text('customer_message')->nullable();
            $table->integer('customer_city');
            $table->date('customer_date');
            $table->integer('customer_month');
            $table->integer('customer_year');
            $table->integer('customer_day');
            $table->time('customer_time');
            $table->string('customer_am_pm');
            $table->string('customer_file')->nullable();
            $table->integer('user_id');
            $table->integer('client_id');
            $table->integer('client_category');
            $table->integer('customer_status')->default(0);
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
        Schema::dropIfExists('customers');
    }
}
