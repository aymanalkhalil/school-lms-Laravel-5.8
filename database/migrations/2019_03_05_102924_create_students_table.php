<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city');
            $table->string('name_arabda');
            $table->string('phone_arabda');
            $table->string('arabda');
            $table->string('sana_drasia');
            $table->enum('status', ['enable', 'disable', 'stop'])->default('enable');
            $table->string('rakam_akdemi')->unique();
            $table->string('sana')->default(0);
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}