<?php

namespace App\Http\Controllers;

use Auth;
use App\Exam;
use App\User;
use App\Grades;
use App\Message;
use App\Section;
use App\Student;
use App\Subject;
use App\Schedule;
use App\Assignment;
use App\AssignmentUser;
use App\Collection_time;
use Illuminate\Http\Request;
use App\Http\Requests\AssignmentRequest;
use App\UserExam;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function view_scores()
    {
        $scores = Grades::where('user_id', Auth::user()->id)->get();
        $subjects = Subject::all();
        return view('pages.user.student.show_score', compact('scores', 'subjects'));
    }
    public function view_times()
    {
        $Facultie = Section::where('id', Auth::user()->student->sana)->first();
        if (!$Facultie) {
            return redirect('/home')->with('error', 'لا يوجد جدول دراسي حتي الآن');
        }
        $collection_time = Collection_time::where('sho3ba', $Facultie->name)->first();
        if (!$collection_time) {
            return redirect('/home')->with('error', 'لا يوجد جدول دراسي حتي الآن');
        }
        $time = Schedule::where('collection_time_id', $collection_time->id)->get();
        return view('pages.user.student.show_time', compact('time', 'collection_time'));
    }
    public function teacher_view_times()
    {
        $time = Schedule::all();
        return view('pages.user.teacher.show_time', compact('time'));
    }
    public function teacher_view_students()
    {
        $subject = Subject::with('section')->where('user_id', Auth::user()->id)->get();

        if (!$subject) {
            return redirect('/home')->with('error', 'لا يوجد جدول دراسي حتي الآن');
        }
        // return $subject;
        // $facultie = Section::where('id', $value->section_id)->get();


        // $collection_time = Collection_time::where('id', $time->collection_time_id)->get();





        return view('pages.user.teacher.show_all_students', compact('students', 'subject'));
    }

    public function teacher_inbox()
    {
        $all_messages = Message::where('teacher_id', Auth::user()->id)
            ->with('teacher')
            ->Latest()
            ->get();

        return view('pages.user.teacher.teacher_inbox', compact('all_messages'));
    }

    public function view_message_teacher(Message $id)
    {
        return view('pages.user.teacher.view_message', compact('id'));
    }
    public function send_reply(Request $request, $id)
    {

        $request->validate([
            'reply' => 'required',
        ], [
            'هذا الحقل مطلوب',
        ]);

        $send_reply = Message::where('id', $id)->update([
            'reply' => $request->reply,
        ]);

        if ($send_reply) {
            return redirect()
                ->route('teacher_inbox')
                ->with('success', 'تم ارسال الرد للطالبة بنجاح');
        } else {
            return redirect()
                ->back()
                ->with('error', 'حدث خطأ في ارسال الرد للطالبة الرجاء المحاولة لاحقاً');
        }
    }
    public function delete_message_teacher(Message $id)
    {
        if ($id->delete()) {
            return redirect()
                ->back()
                ->with('success', 'تم حذف الرسالة بنجاح');
        } else {
            return redirect()
                ->back()
                ->with('error', 'حدث خطأ في حذف الرسالة الرجاء المحاولة لاحقاً');
        }
    }

    public function choose_subject_scores()
    {
        $teacher_subjects = Subject::where('user_id', Auth::user()->id)->get();

        return view('pages.user.teacher.choose_subject_scores', compact('get_student', 'teacher_subjects'));
    }
    public function get_subject_scores(Request $request)
    {
        return redirect('/scores/' . $request->subject . '/' . $request->section);
    }
    public function show_subject_scores($subject_id, $section_id)
    {
        $user = Student::where(
            'sana',
            $section_id
        )->get();



        $user_assignment = User::with('assignment_upload', 'student')
            ->whereHas('assignment_upload')
            ->get();
        $assignment = Assignment::where([
            'subject_id' => $subject_id,
            'section_id' => $section_id,
            'user_id' => Auth::user()->id,
        ])->get();

        $user_exam = User::with('exam', 'student')
            ->whereHas('exam')
            ->get();


        $exams = Exam::where([
            'subject_id' => $subject_id,
            'section_id' => $section_id,
            'user_id' => Auth::user()->id,
        ])->get();
        return view('pages.user.teacher.show_scores', compact(
            'user',
            'section_id',
            'user_assignment',
            'subject_id',
            'exams',
            'user_exam',
            'assignment'
        ));
    }
}