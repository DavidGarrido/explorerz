<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('model_courses', function (Blueprint $table) {
            $table->id();
            $table->string('group');
            $table->timestamps();
        });
        
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->references('id')->on('model_courses')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
