<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/rafed', function () {
    return view('rafed');
});

Route::get('/diploma_m', function () {
    return view('diploma_m');
});

Route::get('/diploma_a', function () {
    return view('diploma_a');
});

Route::get('/diploma_r', function () {
    return view('diploma_r');
});

Route::get('/shor', function () {
    return view('shor');
});


Route::get('/view_diplome_information/{id}', 'WebsiteController@view_diplome_information')->name('view_diplome_information');

Auth::routes();
Route::get('/register_time', 'RegisterTimeController@index')->name('register_time');
Route::get('/edit_register_time/{id}', 'RegisterTimeController@edit_register_time')->name('edit_register_time');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add_adv', 'AdvController@index')->name('add_adv');
Route::post('/save_adv', 'AdvController@save_adv')->name('save_adv');
Route::get('/view_all_adv', 'AdvController@view_all_adv')->name('view_all_adv');
Route::get('/edit_adv/{id}', 'AdvController@edit_adv')->name('edit_adv');
Route::put('/update_adv/{id}', 'AdvController@update_adv')->name('update_adv');
Route::get('/delete_adv/{id}', 'AdvController@delete_adv')->name('delete_adv');

Route::get('/employment_requests', 'EmploymentController@index')->name('employment_requests');
Route::get('/join_us', 'EmploymentController@show_employment_page')->name('show_employment_page');
Route::post('/join_us', 'EmploymentController@upload_cv')->name('upload_cv');
Route::get('/delete_employment_request/{id}', 'EmploymentController@delete_employment_request')->name('delete_employment_request');


Route::get('/add_employee', 'FinanceController@index')->name('add_finance');
Route::post('/add_employee', 'FinanceController@add_employee')->name('add_employee');
Route::get('/view_employees', 'FinanceController@view_employees')->name('view_employees');
Route::get('/edit_employee/{id}', 'FinanceController@edit_employee')->name('edit_employee');
Route::put('/update_employee/{id}', 'FinanceController@update_employee')->name('update_employee');
Route::get('/delete_employee/{id}', 'FinanceController@delete_employee')->name('delete_employee');

//  MODERATORS SALAIRES
Route::get('/add_moderator_salaries', 'FinanceController@add_moderator_salaries')->name('add_moderator_salaries');
Route::post('/add_moderator_salaries', 'FinanceController@save_salaries')->name('save_salaries');
Route::get('/edit_salary_mod/{id}', 'FinanceController@edit_salary_mod')->name('edit_salary_mod');
Route::put('/update_salary_mod/{id}', 'FinanceController@update_salary_mod')->name('update_salary_mod');
Route::get('/delete_salary_mod/{id}', 'FinanceController@delete_salary_mod')->name('delete_salary_mod');

//  TEACHER SALAIRES
Route::get('/add_teacher_salaries', 'FinanceController@add_teacher_salaries')->name('add_teacher_salaries');

Route::post('/add_teacher_salaries', 'FinanceController@save_teacher_salaries')->name('save_teacher_salaries');

Route::get('/edit_salary_teacher/{id}', 'FinanceController@edit_salary_teacher')->name('edit_salary_teacher');

Route::put('/update_salary_teacher/{id}', 'FinanceController@update_salary_teacher')->name('update_salary_teacher');

Route::get('/delete_salary_teacher/{id}', 'FinanceController@delete_salary_teacher')->name('delete_salary_teacher');





Route::get('/finance_management', 'FinanceController@finance_management')->name('finance_management');
Route::post('/save_finance', 'FinanceController@save_finance_record')->name('save_finance_record');

Route::get('/edit_finance/{id}', 'FinanceController@edit_finance')->name('edit_finance');
Route::put('/update_finance/{id}', 'FinanceController@update_finance')->name('update_finance');
Route::get('/delete_finance/{id}', 'FinanceController@delete_finance')->name('delete_finance');


Route::get('/add_moderators', 'ModeratorController@index');
Route::post('/add_moderators', 'ModeratorController@store');
Route::get('/moderators/view_all', 'ModeratorController@view_all');
Route::get('/delete/{id}/moderator', 'ModeratorController@delete');
Route::get('/edit/{id}/moderator', 'ModeratorController@edit');
Route::put('/update/{id}/moderator', 'ModeratorController@update');
Route::get('/show/{id}/moderator', 'ModeratorController@show');


Route::get('/add_teachers', 'TeacherController@index');
Route::post('/add_teachers', 'TeacherController@store');
Route::get('/teachers/view_all', 'TeacherController@view_all');
Route::get('/delete/{id}/teacher', 'TeacherController@delete');
Route::get('/edit/{id}/teacher', 'TeacherController@edit');
Route::put('/update/{id}/teacher', 'TeacherController@update');
Route::get('/show/{id}/teacher', 'TeacherController@show');



Route::get('/add_students', 'StudentController@index');
Route::post('/add_students', 'StudentController@store');
Route::get('/students/view_all', 'StudentController@view_all');
Route::get('/students/view_all_courses', 'StudentController@view_all_courses');
Route::get('/delete/{id}/student', 'StudentController@delete');
Route::get('/show/registered/{id}/course', 'StudentController@show_registered_courses')->name('show_registered_courses');
// Edit Program For Student
Route::get('/edit/{id}/student', 'StudentController@edit');
Route::put('/update/{id}/student', 'StudentController@update');

// Edit Course For Student

Route::get('/edit/course/{id}/student', 'StudentController@editStudentCourse');
Route::put('/update/course/{id}/student', 'StudentController@updateCourseStudent');


Route::get('/show/{id}/student', 'StudentController@show');
Route::get('/show/course/{id}/student', 'StudentController@showStudentCourse');

// change password
Route::put('/update/{id}/password', 'StudentController@update_password');


Route::get('/add_faculties', 'FacultieController@index');
Route::post('/add_faculties', 'FacultieController@store');
Route::get('/add_student_in_sho3ba/{id}', 'FacultieController@add_stuident');
Route::post('/add_student_in_sho3ba/{id}', 'FacultieController@post_stuident');
Route::post('/edit_student_in_sho3ba/{id}', 'FacultieController@edit_stuident');
Route::get('/facultie/view_all', 'FacultieController@view_all');
Route::get('/delete/{id}/facultie', 'FacultieController@delete');
Route::get('/edit/{id}/facultie', 'FacultieController@edit');
Route::put('/update/{id}/facultie', 'FacultieController@update');
Route::get('/show/{id}/facultie', 'FacultieController@show');


Route::get('/add_subject', 'SubjectController@index');
Route::post('/add_subject', 'SubjectController@store');
Route::get('/subject/view_all', 'SubjectController@view_all');
Route::get('/delete/{id}/subject', 'SubjectController@delete');
Route::get('/edit/{id}/subject', 'SubjectController@edit');
Route::put('/update/{id}/subject', 'SubjectController@update');
Route::get('/show/{id}/subject', 'SubjectController@show');



Route::get('/add_time', 'TimeController@index');
Route::post('/add_time', 'TimeController@store');

Route::post('/add_time/sana_drsia', 'TimeController@sana_drsia');
Route::get('/add_time/{id}', 'TimeController@get_sana_drsia');


Route::get('/time/view_all', 'TimeController@view_all');
Route::get('/delete/{id}/time', 'TimeController@delete');
Route::get('/edit/{id}/time', 'TimeController@edit');
Route::put('/update/{id}/time', 'TimeController@update');
Route::get('/show/{id}/time', 'TimeController@show');



Route::get('/sana_drsia', 'SanaDrsiaController@index');
Route::post('/sana_drsia', 'SanaDrsiaController@store');
Route::get('/sana_drsia/view_all', 'SanaDrsiaController@view_all')->name('view_programs');
Route::get('/delete/{id}/sana_drsia', 'SanaDrsiaController@delete');
Route::get('/edit/{id}/sana_drsia', 'SanaDrsiaController@edit');
Route::put('/update/{id}/sana_drsia', 'SanaDrsiaController@update');


Route::get('/courses', 'CourseController@index')->name('add_course');
Route::post('/courses', 'CourseController@store');
Route::get('/courses/view_all', 'CourseController@view_all')->name('view_all_courses');
Route::get('/delete/{id}/courses', 'CourseController@delete');
Route::get('/edit/{id}/courses', 'CourseController@edit');
Route::put('/update/{id}/courses', 'CourseController@update');




Route::get('/add_absent', 'AbsentController@index');
Route::post('/add_absent', 'AbsentController@absent');
Route::get('/absent/{no}/{facultie}', 'AbsentController@show_students');
Route::post('/absent/{no}/{facultie}', 'AbsentController@store');
Route::get('/absent/view_all', 'AbsentController@view_all');
Route::post('/absent/view_all', 'AbsentController@search');



Route::get('/add_scores', 'ScoreController@index');
Route::post('/add_scores', 'ScoreController@add_scores');
Route::get('/scores/view_all', 'ScoreController@view_all');
Route::get('/delete/{id}/score', 'ScoreController@delete');
Route::get('/edit/{id}/score', 'ScoreController@edit');
Route::put('/update/{id}/score', 'ScoreController@update');
Route::get('/show/{id}/score', 'ScoreController@show');


Route::group(['middleware' => ['StudentMiddleware']], function () {
    Route::get('/viwe/student/scores', 'HomeController@view_scores');
    Route::get('/viwe/student/time', 'HomeController@view_times');
    Route::get('/show_diplome', 'StudentDashboardController@show_diplome')->name('show_my_diplome');
    Route::post('/show_diplome', 'StudentDashboardController@send_message')->name('send_message');
    Route::get('/show_courses', 'StudentDashboardController@show_courses')->name('show_my_courses');
    Route::get('/view_homeworks', 'StudentDashboardController@show_my_homeworks')->name('show_my_homeworks');
    Route::post('/view_homeworks/{id}', 'StudentDashboardController@upload_homework')->name('upload_homework');
    Route::get('/view_homework/{id}', 'StudentDashboardController@view_homework')->name('view_homework');


    Route::get('/show_registered_diplome', 'StudentDashboardController@show_my_registered_diplome')->name('show_my_registered_diplome');
    Route::post('/show_registered_diplome', 'StudentDashboardController@upload_diplome_bill')->name('upload_diplome_bill');
    Route::get('/my_messages', 'StudentDashboardController@my_messages')->name('my_messages');
    Route::get('/delete/{id}/message/student', 'StudentDashboardController@delete_message')->name('delete_message_student');

    Route::get('/register_course', 'StudentDashboardController@register_internal')->name('register_internal')->middleware('RegisterTimeMiddleware');
    Route::post('/register_course', 'StudentDashboardController@register_course')->name('register_course');

    Route::get('/my_exams', 'StudentDashboardController@my_exams')->name('my_exams');
    Route::get('/instruction_exam/{id}', 'StudentDashboardController@instruction_exam')->name('instruction_exam');
    Route::get('/make_exam/{id}', 'StudentDashboardController@make_exam')->name('make_exam');
    Route::post('/finish_exam', 'StudentDashboardController@finish_exam')->name('finish_exam');
});



Route::group(['middleware' => ['TeacherMiddleware']], function () {
    Route::get('/view/teacher/time', 'HomeController@teacher_view_times');
    Route::get('/view/teacher/student', 'HomeController@teacher_view_students');
    Route::get('/teacher_inbox', 'HomeController@teacher_inbox')->name('teacher_inbox');
    Route::get('/teacher_inbox/{id}', 'HomeController@view_message_teacher')->name('view_message_teacher');
    Route::put('/teacher_inbox/{id}', 'HomeController@send_reply')->name('send_reply');
    Route::get('/delete/{id}/message/teacher', 'HomeController@delete_message_teacher')->name('delete_message_teacher');

    ###############   Assignments Routes ###########
    Route::get('/add_assignment', 'AssignmentController@index');
    Route::get('/get_section_subject/{id}', 'AssignmentController@get_section')->name('section_ajax');

    Route::post('/add_assignment', 'AssignmentController@add_assignment');
    Route::get('/show/{id}/assignment/', 'AssignmentController@view_assignment');
    Route::get('/edit/{id}/assignment/', 'AssignmentController@edit_assignment')->name('edit_assignment');
    Route::put('/update/{id}/assignment/', 'AssignmentController@update_assignment')->name('update_assignment');
    Route::get('/delete/{id}/assignment/', 'AssignmentController@delete_assignment')->name('delete_assignment');

    Route::get('/choose_subject', 'AssignmentController@choose_subject_assignment')->name('choose_subject_assignment');
    Route::post('/choose_subject', 'AssignmentController@get_subject')->name('get_subject');
    Route::get('/uploaded_assignments/{id}/{hw_no}', 'AssignmentController@show_uploaded_assignment')->name('uploaded_assignment');

    Route::get('/choose_subject_homework', 'AssignmentController@choose_subject_hw_no')->name('choose_subject_hw_no');
    Route::post('/choose_subject_homework', 'AssignmentController@get_subject_hw_no')->name('get_subject_hw_no');
    Route::get('/show_assignment/{id}/{hw_id}', 'AssignmentController@show_all_assignment');


    //Assignment Grade Routes
    Route::get('/grade/{id}/{subject_id}/{hw_num}/upload/', 'AssignmentController@show_grade_page')->name('show_upload');
    Route::put('/grade/{id}/{subject_id}/{hw_num}/upload/', 'AssignmentController@put_grade')->name('put_grade');

    ###############   Exam Routes ###########

    Route::get('/add_exam', 'ExamController@index')->name('add_exam');
    Route::post('/add_exam', 'ExamController@store')->name('store_exam_information');


    //Questions To Exam Routes
    Route::get('/add_questions_exam/{id}', 'ExamController@add_questions')->name('add_questions');
    Route::post('/add_questions_exam/{id}', 'ExamController@save_questions')->name('save_questions');

    Route::get('/edit/{id}/{exam_id}/question', 'ExamController@edit_questions')->name('edit_question');
    Route::put('/update/{id}/{exam_id}/question', 'ExamController@update_question')->name('update_question');
    Route::get('/show/{id}/question', 'ExamController@view_answers')->name('view_answers');
    Route::get('/delete/{id}/question', 'ExamController@delete_question')->name('delete_question');
    ###############   Exam Routes ###########

    Route::get('/show_exams', 'ExamController@show_exam')->name('show_exams');
    Route::post('/show_exams', 'ExamController@get_exam_data')->name('get_exam_data');
    Route::get('/view_exams/{id}/{exam_id}', 'ExamController@show_all_exams')->name('show_all_exams');

    Route::get('/edit/{id}/exam', 'ExamController@edit_exam')->name('edit_exam');
    Route::put('/update/{id}/exam', 'ExamController@update_exam')->name('update_exam');
    Route::get('/delete/{id}/exam', 'ExamController@delete_exam')->name('delete_exam');
    Route::get('/show/{id}/exam', 'ExamController@show_exam_details')->name('show_exam');
    Route::get('/choose_subject_scores', "HomeController@choose_subject_scores")->name('choose_subject_scores');
    Route::post('/choose_subject_scores', 'HomeController@get_subject_scores')->name('get_subject_scores');
    Route::get('/scores/{subject_id}/{section_id}', 'HomeController@show_subject_scores')->name('show_subject_scores');
});