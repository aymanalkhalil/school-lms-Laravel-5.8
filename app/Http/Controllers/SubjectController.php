<?php

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use App\Programme;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminMiddleware:subject_view')->only('view_all', 'show');
        $this->middleware('AdminMiddleware:subject_edit')->only('update', 'edit');
        $this->middleware('AdminMiddleware:subject_add')->only('index', 'store');
        $this->middleware('AdminMiddleware:subject_delete')->only('delete');
    }

    public function index()
    {
        $teachers   = User::where('role', 2)->get();
        $sana_drsia = Programme::all();
        $sections = Section::all();
        return view('pages.subject.add_subject', compact('teachers', 'sana_drsia', 'sections'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'subject' => 'required',
            'academic_year' => 'required',
            'name_teacher' => 'required',
            'section_id' => 'required',
            'sana_drsia' => 'required',
            'nota' => 'required',
        ]);
        $subject = new Subject([
            'name' => $request->subject,
            'academic_year' => $request->academic_year,
            'user_id' => $request->name_teacher,
            'sana_drsia_id' => $request->sana_drsia,
            'section_id' => $request->section_id,
            'nota' => $request->nota,
        ]);
        if ($subject->save()) {
            return redirect()->back()->with("success", "لقد تم الاضافة بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطا في ادخال البيانات في قاعدة البيانات من فضلك اعد المحاولة مرة اخرى");
        }
    }
    public function show(Subject $id)
    {

        return view('pages.subject.show_subject', compact('id'));
    }

    public function edit(Subject $id)
    {
        $teachers = User::where('role', 2)->get();
        $sana_drsia = Programme::all();
        $sections = Section::all();

        return view('pages.subject.edit_subject', compact('id', 'teachers', 'sana_drsia', 'sections'));
    }
    public function update(Request $request, Subject $id)
    {
        $request->validate([
            'subject' => 'required',
            'academic_year' => 'required',
            'name_teacher' => 'required',
            'sana_drsia' => 'required',
            'section_id' => 'required',
            'nota' => 'required',
        ]);
        $subject = Subject::find($id->id);
        $subject->name = $request->subject;
        $subject->academic_year = $request->academic_year;
        $subject->user_id = $request->name_teacher;
        $subject->sana_drsia_id = $request->sana_drsia;
        $subject->section_id = $request->section_id;
        $subject->nota = $request->nota;

        if ($subject->save()) {
            return redirect()->back()->with("success", "تم التعديل بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطا في تعديل البيانات في قاعدة البيانات من فضلك اعد المحاولة مرة اخرى");
        }
    }
    public function delete(Subject $id)
    {
        if ($id->delete()) {
            return redirect()->back()->with("success", "تم الحذف بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطا في حذف البيانات في قاعدة البيانات من فضلك اعد المحاولة مرة اخري");
        }
    }

    public function view_all()
    {

        $subjects = Subject::orderBy('id', 'DESC')->get();
        return view('pages.subject.view_subjects', compact('subjects'));
    }
}