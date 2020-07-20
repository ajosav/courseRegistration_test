<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_code')->unique();
            $table->string('course_title');
            $table->string('prerequisite')->nullable();
            $table->integer('unit');
            $table->integer('group_id')->unsigned();
            $table->integer('option_id');
            $table->integer('part_id');
            $table->integer('session_id');
            $table->text('description')->nullable();
            $table->integer('reg_count')->unsigned();
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
