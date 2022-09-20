<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Donate;
use App\Models\member;
use App\Models\Product;
use App\Models\Product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class memberController extends Controller
{
    public function index()
    {
        $giver = member::where('type', 'giver')->get()->count();
        $reciever = member::where('type', 'reciever')->get()->count();
        $sender = member::where('type', 'sender')->get()->count();
        $product = product::get()->count();
        $product_type = Product_type::get()->count();
        $donate = Donate::get()->count();
        return view('auth.index', compact(['giver', 'reciever', 'sender', 'product', 'product_type', 'donate',]));
    }
    public function my_profile()
    {
        $profile = member::find(Auth::user()->member_id);
        return view('profile', compact('profile'));
    }
    public function Dashboard()
    {
        $giver = member::where('type', 'giver')->get()->count();
        $reciever = member::where('type', 'reciever')->get()->count();
        $sender = member::where('type', 'sender')->get()->count();
        //$product = product::where('status', null)->get()->count();
        $product = product::get()->count();
        $product_type = Product_type::get()->count();
        $donate = Donate::get()->count();
        $mission = Donate::where('sender', Auth::user()->member_id)->where('status', "รอการตอบรับ")->get()->count();
        $mission_cancle = Donate::where('sender', Auth::user()->member_id)->where('status', "ยกเลิกภารกิจ")->get()->count();
        $mission_submit = Donate::where('sender', Auth::user()->member_id)->where('status', "ตอบรับ")->get()->count();
        $mission_reject = Donate::where('sender', Auth::user()->member_id)->where('status', "ปฏิเสธ")->get()->count();
        $mission_complete = Donate::where('sender', Auth::user()->member_id)->where('status', "ส่งสำเร็จ")->get()->count();
        $mission_fail = Donate::where('sender', Auth::user()->member_id)->where('status', "ส่งคืนสินค้า")->get()->count();
        $my_donate = Product::where('giver', Auth::user()->member_id)->get()->count();
        return view('Dashboard', compact(['giver', 'reciever', 'sender', 'product', 'product_type', 'donate',
            'mission', 'mission_complete', 'mission_fail', 'mission_cancle', 'mission_reject', 'mission_submit', 'my_donate']));
    }
    public function giver_show()
    {
        $giver = member::where('type', 'giver')->orderByRaw('member_id DESC')->get();
        $co_giver = member::where('type', 'giver')->orderByRaw('member_id DESC')->get()->count();
        return view('Giver', compact(['giver','co_giver']));
    }
    public function reciever_show()
    {
        $reciever = member::where('type', 'reciever')->orderByRaw('member_id DESC')->get();
        $co_reciever = member::where('type', 'reciever')->orderByRaw('member_id DESC')->get()->count();
        return view('Reciever', compact(['reciever','co_reciever']));
    }
    public function sender_show()
    {
        $sender = member::where('type', 'sender')->orderByRaw('member_id DESC')->get();
        $co_sender = member::where('type', 'sender')->orderByRaw('member_id DESC')->get()->count();
        return view('Sender', compact(['sender','co_sender']));
    }
    public function my_donate()
    {
        $prod_amount = Product::where('giver',Auth::user()->member_id)->count();
        $prod_quantity = Product::where('giver',Auth::user()->member_id)->where('status',null)->count();
        $prod_ant = Product::where('giver',Auth::user()->member_id)->where('status','hidden')->count();
        $prod_cancle = Product::where('giver',Auth::user()->member_id)->where('status','ยกเลิกบริจาค')->count();
        //dd($prod_cancle);
        $type = Product_type::all();
        $co_type = Product_type::get()->count();
        $my_donate = Product::orderByRaw('product_id DESC')->where('giver', Auth::user()->member_id)->paginate(5);
        $co_my_donate = Product::where('giver', Auth::user()->member_id)->get()->count();
        return view('My_Donate', compact(['type','my_donate','co_type','co_my_donate','prod_amount','prod_quantity'
                    ,'prod_ant','prod_cancle']));
    }
    public function my_mission()
    {
        $mission = Donate::where('sender', Auth::user()->member_id)->where('status', "รอการตอบรับ")->get()->count();
        $mission_cancle = Donate::where('sender', Auth::user()->member_id)->where('status', "ยกเลิกภารกิจ")->get()->count();
        $mission_submit = Donate::where('sender', Auth::user()->member_id)->where('status', "ตอบรับ")->get()->count();
        $mission_reject = Donate::where('sender', Auth::user()->member_id)->where('status', "ปฏิเสธ")->get()->count();
        $mission_complete = Donate::where('sender', Auth::user()->member_id)->where('status', "ส่งสำเร็จ")->get()->count();
        $mission_fail = Donate::where('sender', Auth::user()->member_id)->where('status', "ส่งคืนสินค้า")->get()->count();
        $my_mission = Donate::orderByRaw('id DESC')->where('sender', Auth::user()->member_id)->paginate(5);
		$co_my_mission = Donate::where('sender', Auth::user()->member_id)->get()->count();
        return view('My_Mission', compact(['mission', 'mission_complete', 'mission_fail', 'mission_cancle', 'mission_reject', 'mission_submit','my_mission','co_my_mission']));
    }
    public function mission_detail($id)
    {
        $basket = Basket::where('donate_id', $id)->get();
        $mission = Donate::find($id);
        return view('Mission_Detail', compact(['basket', 'mission']));
    }
    public function store(Request $request)
    {
        $customMessage = [
            "name.required" => "กรุณาส่งค่า name(ชื่อ) มาด้วยน่ะครับ",
            "surname.required" => "กรุณาส่งค่า surname(นามสกุล) มาด้วยน่ะครับ",
            "card_id.required" => "กรุณาส่งค่า card_id(บัจรประจำตัวประชาชน) มาด้วยน่ะครับ",
            "card_id.max" => "เลขบัตรประจำตัวประชาชนมากกว่า 13 หลัก",
            "card_id.min" => "เลขบัตรประจำตัวประชาชนน้อยกว่า 13 หลัก",
            "tel.required" => "กรุณาส่งค่า tel(เบอร์โทรศัพท์) มาด้วยน่ะครับ",
            "tel.max" => "เบอร์โทรศัพท์มากกว่า 10 หลัก",
            "tel.min" => "เบอร์โทรศัพท์น้อยกว่า 10 หลัก",
            "tel.unique" => "กรุณาส่งค่า tel(เบอร์โทรศัพท์)ใหม่ เนื่องจากมีผู้ใช้เบอร์โทรศัพท์นี้เเล้ว",
            "type.required" => "กรุณาส่งค่า type(ประเภทสินค้า) มาด้วยน่ะครับ",
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'card_id' => 'required|max:13|min:13',
            'tel' => 'required|unique:members|max:10|min:10',
            'type' => 'required',
        ], $customMessage);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect()->back()->with(
                [
                    'status' => false,
                    'data' => [],
                    'error' => $errors->first(),
                ], 400
            );
        }

        $post = new member;
        $post->name = $request->input('name');
        $post->surname = $request->input('surname');
        $post->card_id = $request->input('card_id');
        $post->tel = $request->input('tel');
        $post->email = $request->input('email');
        $post->password = Hash::make($request->input('card_id'));
        $post->pass = $request->input('card_id');
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
            $member = member::find($member_id);
            if ($member->tel == $request->input('tel')) {
                $member->tel = '';
                $member->save();
            }

            $customMessage = [
                "name.required" => "กรุณาส่งค่า name(ชื่อ) มาด้วยน่ะครับ",
                "surname.required" => "กรุณาส่งค่า surname(นามสกุล) มาด้วยน่ะครับ",
                "card_id.required" => "กรุณาส่งค่า card_id(บัจรประจำตัวประชาชน) มาด้วยน่ะครับ",
                "card_id.max" => "เลขบัตรประจำตัวประชาชนมากกว่า 13 หลัก",
                "card_id.min" => "เลขบัตรประจำตัวประชาชนน้อยกว่า 13 หลัก",
                "tel.required" => "กรุณาส่งค่า tel(เบอร์โทรศัพท์) มาด้วยน่ะครับ",
                "tel.max" => "เบอร์โทรศัพท์มากกว่า 10 หลัก",
                "tel.min" => "เบอร์โทรศัพท์น้อยกว่า 10 หลัก",
                "tel.unique" => "กรุณาส่งค่า tel(เบอร์โทรศัพท์)ใหม่ เนื่องจากมีผู้ใช้เบอร์โทรศัพท์นี้เเล้ว",
                "type.required" => "กรุณาส่งค่า type(ประเภทสินค้า) มาด้วยน่ะครับ",
            ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'card_id' => 'required|max:13|min:13',
            'tel' => 'required|unique:members|max:10|min:10',
            'type' => 'required',
            'password' => 'required|same:password_confirmation',
        ], $customMessage);

        if ($validator->fails()) {
            $member = member::find($member_id);
            if ($member->tel == '') {
                $member->tel = $request->input('tel');
                $member->save();
            }

            $errors = $validator->errors();

            return redirect()->back()->with(
                [
                    'status' => false,
                    'data' => [],
                    'error' => $errors->first(),
                ], 400
            );
        }

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
    public function update_password(Request $request, $member_id)
    {
        $customMessage = [
            "password.required" => "กรุณาป้อนรหัสผ่านเก่าด้วยน่ะครับ",
            "new_password.required" => "กรุณาป้อนรหัสผ่านใหม่ด้วยน่ะครับ",
            "new_password.same" => "การยืนยันรหัสผ่านไม่ถูกต้อง",
        ];

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required|same:password_confirmation',
        ], $customMessage);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect()->back()->with(
                [
                    'status' => false,
                    'data' => [],
                    'error' => $errors->first(),
                ], 400
            );
        }
        $member = member::find($member_id);
        if (empty($member)) {
            return redirect()->back()->with(
                [
                    'status' => false,
                    'data' => [],
                    'error' => "ไม่พบข้อมูล member_id : {$member_id} นี้ ",
                ], 200
            );
        }
        if ($member->pass != $request->password) {
            return redirect()->back()->with(
                [
                    'status' => false,
                    'data' => [],
                    'error' => "รหัสผ่านเก่าไม่ถูกต้อง กรุณาป้อนรหัสผ่านใหม่",
                ], 200
            );
        }
        $member->pass = $request->new_password;
        $member->password = Hash::make($request->new_password);
        $member->save();

        return redirect()->back()->with(
            [
                'status' => true,
                'data' => [],
                'update' => "เปลี่ยนรหัสผ่านสำเร็จ",
            ], 200
        );
    }
    public function update_profile(Request $request, $member_id)
    {
        $customMessage = [
            "profile.required" => "กรุณาส่งส่งรูปโปรไฟล์มาด้วยน่ะครับ",
        ];

        $validator = Validator::make($request->all(), [
            'profile' => 'required',
        ], $customMessage);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect()->back()->with(
                [
                    'status' => false,
                    'data' => [],
                    'error' => $errors->first(),
                ], 400
            );
        }

        $member = member::find($member_id);
        if (empty($member)) {
            return redirect()->back()->with(
                [
                    'status' => false,
                    'data' => [],
                    'error' => "ไม่พบข้อมูล member_id : {$member_id} นี้ ",
                ], 200
            );
        }
        if ($request->file('profile')) {
            $file = $request->file('profile');
            $ldate = date('YmdHis');
            $filename = $ldate . '.' . $file->getClientOriginalExtension();
            $request->profile->move('storage/member/profile_image_assets', $filename);
            $member->profile = $filename;
        }
        $member->save();

        return redirect()->back()->with(
            [
                'status' => true,
                'data' => [],
                'update' => "เปลี่ยนรูปโปรไฟล์สำเร็จ",
            ], 200
        );
    }
    public function delete($member_id)
    {
        member::find($member_id)->delete();
        return redirect()->back()->with('delete', 'ลบสมาชิกออกจากระบบเรียบร้อย');
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
    public function mission_update(Request $request, $id)
    {
        if ($request->status == "ส่งสำเร็จ") {
            $customMessage = [
                "image.required" => "กรุณาแนบรูปภาพมาด้วยน่ะครับ",
                "status.required" => "กรุณาส่งค่า status",
                "status.in" => "กรุณาส่งค่า status เป็น ตอบรับ,ปฏิเสธ,ส่งคืนสินค้า,ส่งสำเร็จ",
            ];

            $validator = Validator::make($request->all(), [
                'status' => 'required|in:ตอบรับ,ปฏิเสธ,ส่งคืนสินค้า,ส่งสำเร็จ',
                'image' => 'required',
            ], $customMessage);
        } else {
            $customMessage = [
                "status.required" => "กรุณาส่งค่า status",
                "status.in" => "กรุณาส่งค่า status เป็น ตอบรับ,ปฏิเสธ,ส่งคืนสินค้า,ส่งสำเร็จ",
            ];

            $validator = Validator::make($request->all(), [
                'status' => 'required|in:ตอบรับ,ปฏิเสธ,ส่งคืนสินค้า,ส่งสำเร็จ',
            ], $customMessage);
        }

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect()->back()->with(
                [
                    'update' => $errors->first(),
                ], 400
            );

        }

        $post = Donate::find($id);

        if (empty($post)) {
            return redirect()->back()->with(
                [
                    'update' => "ไม่พบข้อมูล id : {$id} นี้ ",
                ], 400
            );
        }

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
        } elseif ($request->input('status') == "ส่งคืนสินค้า") {
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
        } elseif ($request->input('status') == "ปฏิเสธ") {
            $basket = Basket::where('donate_id', $id)->get();
            foreach ($basket as $data) {
                $product = product::find($data->product_id);
                $product->quantity = $product->quantity + $data->quantity;
                $product->save();
                $product = product::find($data->product_id);
                if ($product->quantity != 0) {
                    $product->status = null;
                    $product->save();
                }
            }
        }

        return redirect()->back()->with(
            [
                'update' => "อัพเดท status สำเร็จ",
            ], 400
        );

    }
}
