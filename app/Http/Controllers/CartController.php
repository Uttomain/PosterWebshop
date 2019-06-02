<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('pages.cart');
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /* SHOPPING CART */
    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = $request->session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect('/products');
        
    }

    /* Reduce Product */

    public function getReduceByOne($id){
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0 ){
            session()->put('cart', $cart);
        } else {
            session()->flush('cart');
        }  
        return redirect()->route('shopping.cart');
    }

    /* Remove Items */
    public function getRemoveItem($id){
        $oldCart = session()->has('cart') ? session()->get('cart') : null;        
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        
        if(count($cart->items) > 0 ){
            session()->put('cart', $cart);
        } else {
            session()->flush('cart');
        }
               

        return redirect()->route('shopping.cart');
    }



     /* Get Cart */

     public function getCart(){
        if(!session()->has('cart')){
            return view('pages.cart');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        return view('pages.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

     }

     

     /* Get CheckOut */

     public function getCheckOut(){
        if(!session()->has('cart')){
            return view('pages.cart');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('pages.checkout', ['total' => $total]);  
     }

     /* Post CheckOut */

     public function postCheckOut(Request $request){
        if(!session()->has('cart')){
            return view('pages.cart');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        
       

        $order = new Order();
        $order->cart = serialize($cart);
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->tlfnr = $request->input('tlfnr');

        Auth()->user()->orders()->save($order);

        session()->flush('cart');
        return redirect('/products')->with('success', 'Betaling fuldført!');
     }

    

}



 // Stripe::setApiKey('SECRET KEY FROM STRIPE');
        // try{
        //     Charge::create(array(
        //         "amount" => $cart->totalPrice * 100,
        //         "currency" => "dkk",
        //         "source" => $request->input('stripeToken'), // obtained with Stripe.Js
        //         "discription" => "Test"
        //     ));
        // } catch (\Exeption $e) {
        //     return redirect()->route('checkout')->with('error', $e->getMessage());
        // }
