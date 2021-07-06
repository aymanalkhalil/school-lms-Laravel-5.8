<?php

namespace App\Http\Controllers;

use App\User;
use App\Salary;
use App\Finance;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FinanceController extends Controller
{
    public function index()
    {
        return view('pages.finance.add_employee');
    }

    public function add_employee(Request $request)
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
        ]);

        $employee = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'National_ID' => $request->National_ID,
            'phone' => $request->phone,
            'years' => $request->years,
            'date' => $request->date,
            'note' => $request->note,
            'role' => 4,
        ]);

        if ($employee) {

            return redirect()->back()->with("success", "لقد تم الإضافة بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في ادخال البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function view_employees()
    {
        $finance_emp = User::where('role', 4)->get();
        return view('pages.finance.view_employees', compact('finance_emp'));
    }
    public function edit_employee(User $id)
    {

        return view('pages.finance.edit_employee', compact('id'));
    }
    public function update_employee(Request $request, User $id)
    {
        $request->validate([
            'name' => 'required|arabic',
            'email' => 'required',
            'National_ID' => 'required|numeric|min:10',
            'phone' => 'required|numeric|min:10',
            'years' => 'required',
            'date' => 'required',
            'note' => 'required|arabic',

        ]);
        $update_emp = User::where('id', $id->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'National_ID' => $request->National_ID,
            'phone' => $request->phone,
            'years' => $request->years,
            'date' => $request->date,
            'note' => $request->note,
        ]);


        if ($update_emp) {
            return redirect()->back()->with("success", "لقد تم التحديث بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في تحديث البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function add_moderator_salaries()
    {
        $all_mod = User::where('role', ">", 4)->Latest()->get();
        $all_salaries = Salary::with('user')->whereHas('user')->Latest()->get();

        return view('pages.finance.add_moderator_salaries', compact('all_mod', 'all_salaries'));
    }

    public function save_salaries(Request $request)
    {
        $request->validate(
            [
                "date" => "required",
                "salary" => "required",
                "description" => "required",
            ],
            [
                "required" => 'هذا الحقل مطلوب'
            ]
        );

        $save_sal = Salary::create([
            "user_id" => $request->user_id,
            "date" => $request->date,
            "salary" => $request->salary,
            "description" => $request->description,
        ]);
        if ($save_sal) {
            return redirect()->back()->with("success", "لقد تم الحفظ بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حفظ البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }

    public function edit_salary_mod(Salary $id)
    {

        return view('pages.finance.edit_salary_mod', compact('id'));
    }
    public function update_salary_mod(Request $request, $id)
    {

        $request->validate(
            [
                "date" => "required",
                "salary" => "required",
                "description" => "required",
            ],
            [
                "required" => 'هذا الحقل مطلوب'
            ]
        );

        $update_sal = Salary::where('id', $id)->update([
            "user_id" => $request->user_id,
            "date" => $request->date,
            "salary" => $request->salary,
            "description" => $request->description,
        ]);
        if ($update_sal) {
            return redirect()->route('add_moderator_salaries')->with("success", "لقد تم التعديل بنجاح");
        } else {
            return redirect()->route('add_moderator_salaries')->with("error", " حدث خطأ في تعديل البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function delete_salary_mod(Salary $id)
    {
        if ($id->delete()) {

            return redirect()->back()->with("success", "لقد تم حذف بيانات الراتب بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function add_teacher_salaries()
    {
        $all_mod = User::where('role', 2)->Latest()->get();

        $all_salaries = Salary::with('user')->whereHas('user')->Latest()->get();
        return view('pages.finance.add_teacher_salaries', compact('all_mod', 'all_salaries'));
    }
    public function save_teacher_salaries(Request $request)
    {
        $request->validate(
            [
                "date" => "required",
                "salary" => "required",
                "description" => "required",
            ],
            [
                "required" => 'هذا الحقل مطلوب'
            ]
        );

        $save_sal = Salary::create([
            "user_id" => $request->user_id,
            "date" => $request->date,
            "salary" => $request->salary,
            "description" => $request->description,
        ]);
        if ($save_sal) {
            return redirect()->back()->with("success", "لقد تم الحفظ بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حفظ البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function edit_salary_teacher(Salary $id)
    {
        return view('pages.finance.edit_salary_teacher', compact('id'));
    }
    public function update_salary_teacher(Request $request, $id)
    {
        $request->validate(
            [
                "date" => "required",
                "salary" => "required",
                "description" => "required",
            ],
            [
                "required" => 'هذا الحقل مطلوب'
            ]
        );

        $update_sal = Salary::where('id', $id)->update([
            "user_id" => $request->user_id,
            "date" => $request->date,
            "salary" => $request->salary,
            "description" => $request->description,
        ]);
        if ($update_sal) {
            return redirect()->route('add_teacher_salaries')->with("success", "لقد تم التعديل بنجاح");
        } else {
            return redirect()->route('add_teacher_salaries')->with("error", " حدث خطأ في تعديل البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function delete_salary_teacher(Salary $id)
    {
        if ($id->delete()) {

            return redirect()->back()->with("success", "لقد تم حذف بيانات الراتب بنجاح");
        } else {
            return redirect()->back()->with("error", " حدث خطأ في حذف البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }









    public function finance_management()
    {
        $all_finance = Finance::Latest()->get();
        return view('pages.finance.finance_manage', compact('all_finance'));
    }



    public function save_finance_record(Request $request)
    {
        $request->validate(
            [
                'month' => 'required',
                'year' => 'required',
                'income' => 'required|numeric',
                'expense' => 'required|numeric',

            ],
            ['required' => 'هذا الحقل مطلوب', 'numeric' => 'الحقول يجب تعبئتها بارقام فقط']
        );

        $finance = Finance::create([
            'month' => $request->month,
            'year' => $request->year,
            'income' => $request->income,
            'expense' => $request->expense,
        ]);

        if ($finance) {
            return redirect()->route('finance_management')->with("success", "لقد تم الإضافة بنجاح");
        } else {
            return redirect()->back('finance_management')->with("error", " حدث خطأ في ادخال البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function edit_finance(Finance $id)
    {
        return view('pages.finance.edit_finance', compact('id'));
    }
    public function update_finance(Request $request, $id)
    {
        $request->validate(
            [
                'month' => 'required',
                'year' => 'required',
                'income' => 'required|numeric',
                'expense' => 'required|numeric',

            ],
            ['required' => 'هذا الحقل مطلوب', 'numeric' => 'الحقول يجب تعبئتها بارقام فقط']
        );
        $update = Finance::where('id', $id)->update([

            'month' => $request->month,
            'year' => $request->year,
            'income' => $request->income,
            'expense' => $request->expense,


        ]);
        if ($update) {
            return redirect()->route('finance_management')->with("success", "لقد تم تعديل البيانات المالية بنجاح");
        } else {
            return redirect()->back('finance_management')->with("error", " حدث خطأ في تعديل البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
    public function delete_employee(User $id)
    {

        if ($id->delete()) {
            return redirect()->route('view_employees')->with("success", "لقد تم حذف الموظف المالي بنجاح");
        } else {
            return redirect()->route('view_employees')->with("error", " حدث خطأ في حذف البيانات  من فضلك أعد المحاولة مرة أخرى");
        }
    }
}