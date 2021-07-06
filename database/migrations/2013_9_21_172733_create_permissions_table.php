<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('student_delete',['enable','disable'])->default('disable');
            $table->enum('student_add',['enable','disable'])->default('disable');
            $table->enum('student_edit',['enable','disable'])->default('disable');
            $table->enum('student_view',['enable','disable'])->default('disable');
            $table->enum('moderator_delete',['enable','disable'])->default('disable');
            $table->enum('moderator_add',['enable','disable'])->default('disable');
            $table->enum('moderator_edit',['enable','disable'])->default('disable');
            $table->enum('moderator_view',['enable','disable'])->default('disable');
            $table->enum('teacher_delete',['enable','disable'])->default('disable');
            $table->enum('teacher_add',['enable','disable'])->default('disable');
            $table->enum('teacher_edit',['enable','disable'])->default('disable');
            $table->enum('teacher_view',['enable','disable'])->default('disable');
            $table->enum('score_delete',['enable','disable'])->default('disable');
            $table->enum('score_add',['enable','disable'])->default('disable');
            $table->enum('score_edit',['enable','disable'])->default('disable');
            $table->enum('score_view',['enable','disable'])->default('disable');
            $table->enum('subject_delete',['enable','disable'])->default('disable');
            $table->enum('subject_add',['enable','disable'])->default('disable');
            $table->enum('subject_edit',['enable','disable'])->default('disable');
            $table->enum('subject_view',['enable','disable'])->default('disable');
            $table->enum('time_delete',['enable','disable'])->default('disable');
            $table->enum('time_add',['enable','disable'])->default('disable');
            $table->enum('time_edit',['enable','disable'])->default('disable');
            $table->enum('time_view',['enable','disable'])->default('disable');
            $table->enum('facultie_delete',['enable','disable'])->default('disable');
            $table->enum('facultie_add',['enable','disable'])->default('disable');
            $table->enum('facultie_edit',['enable','disable'])->default('disable');
            $table->enum('facultie_view',['enable','disable'])->default('disable');
            $table->enum('absent_delete',['enable','disable'])->default('disable');
            $table->enum('absent_add',['enable','disable'])->default('disable');
            $table->enum('absent_edit',['enable','disable'])->default('disable');
            $table->enum('absent_view',['enable','disable'])->default('disable');
            $table->enum('sana_drsia_delete',['enable','disable'])->default('disable');
            $table->enum('sana_drsia_add',['enable','disable'])->default('disable');
            $table->enum('sana_drsia_edit',['enable','disable'])->default('disable');
            $table->enum('sana_drsia_view',['enable','disable'])->default('disable');
            $table->engine = 'InnoDB';            
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
        Schema::dropIfExists('permissions');
    }
}
