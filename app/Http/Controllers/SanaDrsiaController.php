<?php

namespace App\Http\Controllers;

use App\Programme;
use Illuminate\Http\Request;

class SanaDrsiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminMiddleware:sana_drsia_view')->only('view_all', 'show');
        $this->middleware('AdminMiddleware:sana_drsia_edit')->only('update', 'edit');
        $this->middleware('AdminMiddleware:sana_drsia_add')->only('index', 'store');
        $this->middleware('AdminMiddleware:sana_drsia_delete')->only('delete');
    }

    public function index()
    {
        return view('pages.sana_drsia.add_sana_drsia');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:programmes',
            'available' => 'required',
        ]);
        if ($request->available == "yes") {
            $sana_drsia = Programme::create([
                'name' => $request->name,
                'available' => 1,
            ]);
        } else {
            $sana_drsia = Programme::create([
                'name' => $request->name,
                'available' => 0,
            ]);
        }

        if ($sana_drsia->save()) {
            return redirect()->back()->with("success", "لقد تم الاضافة بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في ادخال البيانات من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function edit(Programme $id)
    {
        $Sana_drsia = Programme::where('id', $id->id)->get();
        return view('pages.sana_drsia.edit_sana_drsia', compact('id', 'sana_drsia'));
    }
    public function update(Request $request, Programme $id)
    {
        $request->validate([
            'name' => 'required|unique:programmes,name,' . $id->id,
            'available' => 'required'
        ]);
        if ($request->available == "yes") {
            $update_program = Programme::where('id', $id->id)->update([
                'name' => $request->name,
                'available' => 1,
            ]);
        } else {
            $update_program = Programme::where('id', $id->id)->update([
                'name' => $request->name,
                'available' => 0,
            ]);
        }
        if ($update_program) {
            return redirect()->route('view_programs')->with("success", "تم التعديل بنجاح");
        } else {
            return redirect()->route('view_programs')->with("error", " حدث خطأ في تعديل البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function delete(Programme $id)
    {
        if ($id->delete()) {
            return redirect()->back()->with("success", "تم الحذف بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في مسح البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }

    public function view_all()
    {
        $sana_drsia = Programme::orderBy('id', 'DESC')->get();
        return view('pages.sana_drsia.view_sana_drsia', compact('sana_drsia'));
    }
}