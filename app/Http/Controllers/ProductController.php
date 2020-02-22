<?php

namespace App\Http\Controllers;

use App\Product;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Message;
use \Validator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.sell');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        if($request->hasFile("prod_image")){
            // Create file name
            $fileNameToStore = time().Auth::user()->name."-".$request->file("prod_image")->getClientOriginalName();
            
            // Upload image 
            $request->file("prod_image")->storeAs('public/product_images', $fileNameToStore);
        }else{
            $fileNameToStore = "noimage.png";
        }

        Product::create([
            'user_id' => Auth::user()->id,
            'prod_name' => $request->prod_name,
            'prod_desc' => $request->prod_desc,
            'prod_amt' => $request->prod_amt,
            'prod_qty' => $request->prod_qty,
            'prod_brand' => $request->prod_brand,
            'prod_category' => $request->prod_category,
            'prod_image' => $fileNameToStore,
        ]);

        return ['success' => true, 'message' => 'Your product is now for sale!', 200];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function checkFile(Request $request){
        
    }
}
