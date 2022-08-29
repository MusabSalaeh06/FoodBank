<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BasketResource;
use App\Models\Basket;
use App\Models\Donate;
use App\Models\member;
use App\Models\Product;
use App\Models\Product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function report_sender()
    {
        $new_mission = Donate::where('sender',"5")->where('status', "รอการตอบรับ")->get()->count();
        $mission_cancle = Donate::where('sender', "5")->where('status', "ยกเลิกภารกิจ")->get()->count();
        $mission_submit = Donate::where('sender',"5")->where('status', "ตอบรับ")->get()->count();
        $mission_reject = Donate::where('sender',"5")->where('status', "ปฏิเสธ")->get()->count();
        $mission_complete = Donate::where('sender',"5")->where('status', "ส่งสำเร็จ")->get()->count();
        $mission_fail = Donate::where('sender',"5")->where('status',"ส่งคืนสินค้า")->get()->count();
        $mission_all = Donate::where('sender',"5")->get()->count();
       
               return response()->json(
            [
                'new_mission' => $new_mission,
                'mission_cancle' => $mission_cancle,
                'mission_submit' => $mission_submit,
                'mission_reject' => $mission_reject,
                'mission_complete' => $mission_complete,
                'mission_fail' => $mission_fail,
                'mission_all' => $mission_all,
            ], 200);
    }
    public function mission_update(Request $request, $id)
    {
        $customMessage = [
            "status.required" =>  "กรุณาส่งค่า status",
            "status.in" =>  "กรุณาส่งค่า status เป็น ตอบรับ,ปฏิเสธ,ส่งคืนสินค้า"
        ];

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:ตอบรับ,ปฏิเสธ,ส่งคืนสินค้า',
        ],$customMessage);
        
        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => $errors->first()
                ],400
                );
        }

        $post = Donate::find($id);
        
        if (empty($post)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล id : {$id} นี้ "
                ],200
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
                } 
            }
        }
        
        return response()->json(
            [
                'status' => true,
                'data' => [],
                'message' => "บันทึกข้อมูลสำเร็จจ้า"
            ],200
            );
        
    }
     public function mission_detail($id)
    {
        $mission = Donate::find($id);
        if (empty($mission)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล id : {$id} นี้ "
                ],200
                );
        } 
        return response()->json(
            [
                 'id' => (int)$mission->id,
                 'reciever' => $mission->recievers->name." ".$mission->recievers->surname,
                 'sender' => $mission->senders->name." ".$mission->senders->surname,
                 'admin' => $mission->admins->name." ".$mission->admins->surname
            ], 200);
       
    }
  public function mission_basket_detail($id)
     {
         $basket = basket::where('donate_id',$id)->get();
          return response()->json(
             [
               'basket' =>  BasketResource::collection($basket)
           ], 200);
     }

    public function giver_show()
    {
        $giver = Member::where('type','giver')->get();

        return response()->json(
            [
                'status' => 'success',
                'giver' => $giver,
            ], 200);

        // return view('Giver',compact(['giver']));
    }
    
    public function reciever_show()
    {
        $reciever = Member::where('type','reciever')->get();

        return response()->json(
            [
                'status' => 'success',
                'giver' => $reciever,
            ], 200);

        // return view('Reciever',compact(['reciever']));
    }
    public function sender_show()
    {
        $sender = Member::where('type','sender')->get();

        return response()->json(
            [
                'status' => 'success',
                'giver' => $sender,
            ], 200);


        // return view('Sender',compact(['sender']));
    }

    public function store(Request $request)
    {
    $validatorEmail = Validator::make($request->all(),[
        'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
    ]);
    if ($validatorEmail->fails()) {

        return response()->json(
        [
            'error' => 'อีเมลที่ป้อนเข้ามา มีผู้ใช้เเล้ว กรุณากรอกอีเมลใหม่',
        ], 200);

        // redirect()->back()->with('error',"อีเมลที่ป้อนเข้ามา มีผู้ใช้เเล้ว กรุณากรอกอีเมลใหม่");
    }
    $validatorPass = Validator::make($request->all(),[
        'password' => ['required','min:8','same:password_confirmation'],
    ]);
    if ($validatorPass->fails()) {

        return response()->json(
            [
                'error' => 'รหัสผ่านที่ยืนยันไม่ตรงกัน กรุณากรอกรหัสผ่านใหม่',
            ], 200);

        // redirect()->back()->with('error',"รหัสผ่านที่ยืนยันไม่ตรงกัน กรุณากรอกรหัสผ่านใหม่");
    }
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
        'password' => ['required','min:8','same:password_confirmation'],
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

       return response()->json(
        [
            'store' => 'บันทึกข้อมูลสมาชิกเรียบร้อยเเล้ว',
        ], 200);

    //    return redirect()->back()->with('store','บันทึกข้อมูลสมาชิกเรียบร้อยเเล้ว');
    }

    public function update(Request $request, $member_id)
    {
        $member = Member::find($member_id);
        $member->email = '';
        $member->save();

        $validatorEmail = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
        ]);
        if ($validatorEmail->fails()) {
    
            return response()->json(
            [
                'error' => 'อีเมลที่ป้อนเข้ามา มีผู้ใช้เเล้ว กรุณากรอกอีเมลใหม่',
            ], 200);
    
            // redirect()->back()->with('error',"อีเมลที่ป้อนเข้ามา มีผู้ใช้เเล้ว กรุณากรอกอีเมลใหม่");
        }
        $validatorPass = Validator::make($request->all(),[
            'password' => ['required','min:8','same:password_confirmation'],
        ]);
        if ($validatorPass->fails()) {
    
            return response()->json(
                [
                    'error' => 'รหัสผ่านที่ยืนยันไม่ตรงกัน กรุณากรอกรหัสผ่านใหม่',
                ], 200);
    
            // redirect()->back()->with('error',"รหัสผ่านที่ยืนยันไม่ตรงกัน กรุณากรอกรหัสผ่านใหม่");
        }
        $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
                'password' => ['required','min:8','same:password_confirmation'],
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

           return response()->json(
            [
                'update' => 'อัพเดทข้อมูลสมาชิกเรียบร้อยเเล้ว',
            ], 200);

        //    return redirect()->back()->with('update','อัพเดทข้อมูลสมาชิกเรียบร้อยเเล้ว');
        
        }

    public function delete($member_id)
    {
        member::find($member_id)->delete();

        return response()->json(
            [
                'delete' => 'ลบสมาชิกออกจากระบบเรียบร้อย',
            ], 200);

        // return redirect()->back()->with('delete','ลบสมาชิกออกจากระบบเรียบร้อย');

    }
}
