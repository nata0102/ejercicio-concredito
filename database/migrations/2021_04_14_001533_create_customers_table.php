<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('mother_last_name')->nullable();
            $table->string('street');
            $table->string('number');
            $table->string('suburb');
            $table->string('zip');
            $table->string('phone');
            $table->string('rfc');
            $table->longText('observations')->nullable();
            $table->enum('status',['Enviado','Autorizado','Rechazado']);
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
