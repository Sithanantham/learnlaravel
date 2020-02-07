<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Middleware\AdminMiddleware;
use App\Exports\ProductsExport;
use App\Exports\CategorysExport;
use App\Exports\CustomersExport;
use App\Exports\AdminsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Product;
use App\Category;
use App\User;
use PDF;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        //$this->middleware(AdminMiddleware::class);
    }

    public function product(){
        $products = Product::with('category_name')->orderBy('created_at','DESC')->get();
        return view('product.home', compact('products'));
    }

    public function addProduct(){
        $category = Category::all();
        return view('product.addProduct', compact('category'));
    }

    public function saveProduct(Request $request){
        //dd($request->file('product_audio'));
        $save_product = new Product;
        $save_product->product_name = $request->product_name;
        $save_product->category_id = $request->category_id;
        $save_product->product_brand_name = $request->product_brand_name;
        $save_product->product_price = $request->product_price;
        $save_product->product_discount = $request->product_discount;
        $save_product->product_discount_price = $request->product_discount_price;
        $save_product->product_status = $request->product_status;

        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $fileName = time()."-" .$file->getClientOriginalName();
            $path = public_path().'/productImages/';
            $file->move($path,$fileName);
            $save_product->product_image = $fileName;
        }

        if($request->hasFile('product_video')){
            $file = $request->file('product_video');
            $fileName = time()."-" .$file->getClientOriginalName();
            $path = public_path().'/productVideos/';
            $file->move($path,$fileName);
            $save_product->product_video = $fileName;
        }

        if($request->hasFile('product_audio')){
            $file = $request->file('product_audio');
            $fileName = time()."-" .$file->getClientOriginalName();
            $path = public_path().'/productAudios/';
            $file->move($path,$fileName);
            $save_product->product_audio = $fileName;
        }
         //dd($save_product);
        $save_product->save();
        return back()->with('success', 'Product Added Successfully');
    }

    public function viewProduct(){
        $products = Product::with('category_name')->orderBy('created_at','DESC')->paginate(5)->onEachSide(3);
        return view('product.viewProduct', compact('products'));
    }

    public function editProduct($id){
        $edit_products = Product::where('id', '=', $id)->first();
        $category = Category::all();
        //dd($edit_products);
        return view('product.editProduct', compact('edit_products', 'category'));
    }

    public function updateProduct(Request $request, $id){
        $updateProduct = Product::where('id', '=', $id)->first();
        //dd($updateProduct);
        $updateProduct->product_name = $request->product_name;
        $updateProduct->category_id = $request->category_id;
        $updateProduct->product_brand_name = $request->product_brand_name;
        $updateProduct->product_price = $request->product_price;
        $updateProduct->product_discount = $request->product_discount;
        $updateProduct->product_discount_price = $request->product_discount_price;
        $updateProduct->product_status = $request->product_status;

        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $fileName = time()."-" .$file->getClientOriginalName();
            $path = public_path().'/productImages/';
            $file->move($path,$fileName);
            $updateProduct->product_image = $fileName;
        }

        if($request->hasFile('product_video')){
            $file = $request->file('product_video');
            $fileName = time()."-" .$file->getClientOriginalName();
            $path = public_path().'/productVideos/';
            $file->move($path,$fileName);
            $updateProduct->product_video = $fileName;
        }

        if($request->hasFile('product_audio')){
            $file = $request->file('product_audio');
            $fileName = time()."-" .$file->getClientOriginalName();
            $path = public_path().'/productAudios/';
            $file->move($path,$fileName);
            $updateProduct->product_audio = $fileName;
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

    public function exportExcel(){
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function exportPDF(){
        $products = Product::all();
        //dd($products);
      // return view('product.downloadproductPDF', compact('products'));
       // $pdf = \PDF::loadView('product.downloadproductPDF', compact('products'));
        $pdf = PDF::loadHTML('Hi Sithu');
        return $pdf->stream('Products.pdf');
    }

    public function exportCSV(){
        return Excel::download(new ProductsExport, 'products.csv');
    }

    public function addCategory(){
        $category = Category::paginate(5)->onEachSide(3);
        return view('category.addCategory', compact('category'));
    }

    public function saveCategory(Request $request){
       $saveCategory = new Category;
       $saveCategory->category_name = $request->category_name;
      // dd($saveCategory);
       $saveCategory->save();
       return back()->with('success', 'Category Added Successfully');
    }

    public function editCategory(){
        return view('category.editCategory');
    }

    public function updateCategory(){
       // return view('category.addCategory');
    }

    public function deleteCategory(){
        // return view('category.addCategory');
     }

    public function exportCategoryASExcel(){
        return Excel::download(new CategorysExport, 'category.xlsx');
    }

    public function exportCategoryAsCSV(){
        return Excel::download(new CategorysExport, 'category.csv');
    }

    public function exportCategoryAsPDF(){
        $category = Category::all();
        $pdf = PDF::loadHTML('Hi Sithu');
        return $pdf->stream('Categoty.pdf');
    }

    public function customers(){
        $customers = User::where('role', '!=', 'Admin')->orWhereNUll('role')->paginate(5)->onEachSide(3);
        //echo "<pre>"; print_r($customers);die;
        return view('product.customersList', compact('customers'));
    }

    public function exportcustomerASExcel(){
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }

    public function exportcustomerAsCSV(){
        return Excel::download(new CustomersExport, 'customers.csv');
    }

    public function exportcustomerAsPDF(){
        $customers = User::all();
        $pdf = PDF::loadHtml('Hi Sithu');
        return $pdf->stream('customers.pdf');
    }

    public function viewAdmins(){
        $admins = User::where('role', '=', 'Admin')->orderBy('created_at','DESC')->paginate(5)->onEachSide(3);
        return view('product.viewAdmins', compact('admins'));
    }

    public function exportAdminASExcel(){
        return Excel::download(new AdminsExport, 'Admins.Xlsx');
    }

    public function exportAdminAsCSV(){
        return Excel::download(new AdminsExport, 'Admins.csv');
    }

    public function exportAdminAsPDF(){
        $admins = User::all();
        $pdf = PDF::loadHtml('Hi Sithu');
        return $pdf->stream('Admins.pdf');
    }

    public function addAdmin(){
        //return view('product.addAdmin');
    }

}
