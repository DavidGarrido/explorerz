<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->enum('type_document',['c.c','t.i','r.c','c.e'])->nullable();
            $table->bigInteger('number_document')->nullable();
            $table->bigInteger('utc_nacimiento')->nullable();
            $table->integer('age')->nullable();
            $table->enum('sex',['male','female'])->nullable();
            $table->enum('size',['xs','s','m','l','xl'])->nullable();
            $table->string('eps')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('hv')->nullable();
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
        Schema::dropIfExists('data_teachers');
    }
}
