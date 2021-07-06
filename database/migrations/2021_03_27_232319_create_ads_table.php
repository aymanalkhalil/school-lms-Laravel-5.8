<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('programme_id');
            $table->string('target_audience');
            $table->string('period');
            $table->string('day');
            $table->date('date');
            $table->string('course_name');
            $table->string('course_period');
            $table->time('from');
            $table->time('to');
            $table->string('teacher');
            $table->string('price');
            $table->foreign('programme_id')->references('id')->on('programmes')->onDelete('cascade');
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
        Schema::dropIfExists('ads');
    }
}