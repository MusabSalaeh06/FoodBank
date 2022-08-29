<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\member;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
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

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }
     
    protected function validator(array $data)
    {
        $validatorEmail = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
        ]);
        if ($validatorEmail->fails()) {
            redirect()->back()->with('error',"อีเมลที่ป้อนเข้ามา มีผู้ใช้เเล้ว กรุณากรอกอีเมลใหม่");
        }
        $validatorPass = Validator::make($data, [
            'password' => ['required','min:8','same:password_confirmation'],
        ]);
        if ($validatorPass->fails()) {
            redirect()->back()->with('error',"รหัสผ่านที่ยืนยันไม่ตรงกัน กรุณากรอกรหัสผ่านใหม่");
        }
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password' => ['required','min:8','same:password_confirmation'],
        ]);
        
    }
    public function create(array $data)
    {
       $post = new member;
       $post->email = $data['email'];
       $post->password = Hash::make($data['password']);
       $post->pass = $data['password'];
       $post->name = $data['name'];
       $post->surname = $data['surname'];
       $post->tel = $data['tel'];
       $post->type = $data['type'];
       $post->county = $data['county'];
       $post->road = $data['road'];
       $post->alley = $data['alley'];
       $post->house_number = $data['house_number'];
       $post->group_no = $data['group_no'];
       $post->sub_district = $data['sub_district'];
       $post->district = $data['district'];
       $post->province = $data['province'];
       $post->ZIP_code = $data['ZIP_code'];
       $post->save();
       return $post;
    }

}
