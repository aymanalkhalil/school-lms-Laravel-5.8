<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Course;
use App\Student;
use App\UserCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('RegisterTimeMiddleware');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, $this->rules(), $this->messages());
    }

    protected function create(array $data)
    {

        if ($data['course'] == 'course') {

            $user = new User([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'National_ID' => $data['national_id'],
                'phone' => $data['phone'],
                'years' => $data['qualification'],
                'date' => $data['dob'],
                'note' => $data['note'],
                'role' => 1,
            ]);
            if ($user->save()) {
                $id = $user->id;
                Student::create([
                    'city' => $data['city'],
                    'name_arabda' => $data['name_arabda'],
                    'phone_arabda' => $data['phone_arabda'],
                    'arabda' => $data['arabda'],
                    'user_id' => $id,
                    'sana' => 0,
                    'sana_drasia' => 'لم تسجل في دبلوم او برنامج',
                    'rakam_akdemi' => date("Ym") . rand(0, 15000),
                ]);
                $image = $this->saveImage($data['bill'], 'images/bills');
                UserCourse::create([
                    'course_id' => $data['courses'],
                    'user_id' => $id,
                    'bill' => $image,
                ]);
                return redirect()->back()->with("success", "لقد تم تسجيل حسابك بنجاح");
            } else {
                return redirect()->back()->with("error", " حدث خطأ في التسجيل من فضلك أعد المحاولة مرة أخرى");
            }
        } else {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'National_ID' => $data['national_id'],
                'phone' => $data['phone'],
                'years' => $data['qualification'],
                'date' => $data['dob'],
                'note' => $data['note'],
                'role' => 1,
            ]);
            if ($user->save()) {
                $id = $user->id;
                $student = Student::create([
                    'city' => $data['city'],
                    'name_arabda' => $data['name_arabda'],
                    'phone_arabda' => $data['phone_arabda'],
                    'arabda' => $data['arabda'],
                    'user_id' => $id,
                    'sana' => 0,
                    'sana_drasia' => $data['sana_drsia'],
                    'rakam_akdemi' => date("Ym") . rand(0, 15000),
                ]);
                return redirect()->back()->with("success", "لقد تم تسجيل حسابك بنجاح");
            } else {
                return redirect()->back()->with("error", " حدث خطأ في التسجيل من فضلك أعد المحاولة مرة أخرى");
            }
        }
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    protected function rules()
    {
        return [
            'name' => 'required|arabic',
            'email' => 'required|unique:users',
            'national_id' => 'required|numeric|min:10',
            'city' => 'required|arabic',
            'phone' => 'required|numeric|min:10',
            'course' => 'required',
            'sana_drsia' => 'required_without:courses',
            'courses' => 'required_without:sana_drsia',
            'qualification' => 'required',
            'dob' => 'required',
            'note' => 'required|arabic',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'name_arabda' => 'required|arabic',
            'phone_arabda' => 'required|numeric|min:10',
            'arabda' => 'required',
            'bill' => 'required_without:sana_drsia|mimes:jpeg,png,jpg',
        ];
    }

    protected function messages()
    {
        return [

            'required' => 'هذا الحقل مطلوب',
            'unique' => 'البريد الالكتروني مسجل لدينا',
            'numeric' => 'يرجى تعبئة الحقل بارقام فقط',
            'arabic' => 'يرجى تعبئة البيانات باللغة العربية',
            'confirmed' => 'كلمة المرور غير متطابقة',
            'password.min' => 'كلمة السر يجب ان تتكون من 6 ارقام على الأقل',
            'national_id.min' => 'رقم الهوية الوطنية يجب ان يتكون على الاقل من 10 ارقام',
            'phone.min' => 'الرقم يجب ان يتكون من 10 ارقام',
            'phone_arabda.min' => 'الرقم يجب ان يتكون من 10 ارقام',
        ];
    }

    protected function saveImage($image, $folder)
    {
        $file_extenstion = $image->getClientOriginalExtension();
        $filename =  time() . "."  . $file_extenstion;
        $path = $folder;
        $image->move($path, $filename);
        return $filename;
    }
}