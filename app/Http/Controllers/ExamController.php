<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Choice;
use App\Subject;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuestionRequest;

class ExamController extends Controller
{
    public function index()
    {
        $teacher_subjects =  Subject::where('user_id', Auth::user()->id)->get();

        return view('pages.user.teacher.add_exam', compact('teacher_subjects'));
    }
    public function store(ExamRequest $request)
    {

        $store_exam_info = Exam::create([
            'subject_id' => $request->subject,
            'section_id' => $request->section,
            'user_id' => Auth::user()->id,
            'exam_no' => $request->exam_number,
            'exam_date' => $request->exam_date,
            'exam_open' => $request->exam_open,
            'exam_close' => $request->exam_close,
            'timer' => $request->exam_period,
            'grade' => $request->grade,
        ]);
        if ($store_exam_info) {
            return redirect()->route('add_questions', $store_exam_info->id);

            // return redirect()->back()->with( "success", "لقد تم الإضافة بنجاح" );
        } else {
            return redirect()->back()->with("error", " حدث خطأ في ادخال البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function add_questions($id)
    {

        return view('pages.user.teacher.add_question', compact('id'));
    }
    public function save_questions(QuestionRequest $request, $id)
    {

        if ($request->type == "true_false") {
            $insert_question = Question::create([
                "exam_id" => $id,
                "type" => 0,
                "question" => $request->question_true,
                "mark" => $request->mark_true,
                "answer" => $request->correct_answer_true,

            ]);
            foreach ($request->answer_true as $key => $value) {
                $insert_choice = Choice::create([
                    "question_id" => $insert_question->id,
                    "choice" => $request->answer_true[$key],
                ]);
            }
        } elseif ($request->type == "multiple") {
            $insert_question = Question::create([
                "exam_id" => $id,
                "type" => 1,
                "question" => $request->question_mul,
                "mark" => $request->mark_mul,
                "answer" => $request->correct_answer_mul,

            ]);
            foreach ($request->answer_mul as $key2 => $value2) {
                $insert_choice = Choice::create([
                    "question_id" => $insert_question->id,
                    "choice" => $request->answer_mul[$key2],
                ]);
            }
        }

        if ($insert_question) {
            return redirect()->route('add_questions', $id)->with('success', "تم اضافة السؤال بنجاح");
        } else {
            return redirect()->route('add_questions', $id)->with('error', "حدث خطأ في اضافة السؤال برجاء المحاولة لاحقاً");
        }
    }

    public function edit_questions(Question $id, $exam_id)
    {
        // return $id->id;
        $get_choices = Choice::where('question_id', $id->id)->get();
        // return $get_choices;
        return view('pages.user.teacher.edit_question', compact('id', 'exam_id', 'get_choices'));
    }
    public function update_question(QuestionRequest $request, $id, $exam_id)
    {
        // return $request;
        if ($request->type == "true_false") {
            $update = Question::where('id', $id)->update([
                'exam_id' => $exam_id,
                'type' => 0,
                'question' => $request->question_true,
                'mark' => $request->mark_true,
                'answer' => $request->correct_answer_true,
            ]);
            // foreach ($request->answer_true as $answerKey => $value) {
            //     $updateChoice = Choice::where('question_id', $id)->update([
            //         "question_id" => $id,
            //         "choice" => $request->answer_true[$answerKey],

            //     ]);
            // }
        } elseif ($request->type == "multiple") {
            $update = Question::where('id', $id)->update([
                'exam_id' => $exam_id,
                'type' => 1,
                'question' => $request->question_mul,
                'mark' => $request->mark_mul,
                'answer' => $request->correct_answer_mul,
            ]);
            foreach ($request->answer_mul as $key => $value) {
                Choice::where('id', $request->choice_id[$key])->update([
                    "choice" => $request->answer_mul[$key],
                ]);
            }
        }
        if ($update) {
            return redirect()->route('add_questions',  $exam_id)->with('success', "تم تعديل بيانات السؤال");
        } else {
            return redirect()->route('add_questions', $exam_id)->with('error', " حدث خطأ في تعديل بيانات السؤال الرجاء المحاولة لاحقاً");
        }
    }
    public function view_answers(Question $id)
    {
        return view('pages.user.teacher.show_question', compact('id'));
    }
    public function delete_question(Question $id)
    {
        if ($id->delete()) {
            return redirect()->back()->with("success", "تم الحذف بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }

    public function show_exam()
    {
        $teacher_subjects = Subject::where('user_id', Auth::user()->id)->get();

        return view('pages.user.teacher.choose_exam', compact('teacher_subjects'));
    }
    public function get_exam_data(Request $request)
    {

        return redirect('/view_exams/' . $request->subject . '/' . $request->exam_number);
    }
    public function show_all_exams($subject_id, $exam_no)
    {

        $exam_data = Exam::with(['subject', 'section', 'question'])
            ->whereHas('subject')
            ->where([
                'user_id' => Auth::user()->id,
                'subject_id' => $subject_id,
                'exam_no' => $exam_no
            ])->latest()->get();

        // return $exam_data;
        return view('pages.user.teacher.show_added_exams', compact('exam_data'));
    }

    public function edit_exam(Exam $id)
    {
        $teacher_subjects =  Subject::where('user_id', Auth::user()->id)->get();


        return view('pages.user.teacher.edit_exam', compact('id', 'teacher_subjects'));
    }
    public function update_exam(ExamRequest $request)
    {
        $update = Exam::where('id', $request->id)->update([
            'subject_id' => $request->subject,
            'section_id' => $request->section,
            'user_id' => Auth::user()->id,
            'exam_no' => $request->exam_number,
            'exam_date' => $request->exam_date,
            'exam_open' => $request->exam_open,
            'exam_close' => $request->exam_close,
            'timer' => $request->exam_period,
            'grade' => $request->grade,
        ]);

        if ($update) {
            return redirect()->back()->with("success", "تم تعديل بيانات الاختبار بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في تعديل البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }

    public function delete_exam(Exam $id)
    {
        if ($id->delete()) {
            return redirect()->back()->with("success", "تم حذف الاختبار بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف الاختبار من فضلك أعد المحاولة مرة أخرى");
        }
    }

    public function show_exam_details(Exam $id)
    {
        $teacher_subjects =  Subject::where('user_id', Auth::user()->id)->get();

        return view('pages.user.teacher.show_exam_details', compact('id', 'teacher_subjects'));
    }
}