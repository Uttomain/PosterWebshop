<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Connect with model for using Eluquent
use App\Product;

class ProductController extends Controller
{

    public function __construct()
    {
        // This codeline take care of auth, and will kick user out if they dont are authorized
        $this->middleware('auth:admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(12);        
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'category' => 'required',
            'disc' => 'required',
            'product_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Uploade
        if($request->hasFile('product_image')){
            // Get filename with the extension
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            // Get Just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('product_image')->getClientOriginalExtension();
           
            // Filename to store
            $fileNameToStore = time().'.'.$extension;
            // Uploade Image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimg.jpg';
        } 


        // Create Post with Eluquant
        $product = new Product;
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->disc = $request->input('disc');

        $product->product_image = $fileNameToStore;
        // $product->user_id = auth()->user()->id;
        $product->save();

        return redirect('/products')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
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
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'category' => 'required',
            'disc' => 'required'
        ]);

        
        // Create with Eluquant
        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->disc = $request->input('disc');
        $product->save();

        return redirect('admin/showproductslist')->with('success', 'Product Updated');
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

}
