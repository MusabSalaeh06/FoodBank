<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DonateBasketResource;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSelectTypeResource;
use App\Http\Resources\ProductTypeDetailResource;
use App\Http\Resources\ProductTypeResource;
use App\Models\Basket;
use App\Models\Member;
use App\Models\Product;
use App\Models\Product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function products()
    {
        $products = Product::query()->with(['types'])->where('status', null)->get();
        return response()->json(
            [
                'status' => true,
                'data' => ProductResource::collection($products),
                'message' => "ข้อมูลสินค้าทั้งหมดในระบบ",
            ], 200);
        }
    public function my_donate_product(Request $request)
    {
        $my_donate_product = Product::where('giver', $request->member_id)->get();
        return response()->json(
            [
                'status' => true,
                'data' => ProductResource::collection($my_donate_product),
                'message' => "ข้อมูลสินค้าที่ฉันบริจาค",
            ], 200);
    }
    public function product_types()
    {
        $product_types = Product_type::all();
        return response()->json(
            [
                'status' => true,
                'data' => ProductTypeResource::collection($product_types),
                'message' => "ข้อมูลประเภทสินค้าทั้งหมดในระบบ",
            ], 200);
    }
    public function product_type_detail(Request $request)
    {
        $Product_type_detail = Product_type::find($request->product_type_id);
        if (empty($Product_type_detail)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล product_type_id : {$request->product_type_id} นี้ ",
                ], 200
            );
        }
            return response()->json(
                [
                    'status' => true,
                    'data' => ProductTypeDetailResource::make($Product_type_detail),
                    'message' => "ข้อมูลรายละเอียดประเภทสินค้า product_type_id : {$request->product_type_id}",
                ], 200);
    }
    public function product_select_type(Request $request)
    {
        $product_select_type = product::query()->with(['types'])->where('type', $request->product_type_id)->get();
        return response()->json(
            [
                'status' => true,
                'data' => ProductSelectTypeResource::collection($product_select_type),
                'message' => "ข้อมูลสินค้าที่อยู่ในประเภท product_type_id : {$request->product_type_id}",
            ], 200);
    }
    public function product_detail(Request $request)
    {
        $product = Product::find($request->product_id);
        if (empty($product)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล product_id : {$request->product_id} นี้ ",
                ], 200
            );
        }
        return response()->json(
            [
                'status' => true,
                'data' => ProductDetailResource::make($product),
                'message' => "ข้อมูลรายละเอียดสินค้า product_id : {$request->product_id} ",
            ], 200);
    }
    public function donate_product_detail(Request $request)
    {
        $donate = Basket::where('product_id', $request->product_id)->where('status', 'ส่งสำเร็จ')->get();

        return response()->json(
            [
                'status' => true,
                'data' => DonateBasketResource::collection($donate),
                'message' => "ข้อมูลรายละเอียดการบริจาคสินค้า product_id : {$request->product_id} ",
            ], 200);

    }
    public function product_store(Request $request)
    {
            $customMessage = [
                "giver.required" => "กรุณาส่งค่า giver(ผู้บริจาค) มาด้วยน่ะครับ",
                //"admin.required" => "กรุณาส่งค่า admin(เจ้าหน้าที่) มาด้วยน่ะครับ",
                "name.required" => "กรุณาส่งค่า name(ชื่อสินค้า) มาด้วยน่ะครับ",
                "amount.required" => "กรุณาส่งค่า amount(จำนวนสินค้า) มาด้วยน่ะครับ",
                "type.required" => "กรุณาส่งค่า type(ประเภทสินค้า) มาด้วยน่ะครับ",
                "unit.required" => "กรุณาส่งค่า unit(หน่วยของสินค้า) มาด้วยน่ะครับ",
            ];

            $validator = Validator::make($request->all(), [
                'giver' => ['required'],
                //'admin' => ['required'],
                'name' => ['required'],
                'amount' => ['required'],
                'type' => ['required'],
                'unit' => ['required'],
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
        $post = new product;
        $post->giver = $request->input('giver');
        //$post->admin = $request->input('admin');
        $post->name = $request->input('name');
        $post->type = $request->input('type');
        $post->amount = $request->input('amount');
        $post->quantity = $request->input('amount');
        $post->unit = $request->input('unit');
        if ($request->file('product_image')) {
            $file = $request->file('product_image');
            $ldate = date('YmdHis');
            $filename = $request->input('name') . '_' . $ldate . '.' . $file->getClientOriginalExtension();
            $request->product_image->move('storage/product/product_image_assets', $filename);
            $post->product_image = $filename;
        }
        $post->save();

        return response()->json(
            [
                'status' => true,
                'data' => [],
                'message' => "บันทึกข้อมูลสินค้าเรียบร้อยเเล้ว",
            ], 200);
    }
    public function my_donate_product_cancle(Request $request)
    {
        $post = product::find($request->product_id);
        if (empty($post)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล product_id : {$request->product_id} นี้ ",
                ], 200
            );
        }
        if ($post->giver != 3) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => " ไม่สามารถยกเลิกสินค้าได้เนื่องจาก คุณไม่ใช่ผู้บริจาค",
                ], 200
            );
        }
        $post->status = "ยกเลิกบริจาค";
        $post->save();

        return response()->json(
            [
                'status' => true,
                'data' => [],
                'update' => 'ยกเลิกบริจาคสินค้าสำเร็จ',
            ], 200);

    }
    public function my_donate_product_delete($product_id)
    {
        $product = product::find($product_id);
        if (empty($product)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล product_id : {$product_id} นี้ ",
                ], 200
            );
        }
        product::find($product_id)->delete();
        return response()->json(
            [
                'status' => true,
                'data' => [],
                'message' => "ลบข้อมูลสินค้าเรียบร้อย",
            ], 200);
    }
}
