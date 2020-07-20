<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectiveFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elective_features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('elective_id');
            $table->string('unit');
            $table->string('semester');
            $table->string('test');
            $table->string('field_trip');
            $table->string('payment');
            $table->string('material');
            $table->string('attendance');
            $table->string('practical_class');
            $table->string('exam');
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
        Schema::dropIfExists('elective_features');
    }
}
