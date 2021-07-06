<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absent;
use App\Section;
use App\Student;
use App\User;
use App\Programme;

class AbsentController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminMiddleware:absent_view')->only('view_all', 'show');
        $this->middleware('AdminMiddleware:absent_edit')->only('update', 'edit');
        $this->middleware('AdminMiddleware:absent_add')->only('index', 'store');
        $this->middleware('AdminMiddleware:absent_delete')->only('delete');
    }

    public function index()
    {
        $sana_drsia = Programme::all();
        $facultie = Section::all();
        return view('pages.absent.add_absent', compact('facultie', 'sana_drsia'));
    }
    public function store(Request $request, $no, $facultie)
    {
        $request->validate([
            'status' => 'required',
            'nota' => 'sometimes|nullable',
        ]);
        $x = 0;
        foreach ($request->status as $id) {
            $data = explode('-', $id);
            $absent = new Absent;
            $absent->day        = date("Y-m-d");
            $absent->facultie   = $facultie;
            $absent->no         = $no;
            $absent->user_id    = $data[0];
            if ($data[1] == "active") {
                $absent->status     = 1;
            }
            if ($data[1] == "Notactive") {
                $absent->status     = 0;
            }
            if ($data[1] == "excuse") {
                $absent->status     = 2;
                if ($request->nota[$x]) {
                    $absent->nota       = $request->nota[$x];
                    $x++;
                }
            }
            $absent->save();
        }
        return redirect('/add_absent')->with("success", " تم الاضافة الغياب بنجاح إلي هذة الشعبة");
    }

    public function absent(Request $request)
    {
        $facultie = Section::where('id', $request->facultie)->first();
        if ($facultie) {
            return redirect('/absent/' . $request->no . '/' . $request->facultie);
        } else {
            return redirect()->back()->with("error", "لا يوجد هذة الصفحة");
        }
    }

    public function show_students($no, $facultie)
    {
        $absent = Absent::where('no', $no)->where('facultie', $facultie)->where('day', date("Y-m-d"))->first();
        if (!$absent) {
            if (Section::where('id', $facultie)->first()) {
                $students = Student::where('sana', $facultie)->get();
                return view('pages.absent.view_students', compact('students', 'no', 'facultie'));
            } else {
                return redirect()->back()->with("error", "لا يوجد هذة الصفحة");
            }
        } else {
            return redirect()->back()->with("error", "لقد تم اخذ الغياب لهذه الشعبة و  لهذه الحصة ");
        }
    }

    public function view_all()
    {
        $facultie = Section::all();
        $day    = Absent::select('day')->get();
        $collection = collect($day);
        $unique     = $collection->unique();
        $days       = $unique->values()->all();
        return view('pages.absent.view_absent', compact('facultie', 'days'));
    }
    public function search(Request $request)
    {
        $request->validate([
            'day' => 'required',
            'no' => 'required',
            'facultie' => 'required',
        ]);
        $absents = Absent::where('no', $request->no)->where('facultie', $request->facultie)->where('day', $request->day)->first();
        if ($absents) {
            $no = $request->no;
            $facultie = $request->facultie;
            $day = $request->day;
            $facultie1 = Section::all();
            $absents = Absent::where('no', $request->no)->where('facultie', $request->facultie)->where('day', $request->day)->get();
            return view('pages.absent.show_absent', compact('absents', 'no', 'facultie', 'day', 'facultie1'));
        }
        return redirect()->back()->with("error", "لا يوجد حصة لهذا اليوم لهذه الشعبة");
    }
}