<?php

namespace App\Http\Controllers;

use App\EmploymentRequest;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function index()
    {

        $all_requests = EmploymentRequest::all();
        return view('pages.employment.employment_request', compact('all_requests'));
    }

    public function show_employment_page()
    {
        return view('join_us');
    }
    public function upload_cv(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,zip',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'file.mimes' => 'فقط PDF الصيغ المسموحة للملف هي: '
        ]);
        $cv_file = $this->saveFile($request->file, 'cv_files');
        $uplod_cv = EmploymentRequest::create([
            'name' => $request->name,
            'file' => $cv_file,
        ]);

        if ($uplod_cv) {
            return redirect()->back()->with('success', 'تم ارفاق الاستمارة بنجاح');
        } else {
            return redirect()->back()->with('error', 'تعذر ارفاق الاستمارة الرجاء المحاولة مرة اخرى');
        }
    }

    public function delete_employment_request(EmploymentRequest $id)
    {
        $this->checkOld('cv_files/', $id->file);

        if ($id->delete()) {
            return redirect()->back()->with('success', 'تم حذف الطلب  بنجاح');
        } else {
            return redirect()->back()->with('error', 'تعذر حذف الطلب الرجاء المحاولة مرة اخرى');
        }
    }
    // save assignment file
    protected function saveFile($image, $folder)
    {
        $file_extenstion = $image->getClientOriginalExtension();
        $filename =  time() . "."  . $file_extenstion;
        $path = $folder;
        $image->move($path, $filename);
        return $filename;
    }
    //delete old assignment file
    protected function checkOld($path, $db_row)
    {
        $old_image = public_path($path . $db_row);
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
    }
}