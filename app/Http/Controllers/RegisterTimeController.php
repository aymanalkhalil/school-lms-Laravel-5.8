<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class RegisterTimeController extends Controller
{
    public function index()
    {
        $check_permission = Permission::where('id', 3)->get();
        return view('pages.register_time.register_time', compact('check_permission'));
    }


    public function edit_register_time(Permission $id)
    {

        if ($id->register_time == "disable") {
            $update = Permission::where('id', 3)->update(["register_time" => "enable"]);
        } else {
            $update = Permission::where('id', 3)->update(["register_time" => "disable"]);
        }
        if ($update) {
            return redirect()->back()->with('success', "تم السماح للطلبة بالتسجيل");
        } else {
            return redirect()->back()->with('success', "حدث خطأ بالعملية الرجاء المحاولة لاحقاً");
        }
    }
}