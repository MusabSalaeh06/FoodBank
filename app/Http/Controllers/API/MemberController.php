<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BasketResource;
use App\Http\Resources\DonateResource;
use App\Http\Resources\MissionDetailResource;
use App\Http\Resources\ProfileResource;
use App\Models\Basket;
use App\Models\Donate;
use App\Models\member;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function profile()
    {
        $profile = member::find('1');
        return response()->json(
            [
                'status' => true,
                'data' => ProfileResource::make($profile),
                'message' => 'ข้อมูลโปรไฟล์',
            ], 200
        );
    }

    public function mission_report()
    {
        $new_mission = Donate::where('sender', "6")->where('status', "รอการตอบรับ")->get()->count();
        $mission_cancle = Donate::where('sender', "6")->where('status', "ยกเลิกภารกิจ")->get()->count();
        $mission_submit = Donate::where('sender', "6")->where('status', "ตอบรับ")->get()->count();
        $mission_reject = Donate::where('sender', "6")->where('status', "ปฏิเสธ")->get()->count();
        $mission_complete = Donate::where('sender', "6")->where('status', "ส่งสำเร็จ")->get()->count();
        $mission_fail = Donate::where('sender', "6")->where('status', "ส่งคืนสินค้า")->get()->count();
        $mission_all = Donate::where('sender', "6")->get()->count();

        return response()->json(
            [
                'status' => true,
                'data' => [
                    'mission_all' =>  $mission_all,
                    'mission_cancle' =>  $mission_cancle,
                    'new_mission' =>  $new_mission,
                    'mission_submit' =>  $mission_submit,
                    'mission_complete' =>  $mission_complete,
                    'mission_fail' =>  $mission_fail,
                    'mission_reject' =>  $mission_reject,
                ],
                'message' => "รายงานข้อมูลภารกิจ (mission_report)",
            ], 200);
    }
    public function mission_all()
    {
        $mission_all = Donate::where('sender', "6")->get();
        return response()->json(
            [
                'status' => true,
                'data' => DonateResource::collection($mission_all),
                'message' => "ภารกิจทั้งหมด (mission_all)",
            ], 200);
    }
    public function new_mission()
    {
        $new_mission = Donate::where('sender', "6")->where('status', "รอการตอบรับ")->get();
        return response()->json(
            [
                'status' => true,
                'data' => DonateResource::collection($new_mission),
                'message' => "ภารกิจใหม่ (new_mission)",
            ], 200);
    }
    public function mission_cancle()
    {
        $mission_cancle = Donate::where('sender', "6")->where('status', "ยกเลิกภารกิจ")->get();
        return response()->json(
            [
                'status' => true,
                'data' => DonateResource::collection($mission_cancle),
                'message' => "ภารกิจที่ถูกยกเลิก (mission_cancle)",
            ], 200);
    }
    public function mission_submit()
    {
        $mission_submit = Donate::where('sender', "6")->where('status', "ตอบรับ")->get();
        return response()->json(
            [
                'status' => true,
                'data' => DonateResource::collection($mission_submit),
                'message' => "ภารกิจที่ตอบรับเเล้วเเละกำลังทำ (mission_submit)",
            ], 200);
    }
    public function mission_reject()
    {
        $mission_reject = Donate::where('sender', "6")->where('status', "ปฏิเสธ")->get();
        return response()->json(
            [
                'status' => true,
                'data' => DonateResource::collection($mission_reject),
                'message' => "ภารกิจที่ปฏิเสธ (mission_reject)",
            ], 200);
    }
    public function mission_fail()
    {
        $mission_fail = Donate::where('sender', "6")->where('status', "ส่งคืนสินค้า")->get();
        return response()->json(
            [
                'status' => true,
                'data' => DonateResource::collection($mission_fail),
                'message' => "ภารกิจที่ล้มเหลวหรือส่งคืนสินค้า (mission_fail)",
            ], 200);
    }
    public function mission_complete()
    {
        $mission_complete = Donate::where('sender', "6")->where('status', "ส่งสำเร็จ")->get();
        return response()->json(
            [
                'status' => true,
                'data' => DonateResource::collection($mission_complete),
                'message' => "ภารกิจที่ส่งสำเร็จ (mission_complete)",
            ], 200);
    }
    public function mission_detail($id)
    {
        $mission = Donate::find($id);
        if (empty($mission)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล id : {$id} นี้ ",
                ], 200
            );
        }
            return response()->json(
                [
                    'status' => true,
                    'data' => MissionDetailResource::make($mission),
                    'message' => "ข้อมูลรายละเอียดภารกิจ id : {$id}  ",
                ], 200);
    }
    public function mission_basket_detail($id)
    {
        $basket = basket::where('donate_id', $id)->get();
        return response()->json(
            [
                'status' => true,
                'data' => BasketResource::collection($basket),
                'message' => "ข้อมูลรายละเอียดสินค้าที่บริจาคของภารกิจ id : {$id}  ",
            ], 200);
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

            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => $errors->first(),
                ], 400
            );
        }

        $post = Donate::find($id);

        if (empty($post)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล id : {$id} นี้ ",
                ], 200
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

        return response()->json(
            [
                'status' => true,
                'data' => [],
                'message' => "บันทึกข้อมูลสำเร็จจ้า",
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

            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => $errors->first(),
                ], 400
            );
        }

        $member = member::find($member_id);
        if (empty($member)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล member_id : {$member_id} นี้ ",
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

        return response()->json(
            [
                'status' => true,
                'data' => [],
                'message' => "เปลี่ยนรูปโปรไฟล์สำเร็จ",
            ], 200
        );
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

            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => $errors->first(),
                ], 400
            );
        }
        $member = member::find($member_id);
        if (empty($member)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล member_id : {$member_id} นี้ ",
                ], 200
            );
        }
        if ($member->pass != $request->password) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "รหัสผ่านเก่าไม่ถูกต้อง กรุณาป้อนรหัสผ่านใหม่",
                ], 200
            );
        }
        $member->pass = $request->new_password;
        $member->password = Hash::make($request->new_password);
        $member->save();

        return response()->json(
            [
                'status' => true,
                'data' => [],
                'message' => "เปลี่ยนรหัสผ่านสำเร็จ",
            ], 200
        );
    }
}
