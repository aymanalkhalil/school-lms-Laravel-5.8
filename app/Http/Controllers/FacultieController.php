<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Student;


class FacultieController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminMiddleware:facultie_view')->only('view_all', 'show');
        $this->middleware('AdminMiddleware:facultie_edit')->only('update', 'edit', 'edit_stuident');
        $this->middleware('AdminMiddleware:facultie_add')->only('index', 'store', 'post_stuident');
        $this->middleware('AdminMiddleware:facultie_delete')->only('delete');
    }

    public function index()
    {
        return view('pages.faculties.add_faculties');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nota' => 'required',
            'name' => 'required|unique:sections',
        ]);

        $facultie = new Section([
            'name' => $request->name,
            'nota' => $request->nota,
        ]);
        if ($facultie->save()) {
            return redirect('/add_student_in_sho3ba/' . $facultie->id);
            // return redirect()->back()->with( "success", "لقد تم الإضافة بنجاح" );
        } else {
            return redirect()->back()->with("error", " حدث خطأ في ادخال البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function show(Section $id)
    {
        $students = Student::where('sana', $id->id)->get();
        return view('pages.faculties.show_facultie', compact('id', 'students'));
    }

    public function edit(Section $id)
    {
        $students = Student::where('sana', $id->id)->get();
        return view('pages.faculties.edit_facultie', compact('id', 'students'));
    }
    public function update(Request $request, Section $id)
    {
        $request->validate([
            'nota' => 'required',
            'name' => 'required|unique:sections,name,' . $id->id,
        ]);
        if ($id->update($request->all())) {
            return redirect()->back()->with("success", "تم التعديل بتجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function delete(Section $id)
    {
        if ($id->delete()) {
            Student::where('sana', $id->id)
                ->update(array(
                    'sana' => 0,
                ));
            return redirect()->back()->with("success", "تم الحذف بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }

    public function view_all()
    {
        $faculties = Section::orderBy('id', 'DESC')->get();
        return view('pages.faculties.view_faculties', compact('faculties'));
    }
    public function add_stuident($id)
    {
        if (Section::where('id', $id)->first()) {
            $students = Student::where(
                [
                    ['sana', '0'],
                    ['sana_drasia', '!=',  'لم تسجل في دبلوم او برنامج']
                ]
            )->get();
            return view('pages.faculties.add_stuident', compact('students', 'id'));
        } else {
            return redirect()->back()->with("error", "لا يمكنك الدخول إلى هذه الصفحة");
        }
    }
    public function post_stuident(Request $request, $id)
    {
        foreach ($request->add as $id) {
            $student = Student::where('user_id', $id)
                ->update(array('sana' => $request->id_sho3ba,));
        }
        if ($student) {
            return redirect('/show/' . $request->id_sho3ba . '/facultie')->with("success", " تم الإضافة بنجاح إلى هذه الشعبة");
        } else {
            return redirect()->back()->with("error", " حدث خطا في حذف البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function edit_stuident(Request $request, $id)
    {
        foreach ($request->add as $id) {
            $student = Student::where('user_id', $id)
                ->update(array('sana' => 0,));
        }
        if ($student) {
            return redirect()->back()->with("success", "تم حذف الطالبة بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }
}