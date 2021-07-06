<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            // 'id' => '1', // stuent
            'student_delete'=>'disable',
        ]);
        DB::table('permissions')->insert([
            // 'id' => '2', // thesher
            'student_delete'=>'disable',
        ]);
        DB::table('permissions')->insert([
            // 'id' => '3', // admin
            'student_delete'=>'enable',
            'student_add'=>'enable',
            'student_edit'=>'enable',
            'student_view'=>'enable',
            'moderator_delete'=>'enable',
            'moderator_add'=>'enable',
            'moderator_edit'=>'enable',
            'moderator_view'=>'enable',
            'teacher_delete'=>'enable',
            'teacher_add'=>'enable',
            'teacher_edit'=>'enable',
            'teacher_view'=>'enable',
            'score_delete'=>'enable',
            'score_add'=>'enable',
            'score_edit'=>'enable',
            'score_view'=>'enable',
            'subject_delete'=>'enable',
            'subject_add'=>'enable',
            'subject_edit'=>'enable',
            'subject_view'=>'enable',
            'time_delete'=>'enable',
            'time_add'=>'enable',
            'time_edit'=>'enable',
            'time_view'=>'enable',
            'facultie_delete'=>'enable',
            'facultie_add'=>'enable',
            'facultie_edit'=>'enable',
            'facultie_view'=>'enable',
            'absent_delete'=>'enable',
            'absent_add'=>'enable',
            'absent_edit'=>'enable',
            'absent_view'=>'enable',
            'sana_drsia_delete'=>'enable',
            'sana_drsia_add'=>'enable',
            'sana_drsia_edit'=>'enable',
            'sana_drsia_view'=>'enable',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' =>'admin@admin.com',
            'password' => bcrypt('admin@admin.com'),
            'National_ID'=>'admin@admin.com',
            'phone'=>'admin@admin.com',
            'years'=>'admin@admin.com',
            'note'=>'admin@admin.com',
            'role'=>'3',
        ]);
        
        // $this->call(UsersTableSeeder::class);
    }
}
