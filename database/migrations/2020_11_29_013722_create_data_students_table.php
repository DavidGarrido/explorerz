<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->enum('type_document',['c.c','t.i','r.c','c.e'])->nullable();
            $table->bigInteger('number_document')->nullable();
            $table->bigInteger('utc_nacimiento')->nullable();
            $table->integer('age')->nullable();
            $table->enum('sex',['male','female'])->nullable();
            $table->enum('size',['2','4','6','8','10','12','14','16','xs','s','m','l','xl'])->nullable();
            $table->string('eps')->nullable();
            $table->string('last_certificated')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('phone')->nullable();
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
        Schema::dropIfExists('data_students');
    }
}
