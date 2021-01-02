<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepartamentoToDataStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_students', function (Blueprint $table) {
            $table->foreignId('departamento_id')->nullable()->references('id')->on('departamentos')->after('address');
            $table->foreignId('municipio_id')->nullable()->references('id')->on('municipios')->after('departamento_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_students', function (Blueprint $table) {
            //
        });
    }
}
