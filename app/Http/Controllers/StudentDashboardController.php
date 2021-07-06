<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use App\Course;
use App\Message;
use App\Section;
use App\Student;
use App\Subject;
use App\Question;
use App\UserExam;
use App\Programme;
use App\Assignment;
use App\UserCourse;
use App\StudentExam;
use App\StudentAnswer;
use App\AssignmentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AssignmentUploadRequest;
use App\Http\Requests\UploadDiplomeBillRequest;

class StudentDashboardController extends Controller
{
    public function show_diplome()
    {
        $student_diplome = Student::where('user_id', Auth::user()->id)->with('section')->first();

        $diploma_data = Subject::where('section_id', $student_diplome->sana)->with(['user', 'sana_drsia', 'section'])->get();
        // return $diploma_data;
        return view('pages.user.student.my_diplome', compact('diploma_data'));
    }
    public function show_courses()
    {
        $student_course = UserCourse::where('user_id', Auth::user()->id)->with('course')->get();
        if (!$student_course) {
            return redirect()->back()->with('error', 'لا يوجد لديكي دورات مسجلة');
        }
        return view('pages.user.student.my_courses', compact('student_course'));
    }
    public function show_my_homeworks()
    {
        $current_user = Student::where('user_id', Auth::user()->id)->with('section')->first();
        $get_assignment = Assignment::where('section_id', $current_user->sana)->with(['subject', 'uploads'])->get();
        $test = User::where('id', Auth::user()->id)->whereHas('assignment_upload')->first();
        return view('pages.user.student.my_homeworks', compact('get_assignment', 'test'));
    }
    public function view_homework(Assignment $id)
    {
        return view('pages.user.student.upload_homework', compact('id'));
    }


    public function upload_homework(AssignmentUploadRequest $request, $id)
    {
        $uploaded_file = $this->saveFile($request->upload_file, 'assignments_uploads');
        // return $request;
        if (empty($request->comments)) {
            $save_assignment = AssignmentUser::create([
                'assignment_id' => $id,
                'user_id' => Auth::user()->id,
                'file' => $uploaded_file,
                'hw_number' => $request->hw_number,
            ]);
        } else {
            $save_assignment = AssignmentUser::create([
                'assignment_id' => $id,
                'user_id' => Auth::user()->id,
                'comments' => $request->comments,
                'file' => $uploaded_file,
                'hw_number' => $request->hw_number,

            ]);
        }

        if ($save_assignment) {
            return redirect()->route('show_my_homeworks')->with('success', 'تم تسليم الواجب بنجاح');
        } else {
            return redirect()->route('show_my_homeworks')->with('error', 'حدث خطأ في تسليم الواجب  برجاء المحاولة لاحقاً');
        }
    }
    public function show_my_registered_diplome()
    {
        $get_diplome = Student::where('user_id', Auth::user()->id)->get();
        // return $get_diplome;
        return view('pages.user.student.show_registered_diplome', compact('get_diplome'));
    }
    public function upload_diplome_bill(UploadDiplomeBillRequest  $request)
    {
        // return $request;
        $uploaded_file = $this->saveFile($request->upload_file, 'images/diplome_bills');


        $upload_diplome_bill = Student::where('id', $request->user_id)->update([
            "bill" => $uploaded_file,
        ]);
        if ($upload_diplome_bill) {
            return redirect()->back()->with('success', 'تم ارفاق الوصل بنجاح');
        } else {
            return redirect()->back()->with('error', 'حدث خطأ في ارفاق الوصل  برجاء المحاولة لاحقاً');
        }
    }

    public function send_message(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'file' => 'mimes:doc,pdf,docx,zip,png,jpeg,jpg',
        ]);

        if (empty($request->file)) {
            $send_message = Message::create([
                'teacher_id' => $request->teacher_id,
                'user_id' => Auth::user()->id,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);
        } else {
            $uploaded_file = $this->saveFile($request->file, 'messages_attachments/');
            $send_message = Message::create([
                'teacher_id' => $request->teacher_id,
                'user_id' => Auth::user()->id,
                'subject' => $request->subject,
                'message' => $request->message,
                'attachements' => $uploaded_file,


            ]);
        }
        if ($send_message) {
            return redirect()->back()->with('success', 'تم ارسال الرسالة  بنجاح');
        } else {
            return redirect()->back()->with('error', 'حدث خطأ في ارسال الرسالة  برجاء المحاولة لاحقاً');
        }
    }
    public function my_messages()
    {
        $all_messages = Message::where('user_id', Auth::user()->id)->with(['teacher', 'user'])->Latest()->get();
        return view('pages.user.student.my_messages', compact('all_messages'));
    }
    public function delete_message(Message $id)
    {
        $this->checkOld('messages_attachments/', $id->attachements);

        if ($id->delete()) {
            return redirect()->back()->with("success", "تم الحذف بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }


    public function register_internal()
    {
        $course = Course::where('available', 1)->get();
        $sana_drsia = Programme::where('available', 1)->get();
        return view('pages.user.student.register_course', compact('course', 'sana_drsia'));
    }
    public function register_course(Request $request)
    {
        $request->validate([
            "course" => "required",
            'sana_drsia' => 'required_without:courses',
            'courses' => 'required_without:sana_drsia',
            'course_bill' => 'required_without:sana_drsia|mimes:jpeg,png,jpg,pdf',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'courses.required_without' => 'هذا الحقل مطلوب',
            'course_bill.required_without' => 'هذا الحقل مطلوب',
            'sana_drsia.required_without' => 'هذا الحقل مطلوب',
        ]);

        if ($request->course == "course") {
            $image = $this->saveFile($request->course_bill, 'images/bills/');
            $register = UserCourse::create([
                'course_id' => $request->courses,
                'user_id' => Auth::user()->id,
                'bill' => $image,
            ]);
        } else {
            if ($request->hasFile('diploma_bill')) {
                $image = $this->saveFile($request->diploma_bill, 'images/diplome_bills/');

                $register = Student::where('user_id', Auth::user()->id)->update([
                    "sana_drasia" => $request->sana_drsia,
                    "bill" => $image,
                ]);
            } else {
                $register = Student::where('user_id', Auth::user()->id)->update([
                    "sana_drasia" => $request->sana_drsia,

                ]);
            }
        }
        if ($register) {
            return redirect()->back()->with("success", "تم التسجيل بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في التسجيل من فضلك أعد المحاولة مرة أخرى");
        }
    }

    public function my_exams()
    {
        $current_user = Student::where('user_id', Auth::user()->id)->with('section')->first();

        $exam = Exam::where('section_id', $current_user->sana)->get();
        return view('pages.user.student.my_exams', compact('exam'));
    }
    public function instruction_exam(Exam $id)
    {
        return view('pages.user.student.instructions', compact('id'));
    }
    public function make_exam(Exam $id)
    {
        $get_questions = Question::where('exam_id', $id->id)->with('choice', 'exam')->get();
        return view('pages.user.student.make_exam', compact('get_questions', 'id'));
    }
    public function finish_exam(Request $request)
    {
        $get_questions = Question::where('exam_id', $request->exam_id)->get();
        if (empty($request->answer)) {

            $ins_mark = UserExam::Create([
                'user_id' => Auth::user()->id,
                'exam_id' => $request->exam_id,
                'exam_no' => $request->exam_no,
                'grade' => 0,
            ]);
            return redirect()->route('my_exams')->with('error', 'لم يتم الاجابة على اي سؤال');
        } else {
            $grade = 0;
            $answers_user = array();

            foreach ($request->answer as $key => $value) {
                foreach ($get_questions as $Qkey => $Qvalue) {
                    $answer = $Qvalue->answer;
                    if ($value == $answer && $Qvalue->id == $request->question_id[$key]) {
                        $grade += $Qvalue->mark;
                    }
                }
                StudentAnswer::Create([
                    'exam_id' => $request->exam_id,
                    'question_id' => $request->question_id[$key],
                    'answer' => $request->answer[$key],

                ]);
            }



            $ins_mark = UserExam::Create([
                'user_id' => Auth::user()->id,
                'exam_id' => $request->exam_id,
                'exam_no' => $request->exam_no,
                'grade' => $grade,
            ]);

            echo "<script>localStorage.removeItem('count')</script>";

            if ($ins_mark) {
                return redirect()->route('my_exams')->with('success', 'تم حفظ اجاباتك بنجاح');
            } else {
                return redirect()->route('my_exams')->with('error', 'حدث خطأ في قاعدة البيانات الرجاء المحاولة لاحقاً ');
            }
        }




        // return view('pages.user.student.make_exam', compact('get_questions', 'id'));
    }




    // save assignment file
    protected function saveFile($image, $folder)
    {
        $file_extenstion = $image->getClientOriginalExtension();
        $filename =  time() . "."  . $file_extenstion;
        $path = $folder;
        $image->move($path, $filename);
        return $filename;
    }
    //delete old assignment file
    protected function checkOld($path, $db_row)
    {
        $old_image = public_path($path . $db_row);
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
    }
}