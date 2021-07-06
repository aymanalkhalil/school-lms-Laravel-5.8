<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminMiddleware:teacher_view')->only('view_all', 'show');
        $this->middleware('AdminMiddleware:teacher_edit')->only('update', 'edit');
        $this->middleware('AdminMiddleware:teacher_add')->only('index', 'store');
        $this->middleware('AdminMiddleware:teacher_delete')->only('delete');
    }


    public function index()
    {
        return view('pages.teacher.add_teachers');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|arabic',
            'email' => 'required|unique:users',
            'National_ID' => 'required|numeric|min:10',
            'phone' => 'required|numeric|min:10',
            'years' => 'required',
            'date' => 'required',
            'note' => 'required|arabic',
            'password_confirmation' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($request->password_confirmation != $request->password) {
            return redirect()->back()->with("error", "كلمة السر غير ماطبقة");
        }
        $teacher = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'National_ID' => $request->National_ID,
            'phone' => $request->phone,
            'years' => $request->years,
            'date' => $request->date,
            'note' => $request->note,
            'role' => 2,
        ]);
        if ($teacher->save()) {
            return redirect()->back()->with("success", "لقد تم الاضافة بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطا في ادخال البيانات في قاعدة البيانات من فضلك اعد المحاولة مرة اخري");
        }
    }
    public function show(User $id)
    {
        return view('pages.teacher.show_teacher', compact('id'));
    }

    public function edit(User $id)
    {
        return view('pages.teacher.edit_teacher', compact('id'));
    }
    public function update(Request $request, User $id)
    {
        $request->validate([
            'name' => 'required|arabic',
            'email' => 'required|unique:users,email,' . $id->id,
            'National_ID' => 'required|numeric|min:10',
            'phone' => 'required|numeric|min:10',
            'years' => 'required',
            'date' => 'required',
            'note' => 'required|arabic',
        ]);
        if ($id->update($request->all())) {
            return redirect()->back()->with("success", "تم التعديل بتجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطا في مسح البيانات في قاعدة البيانات من فضلك اعد المحاولة مرة اخري");
        }
    }
    public function delete(User $id)
    {
        if ($id->delete()) {
            return redirect()->back()->with("success", "تم المسح بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطا في مسح البيانات في قاعدة البيانات من فضلك اعد المحاولة مرة اخري");
        }
    }

    public function view_all()
    {
        $teachers = User::where('role', '2')->orderBy('id', 'DESC')->get();
        return view('pages.teacher.view_teachers', compact('teachers'));
    }
}