<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('role');
            $table->foreign('role')->references('id')->on('permissions')->onDelete('cascade');
            $table->string('image')->default('default.png');
            $table->string('National_ID');
            $table->string('phone');
            $table->string('years');
            $table->date('date')->default(date("Y-m-d"));
            $table->text('note');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
