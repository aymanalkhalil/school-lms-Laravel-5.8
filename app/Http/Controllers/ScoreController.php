<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Grades;

class ScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminMiddleware:score_view')->only('view_all', 'show');
        $this->middleware('AdminMiddleware:score_edit')->only('update', 'edit');
        $this->middleware('AdminMiddleware:score_add')->only('index', 'store');
        $this->middleware('AdminMiddleware:score_delete')->only('delete');
    }

    public function index()
    {
        $students = User::where('role', '1')->get();
        $subjects = Subject::all();
        return view('pages.scores.add_scores', compact('students', 'subjects'));
    }
    public function add_scores(Request $request)
    {
        $rows = array_chunk($request->all(), 4);
        $rowss = array_chunk($rows[0][2], 4);

        foreach ($rowss as $dragat) {
            $score = new Grades;
            $score->subject_id = $dragat[0];
            $score->sana       = $dragat[1];
            $score->fainal     = $dragat[2];
            $score->hudur      = $dragat[3];
            $score->user_id    = $request->name;
            $score->save();
        }
        return redirect()->back()->with("success", "تم الإضافة بتجاح");
    }
    public function view_all()
    {
        $scoresss   = Grades::all();
        $scores     = Grades::select('user_id')->get();
        $collection = collect($scores);
        $unique     = $collection->unique();
        $scores     = $unique->values()->all();
        return view('pages.scores.view_scores', compact('scores', 'scoresss'));
    }
    public function delete($id)
    {
        if (Grades::where('user_id', $id)->delete()) {
            return redirect()->back()->with("success", "تم الحذف بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function edit($id)
    {
        $scores     = Grades::where('user_id', $id)->get();
        $user       = User::where('id', $id)->first();
        $subjects   = Subject::all();
        return view('pages.scores.edit_score', compact('id', 'scores', 'subjects', 'user'));
    }
    public function update(Request $request, $id)
    {
        if (Grades::where('user_id', $id)->delete()) {
            $rows = array_chunk($request->all(), 4);
            $rowss = array_chunk($rows[0][3], 4);
            foreach ($rowss as $dragat) {
                $score = new Grades;
                $score->subject_id = $dragat[0];
                $score->sana       = $dragat[1];
                $score->fainal     = $dragat[2];
                $score->hudur      = $dragat[3];
                $score->user_id    = $request->name;
                $score->save();
            }
            return redirect()->back()->with("success", "تم التعديل بنجاح");
        }
    }


    public function show($id)
    {
        $scores     = Grades::where('user_id', $id)->get();
        $user       = User::where('id', $id)->first();
        $subjects   = Subject::all();
        return view('pages.scores.show_score', compact('id', 'scores', 'subjects', 'user'));
    }
}