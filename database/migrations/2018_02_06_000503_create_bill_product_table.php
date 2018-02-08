<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills_product', function (Blueprint $table) {
           $table->integer('bills_id')->unsigned();
           $table->integer('product_id')->unsigned();

           $table->primary(['bills_id','product_id']);


           $table->foreign('bills_id')->references('id')->on('bills');
           $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills_product');
    }
}
