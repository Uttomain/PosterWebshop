<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome To Uttomain";
        return view('pages.index')->with('title', $title); 
    }

    public function products(){
        return view('products.index'); 
    }

    public function omos(){
        return view('pages.omos'); 
    }

    public function kontakt(){
        return view('pages.kontakt'); 
    }
}
