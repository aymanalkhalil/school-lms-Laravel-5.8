<?php

namespace App\Http\Controllers;

use Auth;
use assign;
use App\User;
use App\Section;
use App\Student;
use App\Subject;
use App\Assignment;
use App\AssignmentUser;
use Illuminate\Http\Request;
use App\Http\Requests\AssignmentRequest;
use mod_lti\local\ltiservice\response;

class AssignmentController extends Controller
{

    public function index()
    {

        $teacher_subjects =  Subject::where('user_id', Auth::user()->id)->get();
        // $sections =  Subject::with('section')->get();
        // return $sections;
        $sections = Section::all();
        return view('pages.user.teacher.add_assignment', compact('sections', 'teacher_subjects'));
    }
    public function get_section($id)
    {
        $check = Subject::with('section')->where('id', $id)->get();

        foreach ($check as  $value) {

            echo "<option value='{$value->section->id}' selected>{$value->section->name}</option>";
        }
    }
    public function add_assignment(AssignmentRequest $request)
    {
        $assignment_file = $this->saveFile($request->file, 'assignments');
        $save_assignment = Assignment::create([
            'subject_id' => $request->subject,
            'section_id' => $request->section,
            'user_id' => Auth::user()->id,
            'hw_number' => $request->homework_number,
            'final_date' => $request->final_date,
            'final_time' => $request->final_time,
            'file' => $assignment_file,
            'note' => $request->note,
        ]);
        if ($save_assignment) {
            return redirect()->back()->with('success', 'تم اضافة الواجب بنجاح');
        } else {
            return redirect()->back()->with('error', 'حدث خطأ في اضافة الواجب برجاء المحاولة لاحقاً');
        }
    }


    public function view_assignment(Assignment $id)
    {
        // return $id->section->name;

        return view('pages.user.teacher.view_assignemts', compact('id'));
    }
    public function edit_assignment(Assignment $id)
    {
        $teacher_subjects =  Subject::where('user_id', Auth::user()->id)->get();
        $sections =  Section::all();

        return view('pages.user.teacher.edit_assignment', compact('sections', 'teacher_subjects', 'id'));
    }
    public function update_assignment(AssignmentRequest $request, $id)
    {
        $update = Assignment::where('id', $id)->update([
            'subject_id' => $request->subject,
            'section_id' => $request->section,
            'user_id' => Auth::user()->id,
            'hw_number' => $request->homework_number,
            'final_date' => $request->final_date,
            'final_time' => $request->final_time,
            'note' => $request->note,
        ]);
        if ($request->hasFile('file')) {
            $assignment_file = $this->saveFile($request->file, 'assignments');
            Assignment::where('id', $id)->update([
                'file' => $assignment_file,
            ]);
        }
        if ($update) {
            return redirect()->back()->with('success', "تم تعديل بيانات الواجب");
        } else {
            return redirect()->back()->with('error', " حدث خطأ في تعديل بيانات الواجب الرجاء المحاولة لاحقاً");
        }
    }


    public function delete_assignment(Assignment $id)
    {
        $this->checkOld('assignments/', $id->file);
        if ($id->delete()) {

            return redirect()->back()->with("success", "تم الحذف بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function choose_subject_assignment()
    {
        $subjects = Subject::where('user_id', Auth::user()->id)->get();
        return view('pages.user.teacher.choose_subject', compact('get_student', 'subjects'));
    }
    public function get_subject(Request $request)
    {
        return redirect('/uploaded_assignments/' . $request->subject_id . '/' . $request->homework_number);
    }

    public function show_uploaded_assignment(Request $request, $id, $hw_no)
    {
        // $get_subjects = Subject::where('id', $id)->with('section', 'assignment')->whereHas('assignment')->get();
        // return $get_subjects;
        // if (!$get_subjects) {
        //     return redirect()->back()->with("error", "لا يوجد واجبات لهذه المادة");
        // }
        // $get_students = Student::with('user')->where('sana', $get_subjects->section->id)->get();
        $check_assignment = Assignment::where([
            'subject_id' => $id,
            'hw_number' => $hw_no
        ])->first();
        if (!$check_assignment) {
            return redirect()->back()->with("error", "لا يوجد بيانات");
        }
        $assignment_data = AssignmentUser::where('assignment_id', $check_assignment->id)->with(['user', 'assignment'])->get();
        // $assignment_data = User::with(['assignment_upload'])->whereHas('assignment_upload')->get();
        // $assignment_data = Assignment::with(['uploads', 'section', 'subject'])->whereHas('uploads')->get();
        // return $get_students;
        // return $assignment_data;
        if ($assignment_data->isEmpty()) {
            return redirect()->back()->with("error", "لا يوجد واجبات تم تسليمها من قبل الطالبات");
        }
        return view('pages.user.teacher.uploaded_assignment', compact('get_students', 'assignment_data', 'id'));
    }

    public function show_grade_page(AssignmentUser $id, $subject_id, $hw_num)
    {

        return view('pages.user.teacher.put_grade', compact('id', 'subject_id', 'hw_num'));
    }
    public function put_grade(Request $request, $id, $subject_id, $hw_num)
    {
        $request->validate([
            'mark' => 'required',
        ], ['required' => 'عذراً يجب تعبئة حقل الدرجة']);
        // return $id;
        $put_mark = AssignmentUser::where('id', $id)->update([
            'mark' => $request->mark,
        ]);
        if ($put_mark) {
            return redirect()->route("uploaded_assignment", ["id" => $subject_id, "hw_no" => $hw_num])->with("success", "تم وضع الدرجة بنجاح");
        } else {
            return redirect()->route("uploaded_assignment", ["id" => $subject_id, "hw_no" => $hw_num])->with("error", " حدث خطا في حفظ الدرجة من فضلك اعد المحاولة مرة اخرى");
        }
    }

    public function choose_subject_hw_no()
    {
        $subjects = Subject::where('user_id', Auth::user()->id)->get();
        return view('pages.user.teacher.choose_subject_hw_no', compact('get_student', 'subjects'));
    }
    public function get_subject_hw_no(Request $request)
    {
        return redirect('/show_assignment/' . $request->subject_id . '/' . $request->homework_number);
    }
    public function show_all_assignment($subject_id, $hw_no)
    {
        $all_assignments = Assignment::with(['subject', 'section'])
            ->whereHas('subject')
            ->where([
                'user_id' => Auth::user()->id,
                'subject_id' => $subject_id,
                'hw_number' => $hw_no
            ])->latest()->get();
        // return $all_assignments;
        if (!$all_assignments) {
            return redirect()->back()->with("error", "لا يوجد واجبات قمتي باضافتها لهذه المادة");
        }
        return view('pages.user.teacher.show_assignemts', compact('all_assignments'));
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
            unlink($old_image);
        } else {
            return false;
        }
    }
}