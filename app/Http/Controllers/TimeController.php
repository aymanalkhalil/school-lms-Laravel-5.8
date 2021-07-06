<?php

namespace App\Http\Controllers;

use App\User;
use App\Section;
use App\Schedule;
use App\Subject;
use App\Collection_time;

use App\Programme;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminMiddleware:time_view')->only('view_all', 'show');
        $this->middleware('AdminMiddleware:time_edit')->only('update', 'edit');
        $this->middleware('AdminMiddleware:time_add')->only('index', 'store');
        $this->middleware('AdminMiddleware:time_delete')->only('delete');
    }
    public function index()
    {
        $sana_drsia = Programme::all();
        return view('pages.time.add_frist', compact('sana_drsia'));
    }
    public function sana_drsia(Request $request)
    {
        return redirect('/add_time/' . $request->sana_drsia);
    }
    public function get_sana_drsia(Request $request, $id)
    {
        $faculties = Section::all();

        $subjects = Subject::where('sana_drsia_id', $id)->get();

        return view('pages.time.add_time', compact('faculties', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'sho3ba' => 'required|unique:collection_times',
        ]);
        $Collection_Time = new Collection_time;
        $Collection_Time->sho3ba = $request->sho3ba;
        $Collection_Time->save();
        $id = $Collection_Time->id;


        $rows = array_chunk($request->all(), 8);
        $x = 1;
        $z = 0;
        $y = 1;
        $save = 1;
        $day = array('الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس');
        foreach ($rows[0][1] as $hasa) {
            if ($hasa == '') {
                $x++;
                $y++;
                if ($x == 9) {
                    $z++;
                    $y = 1;
                    $x = 1;
                }
            } else {
                $Time = new Schedule;
                $Time->subject_id = $hasa;
                $x++;
                if ($x == 9) {
                    $Time->yom  = $day[$z++];
                    $Time->no   = $y;
                    $y = 1;
                    $x = 1;
                } else {
                    $Time->yom  = $day[$z];
                    $Time->no   = $y;
                }
                $Time->collection_time_id = $id;
                $Time->save();
                $y++;
                $save++;
            }
        }
        if ($save) {
            return redirect()->back()->with("success", "تم الاضافة بنجاح");
        }
    }
    public function show($id)
    {
        $time = Schedule::where('collection_time_id', $id)->get();
        $collection_time = Collection_time::where('id', $id)->first();
        return view('pages.time.show_time', compact('time', 'collection_time'));
    }

    public function edit(Collection_time $id)
    {
        $faculties = Section::all();
        $subjects  = Subject::all();
        $time      = Schedule::where('collection_time_id', $id->id)->get();
        return view('pages.time.edit_time', compact('id', 'faculties', 'subjects', 'time'));
    }
    public function update(Request $request, Collection_time $id)
    {
        $request->validate([
            'subject' => 'required',
            'sho3ba' => 'required|unique:collection_times,sho3ba,' . $id->id,
        ]);
        $Time = Schedule::where('collection_time_id', $id->id)->delete();
        $rows = array_chunk($request->all(), 8);
        $x = 1;
        $z = 0;
        $y = 1;
        $day = array('الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس');
        foreach ($rows[0][2] as $hasa) {
            if ($hasa == '') {
                $x++;
                $y++;
                if ($x == 9) {
                    $z++;
                    $y = 1;
                    $x = 1;
                }
            } else {
                $Time = new Schedule;
                $Time->subject_id = $hasa;
                $x++;
                if ($x == 9) {
                    $Time->yom  = $day[$z++];
                    $Time->no   = $y;
                    $y = 1;
                    $x = 1;
                } else {
                    $Time->yom  = $day[$z];
                    $Time->no   = $y;
                }
                $Time->collection_time_id = $id->id;
                $Time->save();
                $y++;
            }
        }
        if ($id->update($request->all())) {
            return redirect()->back()->with("success", "تم التعديل بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطا في مسح البيانات في قاعدة البيانات من فضلك اعد المحاولة مرة اخري");
        }
    }
    public function delete(Collection_time $id)
    {
        if ($id->delete()) {
            return redirect()->back()->with("success", "تم المسح بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطا في مسح البيانات في قاعدة البيانات من فضلك اعد المحاولة مرة اخري");
        }
    }
    public function view_all()
    {
        $times = Collection_Time::all();
        return view('pages.time.view_times', compact('times'));
    }
}