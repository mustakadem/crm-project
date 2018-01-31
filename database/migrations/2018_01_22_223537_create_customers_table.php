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
            $table->increments('id');
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
