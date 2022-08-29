<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Donate;
use App\Models\Member;
use App\Models\Product;
use App\Models\Product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function Dashboard()
    {
        $giver = Member::where('type', 'giver')->get()->count();
        $reciever = Member::where('type', 'reciever')->get()->count();
        $sender = Member::where('type', 'sender')->get()->count();
        //$product = product::where('status', null)->get()->count();
        $product = product::get()->count();
        $product_type = Product_type::get()->count();
        $donate = Donate::get()->count();
        $mission = Donate::where('sender', Auth::user()->member_id)->where('status', "รอการตอบรับ")->get()->count();
        $mission_complete = Donate::where('sender', Auth::user()->member_id)->where('status', "ส่งสำเร็จ")->get()->count();
        $mission_fail = Donate::where('sender', Auth::user()->member_id)->where('status', "หมดเวลา")->get()->count();
        $mission_cancle = Donate::where('sender', Auth::user()->member_id)->where('status', "ปฏิเสธ")->get()->count();
        $my_donate = Product::where('giver', Auth::user()->member_id)->get()->where('admin', null)->count();
        return view('Dashboard', compact(['giver', 'reciever', 'sender', 'product', 'product_type', 'donate',
         'mission', 'mission_complete', 'mission_fail', 'mission_cancle', 'my_donate']));
    }

    public function my_donate()
    {
        $type = Product_type::all();
        $giver = member::where('type', 'giver')->get();
        $my_donate = Product::where('giver', Auth::user()->member_id)->where('admin', null)->where('status', null)->get();
        return view('My_Donate', compact(['type', 'giver', 'my_donate']));
    }

    public function my_mission()
    {
        $mission = Donate::where('sender', Auth::user()->member_id)->get();
        return view('My_Mission', compact(['mission']));
    }

    public function mission_detail($id)
    {
        $basket = Basket::where('donate_id',$id)->get();
        $mission = Donate::find($id);
        return view('Mission_Detail', compact(['basket','mission']));
    }

    public function mission_update(Request $request, $id)
    {

        $request->validate([
            //
        ]);

        $post = Donate::find($id);
        $post->status = $request->input('status');
        if ($request->file('image')) {
            $file = $request->file('image');
            $ldate = date('YmdHis');
            $filename = $request->input('status') . '_' . $ldate . '.' . $file->getClientOriginalExtension();
            $request->image->move('storage/donate/donate_image_assets', $filename);
            $post->image = $filename;
        }
        $post->save();
        
        Basket::where('donate_id', $id)->update(array('status' => $request->input('status')));
        if ($request->input('status') == "ส่งสำเร็จ") {
        }
        elseif($request->input('status') == "ส่งคืนสินค้า") {
            $basket = Basket::where('donate_id', $id)->get();
            foreach ($basket as $data) {
                $product = product::find($data->product_id);
                $product->quantity = $product->quantity + $data->quantity;
                $product->save();
                $product = product::find($data->product_id);
                if ($product->quantity != 0) {
                    $product->status = null;
                    $product->save();
                } else {
                }
            }
        } 
        elseif($request->input('status') == "ปฏิเสธ") {
            $basket = Basket::where('donate_id', $id)->get();
            foreach ($basket as $data) {
                $product = product::find($data->product_id);
                $product->quantity = $product->quantity + $data->quantity;
                $product->save();
                $product = product::find($data->product_id);
                if ($product->quantity != 0) {
                    $product->status = null;
                    $product->save();
                } else {
                }
            }
        }else {
        }

        return redirect()->back()->with('update', 'อัพเดทสถานะเรียบร้อยเเล้ว');
    }

    public function sender_update(Request $request, $member_id)
    {

        $request->validate([
            //
        ]);

        $post = member::find($member_id);
        $post->status = $request->input('status');
        $post->save();

        return redirect()->back()->with('update', 'อัพเดทสถานะเรียบร้อยเเล้ว');
    }

    public function giver_show()
    {
        $giver = Member::where('type', 'giver')->orderByRaw('member_id DESC')->get();
        return view('Giver', compact(['giver']));
    }
    public function reciever_show()
    {
        $reciever = Member::where('type', 'reciever')->orderByRaw('member_id DESC')->get();
        return view('Reciever', compact(['reciever']));
    }
    public function sender_show()
    {
        $sender = Member::where('type', 'sender')->orderByRaw('member_id DESC')->get();
        return view('Sender', compact(['sender']));
    }

    public function store(Request $request)
    {
        $validatorEmail = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
        ]);
        if ($validatorEmail->fails()) {
            redirect()->back()->with('error', "อีเมลที่ป้อนเข้ามา มีผู้ใช้เเล้ว กรุณากรอกอีเมลใหม่");
        }
        $validatorPass = Validator::make($request->all(), [
            'password' => ['required', 'min:8', 'same:password_confirmation'],
        ]);
        if ($validatorPass->fails()) {
            redirect()->back()->with('error', "รหัสผ่านที่ยืนยันไม่ตรงกัน กรุณากรอกรหัสผ่านใหม่");
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password' => ['required', 'min:8', 'same:password_confirmation'],
        ]);

        $post = new member;
        $post->email = $request->input('email');
        $post->password = Hash::make($request->input('password'));
        $post->pass = $request->input('password');
        $post->name = $request->input('name');
        $post->surname = $request->input('surname');
        $post->tel = $request->input('tel');
        $post->type = $request->input('type');
        $post->county = $request->input('county');
        $post->road = $request->input('road');
        $post->alley = $request->input('alley');
        $post->house_number = $request->input('house_number');
        $post->group_no = $request->input('group_no');
        $post->sub_district = $request->input('sub_district');
        $post->district = $request->input('district');
        $post->province = $request->input('province');
        $post->ZIP_code = $request->input('ZIP_code');
        $post->status = $request->input('status');
        $post->save();
        return redirect()->back()->with('store', 'บันทึกข้อมูลสมาชิกเรียบร้อยเเล้ว');
    }

    public function update(Request $request, $member_id)
    {
        $member = Member::find($member_id);
        $member->email = '';
        $member->save();

        $validatorEmail = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
        ]);
        if ($validatorEmail->fails()) {
            redirect()->back()->with('error', "อีเมลที่ป้อนเข้ามา มีผู้ใช้เเล้ว กรุณากรอกอีเมลใหม่");
        }
        $validatorPass = Validator::make($request->all(), [
            'password' => ['required', 'min:8', 'same:password_confirmation'],
        ]);
        if ($validatorPass->fails()) {
            redirect()->back()->with('error', "รหัสผ่านที่ยืนยันไม่ตรงกัน กรุณากรอกรหัสผ่านใหม่");
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password' => ['required', 'min:8', 'same:password_confirmation'],
        ]);

        $post = member::find($member_id);
        $post->email = $request->input('email');
        $post->password = Hash::make($request->input('password'));
        $post->pass = $request->input('password');
        $post->name = $request->input('name');
        $post->surname = $request->input('surname');
        $post->tel = $request->input('tel');
        $post->type = $request->input('type');
        $post->county = $request->input('county');
        $post->road = $request->input('road');
        $post->alley = $request->input('alley');
        $post->house_number = $request->input('house_number');
        $post->group_no = $request->input('group_no');
        $post->sub_district = $request->input('sub_district');
        $post->district = $request->input('district');
        $post->province = $request->input('province');
        $post->ZIP_code = $request->input('ZIP_code');
        $post->status = $request->input('status');
        $post->save();
        return redirect()->back()->with('update', 'อัพเดทข้อมูลสมาชิกเรียบร้อยเเล้ว');
    }

    public function delete($member_id)
    {
        member::find($member_id)->delete();
        return redirect()->back()->with('delete', 'ลบสมาชิกออกจากระบบเรียบร้อย');
    }
}
