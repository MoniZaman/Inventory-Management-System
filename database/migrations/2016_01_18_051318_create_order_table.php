<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('order',function(Blueprint $table){
            $table->increments('id');
            $table->string('customer_name');
            $table->string('customer_street');
            $table->string('customer_country');
            $table->string('customer_phone');
            $table->string('date');
            $table->integer('total'); 
            $table->string('payment');
            $table->integer('paid');
            $table->integer('due'); 
            $table->rememberToken();
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
        //
    }
}
