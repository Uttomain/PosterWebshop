<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $orders = auth()->user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('dashboard')->with('posts', $user->posts)->with('orders', $orders);
    }
}
