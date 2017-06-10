<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice',function(Blueprint $table){
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('item_id');
            $table->integer('dis'); 
            $table->integer('qty');
            $table->integer('price');
            $table->integer('line_total'); 
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
