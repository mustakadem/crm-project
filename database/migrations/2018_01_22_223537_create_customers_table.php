<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('surnames');
            $table->enum('type_customers',['potencial','activo','exporadico'])->nullable();
            $table->longText('image')->nullable();
            $table->string('address');
            $table->string('number')->nullable();
            $table->string('movil');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('job_title')->nullable();
            $table->text('notes')->nullable(  );
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
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
