<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Product;


use Illuminate\Http\Request;

class AdminController extends Controller 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**     
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }

    // @return \Illuminate\Http\Response

    public function showProductsList(){
        $products = Product::orderBy('created_at', 'desc')->paginate(12);        
        return view('admin.products.show_products_list')->with('products', $products);
    }

    
}
