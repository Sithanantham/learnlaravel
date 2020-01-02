<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;


class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function product(){
        $products = Product::orderBy('created_at','DESC')->get();
        return view('product.home', compact('products'));
    }

    public function addProduct(){
        return view('product.addProduct');
    }

    public function saveProduct(Request $request){
        $save_product = new Product;
        $save_product->product_name = $request->product_name;
        $save_product->product_brand_name = $request->product_brand_name;
        $save_product->product_price = $request->product_price;
        $save_product->product_discount = $request->product_discount;
        $save_product->product_discount_price = $request->product_discount_price;
        $save_product->product_status = $request->product_status;

        if($file = $request->hasFile('product_image')){
            $file = $request->file('product_image');
            $fileName = time()."-" .$file->getClientOriginalName();
            $path = public_path().'/productImages/';
            $file->move($path,$fileName);
            $save_product->product_image = $fileName;
        }
        $save_product->save();
        return back()->with('success', 'Product Added Successfully');
    }

    public function viewProduct(){
        $products = Product::orderBy('created_at','DESC')->get();
        return view('product.viewProduct', compact('products'));
    }

    public function editProduct($id){
        $edit_products = Product::where('id', '=', $id)->first();
        //dd($edit_products);
        return view('product.editProduct', compact('edit_products'));
    }

    public function updateProduct(Request $request, $id){
        $updateProduct = Product::where('id', '=', $id)->first();
        //dd($updateProduct);
        $updateProduct->product_name = $request->product_name;
        $updateProduct->product_brand_name = $request->product_brand_name;
        $updateProduct->product_price = $request->product_price;
        $updateProduct->product_discount = $request->product_discount;
        $updateProduct->product_discount_price = $request->product_discount_price;
        $updateProduct->product_status = $request->product_status;

        if($file = $request->hasFile('product_image')){
            $file = $request->file('product_image');
            $fileName = time()."-" .$file->getClientOriginalName();
            $path = public_path().'/productImages/';
            $file->move($path,$fileName);
            $updateProduct->product_image = $fileName;
        }
       // dd($updateProduct);
        $updateProduct->save();
        return back()->with('success', 'Product Updated Successfully');
    }

    public function deleteProduct($id){
        $deleteProduct = Product::find($id);
        //dd($deleteProduct);
        $deleteProduct->delete();
        return back()->with('success', 'Product Deleted Successfully');
    }

    public function viewAdmins(){
        $admins = User::orderBy('created_at','DESC')->get();
        return view('product.viewAdmins', compact('admins'));
    }

    public function addAdmin(){
        //return view('product.addAdmin');
    }

}
