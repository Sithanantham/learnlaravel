<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mobComItems = Category::with('products')->where('id', '=', '1') -> get();
        $products = Product::paginate(5)->onEachSide(3);
        //echo "<pre>"; print_r($mobComItems); die;
        //$getMobileComputerProduct = Product::with('getMobileComputerProduct')->get();
        //echo "<pre>";
        //print_r($getRelatedProduct);
       // dd($getMobileComputerProduct);
        return view('Home.index', compact('products', 'mobComItems'));
    }

    public function mobilesAndComputers(){
        $mobileAndComputerItems = Category::with('products')->where('id', '=', '1') -> get();
        //dd($get);
        return view('Home.mobilesAndComputers', compact('mobileAndComputerItems'));
    }

    public function buyIt($id){
      //  dd($id);
        $buyit = Product::where('id', '=', $id)->get();
        //dd($buyit);
        return view('Home.buyIt', compact('buyit'));
    }

    public function payment($id){
        $amount = Product::where('id', '=', $id)->get();
        //echo "<pre>"; print_r($amount); die;
        return view('Home.payment', compact('amount'));
        //return "paypal payment integration";
    }
}
