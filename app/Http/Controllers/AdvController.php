<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Programme;
use App\Advertisment;
use Illuminate\Http\Request;
use App\Http\Requests\AdvRequest;

class AdvController extends Controller
{
    public function index()
    {
        $programs = Programme::all();
        $courses = Course::all();
        $teachers = User::where('role', 2)->get();
        return view('pages.advertisments.add_advertisment', compact('programs', 'courses', 'teachers'));
    }
    public function save_adv(AdvRequest $request)
    {

        $save_adv = Advertisment::Create([
            'programme_id' => $request->programme_id,
            'target_audience' => $request->target_audience,
            'period' => $request->period,
            'day' => $request->day,
            'date' => $request->date,
            'course_name' => $request->course_name,
            'course_period' => $request->course_period,
            'from' => $request->from,
            'to' => $request->to,
            'teacher' => $request->teacher,
            'price' => $request->price,
        ]);

        if ($save_adv) {
            return redirect()->back()->with('success', 'تم الاضافة بنجاح');
        } else {
            return redirect()->back()->with('error', 'حدث خطأ الرجاء المحاولة لاحقاً');
        }
    }
    public function edit_adv(Advertisment $id)
    {
        $programs = Programme::all();
        $courses = Course::all();
        $teachers = User::where('role', 2)->get();
        // return $id;
        return view('pages.advertisments.edit_adv', compact('id', 'programs', 'courses', 'teachers'));
    }
    public function update_adv(AdvRequest $request, $id)
    {
        $update_adv = Advertisment::where('id', $id)->update([

            'programme_id' => $request->programme_id,
            'target_audience' => $request->target_audience,
            'period' => $request->period,
            'day' => $request->day,
            'date' => $request->date,
            'course_name' => $request->course_name,
            'course_period' => $request->course_period,
            'from' => $request->from,
            'to' => $request->to,
            'teacher' => $request->teacher,
            'price' => $request->price,

        ]);

        if ($update_adv) {
            return redirect()->back()->with('success', 'تم التعديل بنجاح');
        } else {
            return redirect()->back()->with('error', 'حدث خطأ الرجاء المحاولة لاحقاً');
        }
    }
    public function view_all_adv()
    {

        $programmes = Programme::with('adv')->whereHas('adv')->Latest()->get();
        return view('pages.advertisments.view_advertisments', compact('programmes'));
    }

    public function delete_adv(Advertisment $id)
    {
        if ($id->delete()) {
            return redirect()->back()->with('success', 'تم حذف الاعلان بنجاح');
        } else {
            return redirect()->back()->with('error', 'حدث خطأ الرجاء المحاولة لاحقاً');
        }
    }
}