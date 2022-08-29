<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSelectTypeResource;
use App\Http\Resources\ProductTypeDetailResource;
use App\Http\Resources\ProductTypeResource;
use App\Models\Donate;
use App\Models\member;
use App\Models\Product;
use App\Models\Product_type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function products()
    {
        $products = Product::query()->with(['types'])->get();
        return response()->json(
            [
               'products' =>  ProductResource::collection($products)
            ], 200);
        //return new ProductCollection($products); จะใช้แบบนี้ได้ดีกว่าถ้าข้อมูลเยอะ

    }
    public function product_types()
    {
        $product_types = Product_type::all();
        return response()->json(
             [
                'product_types' =>  ProductTypeResource::collection($product_types)
             ], 200);
    }
    public function product_type_detail($product_type_id)
    {
        $product_type_detail = Product_type::find($product_type_id)->get();
        return response()->json(
             [
                'product_type_detail' =>  ProductTypeDetailResource::collection($product_type_detail)
             ], 200);
    }
    public function product_select_type($product_type_id)
    {
        $product_select_type = product::query()->with(['types'])->where('type',$product_type_id)->get();
        return response()->json(
             [
                'product_type_detail' =>  ProductSelectTypeResource::collection($product_select_type)
             ], 200);
    }

    public function product_show()
    {
        $type = Product_type::all();
        $giver = member::where('type','giver')->get();
        $product = Product::all();

        return response()->json(
            [
                'status' => 'success',
                'type' => $type,
                'giver' => $giver,
                'product' => $product,
            ], 200);

        //return view('Product',compact(['type','giver','product']));
    }

    public function product_detail($product_id)
    {
        $product = Product::find($product_id);
        $donate = Donate::where('product_id',$product_id)->get();

        return response()->json(
            [
                'status' => 'success',
                'product' => $product,
                'donate' => $donate,
            ], 200);

        //return view('Product_detail',compact(['donate','product']));
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
           if   ($request->file('product_image')) {
            $file=$request->file('product_image');
            $ldate = date('YmdHis');
            $filename = $request->input('name').'_'.$ldate.'.'.$file->getClientOriginalExtension();
            $request->product_image->move('storage/product/product_image_assets',$filename);
            $post->product_image =$filename; 
            } 
       $post->save();

       return response()->json(
        [
            'store' => 'บันทึกข้อมูลสินค้าเรียบร้อยเเล้ว',
        ], 200);
       //return redirect()->back()->with('store','บันทึกข้อมูลสินค้าเรียบร้อยเเล้ว');
    }

    public function prod_update(Request $request, $product_id)
    {
        $request->validate([
            'giver' => ['required'],
            'admin' => ['required'],
            'name' => ['required'],
            'quantity' => ['required'],
            'type' => ['required'],
        ]);
    
           $post = product::find($product_id);
           $post->giver = $request->input('giver');
           $post->admin = $request->input('admin');
           $post->name = $request->input('name');
           $post->quantity = $request->input('quantity');
           $post->type = $request->input('type');
           if   ($request->file('product_image')) {
            $file=$request->file('product_image');
            $ldate = date('YmdHis');
            $filename = $request->input('name').'_'.$ldate.'.'.$file->getClientOriginalExtension();
            $request->product_image->move('storage/product/product_image_assets',$filename);
            $post->product_image =$filename; 
            } 
           $post->save();

           return response()->json(
            [
                'update' => 'อัพเดทข้อมูลสินค้าเรียบร้อยเเล้ว',
            ], 200);

           //return redirect()->back()->with('update','อัพเดทข้อมูลสินค้าเรียบร้อยเเล้ว');

        }

    public function prod_delete($product_id)
    {
        product::find($product_id)->delete();

        return response()->json(
            [
                'delete' => 'ลบสินค้าออกจากระบบเรียบร้อย',
            ], 200);

       // return redirect()->back()->with('delete','ลบสินค้าออกจากระบบเรียบร้อย');

    }

    public function product_type_show()
    {
        $product_type = product_type::get();
        
        return response()->json(
            [
                'status' => 'success',
                'product_type' => $product_type,
            ], 200);

       // return view('Product_type',compact(['product_type']));
    }

    public function prod_type_store(Request $request)
    {
    $request->validate([
            'name' => ['required'],
    ]);

       $post = new Product_type;
       $post->name = $request->input('name');
       $post->save();

       return response()->json(
        [
            'store' => 'บันทึกข้อมูลประเภทสินค้าเรียบร้อยเเล้ว',
        ], 200);

       //return redirect()->back()->with('store','บันทึกข้อมูลประเภทสินค้าเรียบร้อยเเล้ว');
    }

    public function prod_type_update(Request $request, $product_type_id)
    {
        $request->validate([
            'name' => ['required'],
        ]);
    
           $post = product_type::find($product_type_id);
           $post->name = $request->input('name');
           $post->save();

           return response()->json(
            [
                'update' => 'อัพเดทข้อมูลประเภทสินค้าเรียบร้อยเเล้ว',
            ], 200);

           //return redirect()->back()->with('update','อัพเดทข้อมูลประเภทสินค้าเรียบร้อยเเล้ว');

        }

    public function prod_type_delete($product_type_id)
    {
        product_type::find($product_type_id)->delete();

        return response()->json(
            [
                'delete' => 'ลบประเภทสินค้าออกจากระบบเรียบร้อย',
            ], 200);

        //return redirect()->back()->with('delete','ลบประเภทสินค้าออกจากระบบเรียบร้อย');

    }

    public function donate_show()
    {
        $product = product::where('quantity','>',0)->get();
        $reciever = member::where('type','reciever')->get();
        $sender = member::where('type','sender')->get();
        $donate = Donate::all();

        return response()->json(
            [
                'status' => 'success',
                'product' => $product,
                'reciever' => $reciever,
                'sender' => $sender,
                'donate' => $donate,
            ], 200);

        //return view('Donate',compact(['product','reciever','sender','donate']));
    }
    public function donate_store(Request $request)
    {

    $request->validate([
            'product_id' => ['required'],
            'quantity' => ['required'],
            'sender' => ['required'],
            'reciever' => ['required'],
            'admin' => ['required'],
    ]);

       $post = new Donate;
       $post->product_id = $request->input('product_id');
       $post->quantity = $request->input('quantity');
       $post->reciever = $request->input('reciever');
       $post->sender = $request->input('sender');
       $post->admin = $request->input('admin');
       $post->save();

       $donate = product::find($request->product_id);
       $donate->quantity = $donate->quantity - $request->quantity;
       $donate->save(); 

       return response()->json(
        [
            'store' => 'บันทึกข้อมูลการบริจาคเรียบร้อยเเล้ว',
        ], 200);

       //return redirect()->back()->with('store','บันทึกข้อมูลการบริจาคเรียบร้อยเเล้ว');
    }

    public function donate_update(Request $request, $id)
    {
        $request->validate([
            'product_id' => ['required'],
            'quantity' => ['required'],
            'sender' => ['required'],
            'reciever' => ['required'],
            'admin' => ['required'],
        ]);

           $edit = Donate::find($id);
           $prod_q = Product::find($edit->product_id);
           $prod_q->quantity = $prod_q->quantity + $edit->quantity;
           $prod_q->save();
    
           $post = Donate::find($id);
           $post->product_id = $request->input('product_id');
           $post->quantity = $request->input('quantity');
           $post->sender = $request->input('sender');
           $post->reciever = $request->input('reciever');
           $post->admin = $request->input('admin');
           $post->save();

           $donate = product::find($request->product_id);
           $donate->quantity = $donate->quantity - $request->quantity;
           $donate->save(); 

           return response()->json(
            [
                'update' => 'อัพเดทข้อมูลการบริจาคเรียบร้อยเเล้ว',
            ], 200);

          // return redirect()->back()->with('update','อัพเดทข้อมูลการบริจาคเรียบร้อยเเล้ว');
        }

    public function donate_delete($id)
    {
        $edit = Donate::find($id);
        $prod_q = Product::find($edit->product_id);
        $prod_q->quantity = $prod_q->quantity + $edit->quantity;
        $prod_q->save();
        Donate::find($id)->delete();

        return response()->json(
            [
                'delete' => 'ลบข้อมูลการบริจาคออกจากระบบเรียบร้อย',
            ], 200);

        //return redirect()->back()->with('delete','ลบข้อมูลการบริจาคออกจากระบบเรียบร้อย');

    }

}
