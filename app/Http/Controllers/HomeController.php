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
        $products = Product::all();
        //$getMobileComputerProduct = Product::with('getMobileComputerProduct')->get();
        //echo "<pre>";
        //print_r($getRelatedProduct);
       // dd($getMobileComputerProduct);
        return view('Home.index', compact('products'));
    }
}
