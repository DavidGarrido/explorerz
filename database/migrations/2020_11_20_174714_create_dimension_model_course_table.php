<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimensionModelCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimension_model_course', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dimension_id')->references('id')->on('dimensions')->onDelete('cascade');
            $table->foreignId('model_course_id')->references('id')->on('model_courses')->onDelete('cascade');
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
        Schema::dropIfExists('dimension_model_course');
    }
}
