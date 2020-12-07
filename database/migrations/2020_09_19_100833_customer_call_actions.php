<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomerCallActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_call_actions', function (Blueprint $table) {
            $table->bigIncrements('customer_call_actions_id');
            $table->integer('user_id');
            $table->integer('action');
            $table->integer('customer_id');
            $table->date('action_date');
            $table->time('action_time');
            $table->text('action_comment');
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
        Schema::dropIfExists('customer_call_actions');
    }
}
