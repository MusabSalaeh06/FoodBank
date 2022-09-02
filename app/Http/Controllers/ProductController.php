<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Donate;
use App\Models\member;
use App\Models\Product;
use App\Models\Product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product_type_show()
    {
        $product_type = product_type::orderByRaw('product_type_id DESC')->get();
        $co_product_type = product_type::orderByRaw('product_type_id DESC')->get()->count();
        return view('Product_type', compact(['product_type','co_product_type']));
    }
    public function product_show()
    {
        $type = Product_type::all();
        $giver = member::where('type', 'giver')->get();
        //$product = product::where('status', null)->get();
        $product = product::orderByRaw('product_id DESC')->get();
        $co_product = product::orderByRaw('product_id DESC')->get()->count();
        return view('Product', compact(['type', 'giver', 'product', 'co_product']));
    }
    public function product_detail($product_id)
    {
        $product = Product::find($product_id);
        $basket = Basket::where('product_id', $product_id)->where('status', "ส่งสำเร็จ")->get();
        $co_basket = Basket::where('product_id', $product_id)->where('status', "ส่งสำเร็จ")->get()->count();
        return view('Product_detail', compact(['basket','co_basket','product']));
    }
    public function product_types($type)
    {
        $product_type = Product_type::all();
        $productT = Product_type::find($type);
        $product = product::where('status', null)->where('type', $type)->get();
        return view('Product_types', compact(['product_type', 'productT', 'product']));
    }
    public function products()
    {
        $product_type = Product_type::all();
        $product = product::where('status', null)->get();
        return view('Products', compact(['product_type', 'product']));
    }
    public function basket_show()
    {
        $Co_Basket = Basket::where('status', "ยังไม่บริจาค")->where('admin', Auth::user()->member_id)->get()->count();
        $Basket = Basket::where('status', "ยังไม่บริจาค")->where('admin', Auth::user()->member_id)->get();
        $sender = member::where('type', 'sender')->where('status', 'online')->get();
        $reciever = member::where('type', 'reciever')->get();

        return view('Basket', compact(['Basket', 'sender', 'reciever', 'Co_Basket']));
    }
    public function check_donate(Request $request)
    {
        $Basket = Basket::where('status', "ยังไม่บริจาค")->where('admin', Auth::user()->member_id)->get();
        $reciever = member::find($request->reciever);
        $sender = member::find($request->sender);

        return view('check_donate', compact(['Basket', 'reciever', 'sender']));
    }
    public function donate_show()
    {
        $product = product::where('status', null)->get();
        $reciever = member::where('type', 'reciever')->get();
        $sender = member::where('type', 'sender')->where('status', 'online')->get();
        $donate = Donate::orderByRaw('id DESC')->get();
        $co_donate = Donate::orderByRaw('id DESC')->get()->count();
        return view('Donate', compact(['product', 'reciever', 'sender', 'donate', 'co_donate']));
    }
    // จัดการข้อมูล PRODUCT ----------------------------------------------------------------------------------------------------------
    // จัดการข้อมูล PRODUCT ----------------------------------------------------------------------------------------------------------
    // จัดการข้อมูล PRODUCT ----------------------------------------------------------------------------------------------------------
    public function prod_store(Request $request)
    {
        $request->validate([
            'giver' => [''],
            'admin' => [''],
            'name' => [''],
            'quantity' => [''],
            'type' => [''],
        ]);

        $post = new product;
        $post->giver = $request->input('giver');
        $post->admin = $request->input('admin');
        $post->name = $request->input('name');
        $post->unit = $request->input('unit');
        $post->description = $request->input('description');
        $post->quantity = $request->input('amount');
        $post->amount = $request->input('amount');
        $post->type = $request->input('type');
        $post->date = $request->input('date');
        if ($request->file('product_image')) {
            $file = $request->file('product_image');
            $ldate = date('YmdHis');
            $filename = $request->input('name') . '_' . $ldate . '.' . $file->getClientOriginalExtension();
            $request->product_image->move('storage/product/product_image_assets', $filename);
            $post->product_image = $filename;
        }
        //    if   ($request->file('product_image')) {
        //     $file=$request->file('product_image');
        //     $ldate = date('YmdHis');
        //     $filename = $request->input('name').'_'.$ldate.'.'.$file->getClientOriginalExtension();
        //     $part = 'storage/product/product_image_assets';
        //     $request->product_image->move($part,$filename);
        //     $post->product_image = $part.'/'.$filename;
        //     }
        $post->save();
        return redirect()->back()->with('store', 'บันทึกข้อมูลสินค้าเรียบร้อยเเล้ว');
    }
    public function prod_update(Request $request, $product_id)
    {
        $request->validate([
            'giver' => [''],
            'admin' => [''],
            'name' => [''],
            'quantity' => [''],
            'type' => [''],
            'date' => [''],
        ]);

        $post = product::find($product_id);
        $amount = $post->amount - $request->input('amount');

        $post = product::find($product_id);
        $post->giver = $request->input('giver');
        $post->admin = $request->input('admin');
        $post->name = $request->input('name');
        $post->unit = $request->input('unit');
        $post->description = $request->input('description');
        $post->amount = $request->input('amount');
        $post->quantity = $post->quantity - $amount;
        if ($post->quantity < 0) {
            return redirect()->back()->with('error', 'จำนวนสินค้าติดลบ กรุณาปรับจำนวนสินค้าใหม่');
        }
        $post->type = $request->input('type');
        $post->date = $request->input('date');
        if ($request->file('product_image')) {
            $file = $request->file('product_image');
            $ldate = date('YmdHis');
            $filename = $request->input('name') . '_' . $ldate . '.' . $file->getClientOriginalExtension();
            $request->product_image->move('storage/product/product_image_assets', $filename);
            $post->product_image = $filename;
        }
        $post->save();
        return redirect()->back()->with('update', 'อัพเดทข้อมูลสินค้าเรียบร้อยเเล้ว');
    }
    public function cancle_donate($product_id)
    {
        $product = product::find($product_id);
        if (empty($product)) {
            return redirect()->back()->with(
                [
                    'error' => "ไม่พบข้อมูล product_id : {$product_id} นี้ ",
                ],
                200
            );
        }
        $product = product::find($product_id);
        $product->status = "ยกเลิกการบริจาค";
        $product->save();
        return redirect()->back()->with(
            [
                'error' => "ลบข้อมูลสินค้าเรียบร้อย",
            ],
            200
        );
    }
    public function prod_delete($product_id)
    {
        product::find($product_id)->delete();
        return redirect()->back()->with('delete', 'ลบสินค้าออกจากระบบเรียบร้อย');
    }
    // จัดการข้อมูล PRODUCT_TYPE ----------------------------------------------------------------------------------------------------------
    // จัดการข้อมูล PRODUCT_TYPE ----------------------------------------------------------------------------------------------------------
    // จัดการข้อมูล PRODUCT_TYPE ----------------------------------------------------------------------------------------------------------
    public function prod_type_store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $post = new Product_type;
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        if ($request->file('image')) {
            $file = $request->file('image');
            $ldate = date('YmdHis');
            $filename = $request->input('name') . '_' . $ldate . '.' . $file->getClientOriginalExtension();
            $request->image->move('storage/product_type/product_type_image_assets', $filename);
            $post->image = $filename;
        }
        $post->save();
        return redirect()->back()->with('store', 'บันทึกข้อมูลประเภทสินค้าเรียบร้อยเเล้ว');
    }

    public function prod_type_update(Request $request, $product_type_id)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $post = product_type::find($product_type_id);
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        if ($request->file('image')) {
            $file = $request->file('image');
            $ldate = date('YmdHis');
            $filename = $request->input('name') . '_' . $ldate . '.' . $file->getClientOriginalExtension();
            $request->image->move('storage/product_type/product_type_image_assets', $filename);
            $post->image = $filename;
        }
        $post->save();
        return redirect()->back()->with('update', 'อัพเดทข้อมูลประเภทสินค้าเรียบร้อยเเล้ว');
    }

    public function prod_type_delete($product_type_id)
    {
        product_type::find($product_type_id)->delete();
        return redirect()->back()->with('delete', 'ลบประเภทสินค้าออกจากระบบเรียบร้อย');
    }
    // จัดการข้อมูล DONATE ----------------------------------------------------------------------------------------------------------
    // จัดการข้อมูล DONATE ----------------------------------------------------------------------------------------------------------
    // จัดการข้อมูล DONATE ----------------------------------------------------------------------------------------------------------
    public function donate_store(Request $request)
    {
        $request->validate([
            'sender' => ['required'],
            'reciever' => ['required'],
            'admin' => ['required'],
        ]);

        $post = new Donate;
        $post->reciever = $request->input('reciever');
        $post->sender = $request->input('sender');
        $post->admin = $request->input('admin');
        $post->status = "รอการตอบรับ";
        $post->save();

        Basket::where('admin', Auth::user()->member_id)->where('status', "ยังไม่บริจาค")->update(array('donate_id' => $post->id, 'status' => "พร้อมบริจาค"));

        return redirect()->route('donate.show')->with('store', 'บันทึกข้อมูลการบริจาคเรียบร้อย');
    }
    public function donate_update(Request $request, $id)
    {
        $request->validate([
            'sender' => [''],
            'reciever' => [''],
            'admin' => [''],
            'status' => [''],
        ]);

        $post = Donate::find($id);
        $post->sender = $request->input('sender');
        $post->reciever = $request->input('reciever');
        //$post->admin = $request->input('admin');
        $post->save();
        if ($post->status == $request->input('status')) {
            return redirect()->back()->with('update', 'อัพเดทข้อมูลการบริจาคเรียบร้อยเเล้ว');
        }
        $post = Donate::find($id);
        $post->status = $request->input('status');
        $post->save();
        Basket::where('donate_id', $id)->update(array('status' => $request->input('status')));
        if ($request->input('status') == "ยกเลิกภารกิจ") {
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

        return redirect()->back()->with('update', 'อัพเดทข้อมูลการบริจาคเรียบร้อยเเล้ว');
    }
    public function donate_delete($id)
    {
        Donate::find($id)->delete();
        return redirect()->back()->with('delete', 'ลบข้อมูลการบริจาคออกจากระบบเรียบร้อย');
    }
    // จัดการข้อมูล BASKET ----------------------------------------------------------------------------------------------------------
    // จัดการข้อมูล BASKET ----------------------------------------------------------------------------------------------------------
    // จัดการข้อมูล BASKET ----------------------------------------------------------------------------------------------------------
    public function basket_store(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
            'quantity' => ['required'],
            'admin' => ['required'],
        ]);


        $post = Product::find($request->input('product_id'));
        $post->quantity = $post->quantity - $request->input('quantity');
        if ($post->quantity < 0) {
            return redirect()->back()->with('error', 'จำนวนสินค้าที่อยู่ในคลัง มีน้อยกว่าจำนวนที่ต้องการ กรุณาปรับจำนวนสินค้าที่ต้องการใหม่');
        }

        $post = new Basket;
        $post->product_id = $request->input('product_id');
        $post->quantity = $request->input('quantity');
        $post->admin = $request->input('admin');
        $post->status = "ยังไม่บริจาค";
        $post->save();

        $post2 = Product::find($request->input('product_id'));
        $post2->quantity = $post2->quantity - $request->input('quantity');
        $post2->save();
        $post2 = Product::find($request->input('product_id'));
        if ($post2->quantity == 0) {
            $post2->status = "hide";
            $post2->save();
        } else {
        }

        return redirect()->back()->with('store', 'บันทึกข้อมูลเรียบร้อยเเล้ว');
    }
    public function basket_update(Request $request, $id)
    {
        $basket = Basket::find($id);
        $post = Product::find($basket->product_id);
        $post->quantity = $post->quantity - $request->input('quantity');
        if ($post->quantity < 0) {
            return redirect()->back()->with('error', 'จำนวนสินค้าที่อยู่ในคลัง มีน้อยกว่าจำนวนที่ต้องการ กรุณาปรับจำนวนสินค้าที่ต้องการใหม่');
        }

        $product = Product::find($basket->product_id);
        $product->quantity = $product->quantity + $basket->quantity;
        $product->save();

        $request->validate([
            //
        ]);


        $post = Basket::find($id);
        $post->quantity = $request->input('quantity');
        $post->admin = $request->input('admin');
        $post->save();

        $basket2 = Basket::find($id);
        $product2 = Product::find($basket2->product_id);
        $product2->quantity = $product2->quantity - $request->input('quantity');
        $product2->save();
        $product2 = Product::find($basket2->product_id);
        if ($product2->quantity != 0) {
            $product2->status = null;
            $product2->save();
        } else {
        }

        return redirect()->back()->with('update', 'อัพเดทข้อมูลเรียบร้อยเเล้ว');
    }
    public function basket_delete(Request $request, $id)
    {
        $post = Basket::find($id);
        $post2 = Product::find($post->product_id);
        $post2->quantity = $post2->quantity + $post->quantity;
        $post2->save();
        $post2 = Product::find($post->product_id);
        if ($post2->quantity != 0) {
            $post2->status = null;
            $post2->save();
        } else {
        }
        Basket::find($id)->delete();
        return redirect()->back()->with('delete', 'ลบข้อมูลออกจากระบบเรียบร้อย');
    }
}
