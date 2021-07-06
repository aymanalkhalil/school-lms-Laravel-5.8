<?php

namespace App\Http\Controllers;

use App\User;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminMiddleware:moderator_view')->only('view_all', 'show');
        $this->middleware('AdminMiddleware:moderator_edit')->only('update', 'edit');
        $this->middleware('AdminMiddleware:moderator_add')->only('index', 'store');
        $this->middleware('AdminMiddleware:moderator_delete')->only('delete');
    }

    public function index()
    {
        return view('pages.moderator.add_moderators');
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
            'student_delete' => 'sometimes|nullable|in:enable,disable',
            'student_add' => 'sometimes|nullable|in:enable,disable',
            'student_edit' => 'sometimes|nullable|in:enable,disable',
            'student_view' => 'sometimes|nullable|in:enable,disable',
            'moderator_delete' => 'sometimes|nullable|in:enable,disable',
            'moderator_add' => 'sometimes|nullable|in:enable,disable',
            'moderator_edit' => 'sometimes|nullable|in:enable,disable',
            'moderator_view' => 'sometimes|nullable|in:enable,disable',
            'teacher_delete' => 'sometimes|nullable|in:enable,disable',
            'teacher_add' => 'sometimes|nullable|in:enable,disable',
            'teacher_edit' => 'sometimes|nullable|in:enable,disable',
            'teacher_view' => 'sometimes|nullable|in:enable,disable',
            'score_delete' => 'sometimes|nullable|in:enable,disable',
            'score_add' => 'sometimes|nullable|in:enable,disable',
            'score_edit' => 'sometimes|nullable|in:enable,disable',
            'score_view' => 'sometimes|nullable|in:enable,disable',
            'subject_delete' => 'sometimes|nullable|in:enable,disable',
            'subject_add' => 'sometimes|nullable|in:enable,disable',
            'subject_edit' => 'sometimes|nullable|in:enable,disable',
            'subject_view' => 'sometimes|nullable|in:enable,disable',
            'time_delete' => 'sometimes|nullable|in:enable,disable',
            'time_add' => 'sometimes|nullable|in:enable,disable',
            'time_edit' => 'sometimes|nullable|in:enable,disable',
            'time_view' => 'sometimes|nullable|in:enable,disable',
            'facultie_delete' => 'sometimes|nullable|in:enable,disable',
            'facultie_add' => 'sometimes|nullable|in:enable,disable',
            'facultie_edit' => 'sometimes|nullable|in:enable,disable',
            'facultie_view' => 'sometimes|nullable|in:enable,disable',
            'absent_delete' => 'sometimes|nullable|in:enable,disable',
            'absent_add' => 'sometimes|nullable|in:enable,disable',
            'absent_edit' => 'sometimes|nullable|in:enable,disable',
            'absent_view' => 'sometimes|nullable|in:enable,disable',
            'sana_drsia_delete' => 'sometimes|nullable|in:enable,disable',
            'sana_drsia_add' => 'sometimes|nullable|in:enable,disable',
            'sana_drsia_edit' => 'sometimes|nullable|in:enable,disable',
            'sana_drsia_view' => 'sometimes|nullable|in:enable,disable',
        ]);
        if ($request->password_confirmation != $request->password) {
            return redirect()->back()->with("error", "كلمة المرور غير متطابقة");
        }
        $permission = Permission::create($request->all());
        $id = $permission->id;
        $moderator = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'National_ID' => $request->National_ID,
            'phone' => $request->phone,
            'years' => $request->years,
            'date' => $request->date,
            'note' => $request->note,
            'role' => $id,
        ]);
        if ($moderator->save()) {

            return redirect()->back()->with("success", "لقد تم الإضافة بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في ادخال البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function show(User $id)
    {
        return view('pages.moderator.show_moderator', compact('id'));
    }

    public function edit(User $id)
    {
        return view('pages.moderator.edit_moderator', compact('id'));
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
            'student_delete' => 'sometimes|nullable|in:enable,disable',
            'student_add' => 'sometimes|nullable|in:enable,disable',
            'student_edit' => 'sometimes|nullable|in:enable,disable',
            'student_view' => 'sometimes|nullable|in:enable,disable',
            'moderator_delete' => 'sometimes|nullable|in:enable,disable',
            'moderator_add' => 'sometimes|nullable|in:enable,disable',
            'moderator_edit' => 'sometimes|nullable|in:enable,disable',
            'moderator_view' => 'sometimes|nullable|in:enable,disable',
            'teacher_delete' => 'sometimes|nullable|in:enable,disable',
            'teacher_add' => 'sometimes|nullable|in:enable,disable',
            'teacher_edit' => 'sometimes|nullable|in:enable,disable',
            'teacher_view' => 'sometimes|nullable|in:enable,disable',
            'score_delete' => 'sometimes|nullable|in:enable,disable',
            'score_add' => 'sometimes|nullable|in:enable,disable',
            'score_edit' => 'sometimes|nullable|in:enable,disable',
            'score_view' => 'sometimes|nullable|in:enable,disable',
            'subject_delete' => 'sometimes|nullable|in:enable,disable',
            'subject_add' => 'sometimes|nullable|in:enable,disable',
            'subject_edit' => 'sometimes|nullable|in:enable,disable',
            'subject_view' => 'sometimes|nullable|in:enable,disable',
            'time_delete' => 'sometimes|nullable|in:enable,disable',
            'time_add' => 'sometimes|nullable|in:enable,disable',
            'time_edit' => 'sometimes|nullable|in:enable,disable',
            'time_view' => 'sometimes|nullable|in:enable,disable',
            'facultie_delete' => 'sometimes|nullable|in:enable,disable',
            'facultie_add' => 'sometimes|nullable|in:enable,disable',
            'facultie_edit' => 'sometimes|nullable|in:enable,disable',
            'facultie_view' => 'sometimes|nullable|in:enable,disable',
            'absent_delete' => 'sometimes|nullable|in:enable,disable',
            'absent_add' => 'sometimes|nullable|in:enable,disable',
            'absent_edit' => 'sometimes|nullable|in:enable,disable',
            'absent_view' => 'sometimes|nullable|in:enable,disable',
            'sana_drsia_delete' => 'sometimes|nullable|in:enable,disable',
            'sana_drsia_add' => 'sometimes|nullable|in:enable,disable',
            'sana_drsia_edit' => 'sometimes|nullable|in:enable,disable',
            'sana_drsia_view' => 'sometimes|nullable|in:enable,disable',
        ]);
        $array = array(
            'student_delete' => 'disable',
            'student_add' => 'disable',
            'student_edit' => 'disable',
            'student_view' => 'disable',
            'moderator_delete' => 'disable',
            'moderator_add' => 'disable',
            'moderator_edit' => 'disable',
            'moderator_view' => 'disable',
            'teacher_delete' => 'disable',
            'teacher_add' => 'disable',
            'teacher_edit' => 'disable',
            'teacher_view' => 'disable',
            'score_delete' => 'disable',
            'score_add' => 'disable',
            'score_edit' => 'disable',
            'score_view' => 'disable',
            'subject_delete' => 'disable',
            'subject_add' => 'disable',
            'subject_edit' => 'disable',
            'subject_view' => 'disable',
            'time_delete' => 'disable',
            'time_add' => 'disable',
            'time_edit' => 'disable',
            'time_view' => 'disable',
            'facultie_delete' => 'disable',
            'facultie_add' => 'disable',
            'facultie_edit' => 'disable',
            'facultie_view' => 'disable',
            'absent_delete' => 'disable',
            'absent_add' => 'disable',
            'absent_edit' => 'disable',
            'absent_view' => 'disable',
            'sana_drsia_delete' => 'disable',
            'sana_drsia_add' => 'disable',
            'sana_drsia_edit' => 'disable',
            'sana_drsia_view' => 'disable',
        );
        $disable_Permission = Permission::where('id', $id->role)->update($array);
        $request_p = $request->except(['name', 'email', 'National_ID', 'phone', 'years', 'date', 'note', '_token', '_method']);
        $Permission = Permission::where('id', $id->role)->update($request_p);

        if ($id->update($request->all()) && $Permission) {
            return redirect()->back()->with("success", "تم التعديل بتجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ  في قاعدة البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function delete(User $id)
    {
        $Permission = Permission::where('id', $id->role)->delete();
        if ($Permission) {
            return redirect()->back()->with("success", "تم الحذف بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }

    public function view_all()
    {
        $moderators = User::where('role', '>', '2')->where('id', '!=', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('pages.moderator.view_moderators', compact('moderators'));
    }
}