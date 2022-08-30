<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DonateBasketResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSelectTypeResource;
use App\Http\Resources\ProductTypeResource;
use App\Models\Basket;
use App\Models\Product;
use App\Models\Product_type;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function products()
    {
        $products = Product::query()->with(['types'])->where('status', null)->get();
        return response()->json(
            [
                'products' => ProductResource::collection($products),
            ], 200);

    }
    public function product_types()
    {
        $product_types = Product_type::all();
        return response()->json(
            [
                'product_types' => ProductTypeResource::collection($product_types),
            ], 200);
    }

    public function product_type_detail($product_type_id)
    {
        $data = Product_type::find($product_type_id);
        if (empty($data)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล product_type_id : {$product_type_id} นี้ ",
                ], 200
            );
        }
        date_default_timezone_set("Asia/Bangkok");
        if (empty($data->description)) {
            return response()->json(
                [
                    'product_type_id' => (int) $data->product_type_id,
                    'name' => $data->name,
                    'image' => asset('/storage/product_type/product_type_image_assets/' . $data->image),
                    'description' => "ไม่มีคำอธิบาย",
                    'date_update' => date($data->updated_at),
                ], 200);
        } else {
            return response()->json(
                [
                    'product_type_id' => (int) $data->product_type_id,
                    'name' => $data->name,
                    'image' => asset('/storage/product_type/product_type_image_assets/' . $data->image),
                    'description' => $data->description,
                    'date_update' => date($data->updated_at),
                ], 200);
        }

    }
    public function product_select_type($product_type_id)
    {
        $product_select_type = product::query()->with(['types'])->where('type', $product_type_id)->get();
        return response()->json(
            [
                'product_select_type' => ProductSelectTypeResource::collection($product_select_type),
            ], 200);
    }

    public function prod_store(Request $request)
    {

        $request->validate([
            'giver' => ['required'],
            'admin' => ['required'],
            'name' => ['required'],
            'quantity' => ['required'],
            'type' => ['required'],
        ]);

        $post = new product;
        $post->giver = $request->input('giver');
        $post->admin = $request->input('admin');
        $post->name = $request->input('name');
        $post->quantity = $request->input('quantity');
        $post->type = $request->input('type');
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
                'store' => 'บันทึกข้อมูลสินค้าเรียบร้อยเเล้ว',
            ], 200);
    }

    public function my_donate_product()
    {
        //$type = Product_type::all();
        $my_donate_product = Product::where('giver', '3')->get();

        return response()->json(
            [
                //'type' => $type,
                'my_donate_product' => ProductResource::collection($my_donate_product),
            ], 200);

    }

    public function product_detail($product_id)
    {
        $product = Product::find($product_id);
        if (empty($product)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล product_id : {$product_id} นี้ ",
                ], 200
            );
        }
        date_default_timezone_set("Asia/Bangkok");
        if ($product->description == null) {
            return [
                'product_id' => $product->product_id,
                'created_at' => date($product->created_at),
                'giver' => $product->givers->name . " " . $product->givers->surname,
                'name' => $product->name,
                'type' => $product->types->name,
                'description' => "ยังไม่มีคำอธิบาย",
                'amount' => (int) $product->amount . " " . $product->unit,
                'quantity' => (int) $product->quantity . " " . $product->unit,
                'product_image' => asset('/storage/product/product_image_assets/' . $product->product_image),
            ];
        } else {
            return [
                'product_id' => $product->product_id,
                'created_at' => date($product->created_at),
                'giver' => $product->givers->name . " " . $product->givers->surname,
                'name' => $product->name,
                'type' => $product->types->name,
                'description' => $product->description,
                'amount' => (int) $product->amount . " " . $product->unit,
                'quantity' => (int) $product->quantity . " " . $product->unit,
                'product_image' => asset('/storage/product/product_image_assets/' . $product->product_image),
            ];
        }
    }

    public function donate_product_detail($product_id)
    {
        $donate = Basket::where('product_id', $product_id)->where('status', 'ส่งสำเร็จ')->get();

        return response()->json(
            [
                'donate' => DonateBasketResource::collection($donate),
            ], 200);

    }

    public function my_donate_product_cancle($product_id)
    {
        $post = product::find($product_id);
        if (empty($post)) {
            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => "ไม่พบข้อมูล product_id : {$product_id} นี้ ",
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
