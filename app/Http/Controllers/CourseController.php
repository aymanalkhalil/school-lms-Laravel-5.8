<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.courses.add_course');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:courses',
            'available' => 'required',
        ]);

        if ($request->available == "yes") {
            $course = new Course([
                'name' => $request->name,
                'available' => 1,
            ]);
        } else {
            $course = new Course([
                'name' => $request->name,
                'available' => 0,
            ]);
        }

        if ($course->save()) {
            return redirect()->back()->with("success", "لقد تم اضافة الدورة بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في ادخال البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }


    public function show(Course $course)
    {
        //
    }
    public function view_all()
    {
        $all_courses = Course::Latest()->get();
        return view('pages.courses.view_course', compact('all_courses'));
    }

    public function edit(Course $id)
    {
        $course_edit = Course::where('id', $id->id)->get();
        return view('pages.courses.edit_course', compact('id', 'course_edit'));
    }

    public function update(Request $request, Course $id)
    {
        $request->validate([
            'name' => 'required|unique:courses,name,' . $id->id,
            'available' => 'required',
        ]);
        if ($request->available == "yes") {
            $update_course = Course::where('id', $id->id)->update([
                'name' => $request->name,
                'available' => 1,
            ]);
        } else {
            $update_course = Course::where('id', $id->id)->update([
                'name' => $request->name,
                'available' => 0,
            ]);
        }

        if ($update_course) {
            return redirect()->route('view_all_courses')->with("success", "تم تعديل بيانات الدورة بتجاح");
        } else {
            return redirect()->route('view_all_courses')->with("error", " حدث خطأ في تعديل البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }


    public function delete(Course $id)
    {
        if ($id->delete()) {
            return redirect()->back()->with("success", "تم حذف الدورة بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
}