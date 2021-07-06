<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Student;
use App\Section;
use App\Programme;
use App\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminMiddleware:student_view')->only('view_all', 'show');
        $this->middleware('AdminMiddleware:student_edit')->only('update', 'edit');
        $this->middleware('AdminMiddleware:student_add')->only('index', 'store');
        $this->middleware('AdminMiddleware:student_delete')->only('delete');
    }

    public function index()
    {

        $sana_drsia = Programme::all();
        $course = Course::all();
        return view('pages.student.add_students', compact('sana_drsia', 'course'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|arabic',
            'email' => 'required|unique:users',
            'National_ID' => 'required|numeric|min:10',
            'city' => 'required|arabic',
            'phone' => 'required|numeric|min:10',
            'course' => 'required',
            'sana_drsia' => 'required_without:courses',
            'courses' => 'required_without:sana_drsia',
            'years' => 'required',
            'date' => 'required',
            'note' => 'required|arabic',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'name_arabda' => 'required|arabic',
            'phone_arabda' => 'required|numeric|min:10',
            'arabda' => 'required',
        ]);

        if ($request->password_confirmation != $request->password) {
            return redirect()->back()->with("error", "كلمة المرور غير مطابقة");
        }
        if ($request->course == "course") {
            $student = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'National_ID' => $request->National_ID,
                'phone' => $request->phone,
                'years' => $request->years,
                'date' => $request->date,
                'note' => $request->note,
                'role' => 1,
            ]);
            if ($student->save()) {
                $id = $student->id;
                $student1 = new Student([
                    'city' => $request->city,
                    'name_arabda' => $request->name_arabda,
                    'phone_arabda' => $request->phone_arabda,
                    'arabda' => $request->arabda,
                    'user_id' => $id,
                    'sana' => 0,
                    'sana_drasia' => 'لم تسجل في دبلوم او برنامج',
                    'rakam_akdemi' => date("Ym") . rand(0, 15000),
                ]);
                UserCourse::create([
                    'course_id' => $request->courses,
                    'user_id' => $id,

                ]);
                if ($student1->save()) {
                    // require_once('api.php');
                    // $result = storee($student1->rakam_akdemi, $request->password, $request->name, $request->sana_drsia, $request->email, $request->phone);
                    return redirect()->back()->with("success", "لقد تم الإضافة بنجاح");
                } else {
                    $id->delete();
                    return redirect()->back()->with("error", " حدث خطأ في ادخال البيانات  من فضلك أعد المحاولة مرة أخرى");
                }
            } else {
                return redirect()->back()->with("error", " حدث خطأ في ادخال البيانات  من فضلك أعد المحاولة مرة أخرى");
            }
        } else {
            $student = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'National_ID' => $request->National_ID,
                'phone' => $request->phone,
                'years' => $request->years,
                'date' => $request->date,
                'note' => $request->note,
                'role' => 1,
            ]);
            if ($student->save()) {
                $id = $student->id;
                $student1 = new Student([
                    'city' => $request->city,
                    'name_arabda' => $request->name_arabda,
                    'phone_arabda' => $request->phone_arabda,
                    'arabda' => $request->arabda,
                    'user_id' => $id,
                    'sana' => 0,
                    'sana_drasia' => $request->sana_drsia,
                    'rakam_akdemi' => date("Ym") . rand(0, 15000),
                ]);

                if ($student1->save()) {
                    // require_once('api.php');
                    // $result = storee($student1->rakam_akdemi, $request->password, $request->name, $request->sana_drsia, $request->email, $request->phone);
                    return redirect()->back()->with("success", "لقد تم الإضافة بنجاح");
                } else {
                    $id->delete();
                    return redirect()->back()->with("error", " حدث خطأ في ادخال البيانات  من فضلك أعد المحاولة مرة أخرى");
                }
            } else {
                return redirect()->back()->with("error", " حدث خطأ في ادخال البيانات  من فضلك أعد المحاولة مرة أخرى");
            }
        }
    }
    public function show(User $id)
    {
        return view('pages.student.show_student', compact('id'));
    }
    public function showStudentCourse(User $id)
    {
        return view('pages.student.show_student_course', compact('id'));
    }

    public function edit(User $id)
    {
        $faculties = Section::all();
        $sana_drsia = Programme::all();
        return view('pages.student.edit_student', compact('id', 'faculties', 'sana_drsia'));
    }
    public function editStudentCourse(User $id)
    {
        $sana_drsia = Course::all();

        return view('pages.student.edit_course_student', compact('id', 'sana_drsia'));
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
            'city' => 'required|arabic',
            'name_arabda' => 'required|arabic',
            'phone_arabda' => 'required|numeric|min:10',
            'arabda' => 'required',
            'sana_drsia' => 'required',
            'status' => 'required',
        ]);

        $student = Student::where('user_id', $id->id)
            ->update(array(
                'city' => $request->city,
                'name_arabda' => $request->name_arabda,
                'phone_arabda' => $request->phone_arabda,
                'arabda' => $request->arabda,
                'status' => $request->status,
                'sana_drasia' => $request->sana_drsia,
            ));
        if ($student && $id->update($request->all())) {
            return redirect()->back()->with("success", "تم التعديل بتجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function updateCourseStudent(Request $request, User $id, Course $course_id)
    {
        $request->validate([
            'name' => 'required|arabic',
            'email' => 'required|unique:users,email,' . $id->id,
            'National_ID' => 'required|numeric|min:10',
            'phone' => 'required|numeric|min:10',
            'years' => 'required',
            'date' => 'required',
            'note' => 'required|arabic',
            'city' => 'required|arabic',
            'name_arabda' => 'required|arabic',
            'phone_arabda' => 'required|numeric|min:10',
            'arabda' => 'required',
            'sana_drsia' => 'required',
            'status' => 'required',
        ]);

        $student = Student::where('user_id', $id->id)
            ->update(array(
                'city' => $request->city,
                'name_arabda' => $request->name_arabda,
                'phone_arabda' => $request->phone_arabda,
                'arabda' => $request->arabda,
                'status' => $request->status,
                'sana_drasia' => 'لم تسجل في دبلوم او برنامج',
            ));
        $course = UserCourse::where(['user_id' => $id->id, 'course_id' => $course_id->id])
            ->update(array(
                'course_id' => $request->sana_drsia,
            ));
        if ($course && $student && $id->update($request->all())) {
            return redirect()->back()->with("success", "تم التعديل بتجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }

    public function delete(User $id)
    {
        // return $id;
        if ($id->delete()) {
            return redirect()->back()->with("success", "تم الحذف بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }

    public function view_all()
    {
        $students = User::where('role', '1')->orderBy('id', 'DESC')->get();
        // return $students;
        return view('pages.student.view_students', compact('students'));
    }
    public function view_all_courses()
    {
        $students = User::with('user_course', 'courses')->whereHas('user_course')->get();

        return view('pages.student.view_student_course', compact('students'));
    }
    public function show_registered_courses(User $id)
    {
        $students = UserCourse::where('user_id', $id->id)->with('course', 'user')->get();
        return view('pages.student.view_registered_courses', compact('students'));
    }

    public function update_password(Request $request, User $id)
    {
        if ($request->password_confirmation != $request->password) {
            return redirect()->back()->with("error", "كلمة المرور غير متطابقة");
        }
        if ($id->update($request->all())) {
            return redirect()->back()->with("success", "تم التعديل بتجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
}