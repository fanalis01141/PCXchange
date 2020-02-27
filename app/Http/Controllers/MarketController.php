<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = \DB::table('products')
            ->select('prod_brand')
            ->groupBy('prod_brand')
            ->get();
        $category = \DB::table('products')
            ->select('prod_category')
            ->groupBy('prod_category')
            ->get();
        $products = Product::where("prod_qty",">",0)->paginate(10);
        return view('market.index', compact('products','brands','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $same_category = Product::where('prod_category', $product->prod_category)->get();
        return view('market.showProduct', compact('product', 'same_category'));
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
    

    public function byCategory(Request $request){
        $requestC = $request->category;
        $brands = \DB::table('products')
        ->select('prod_brand')
        ->groupBy('prod_brand')
        ->get();
        $category = \DB::table('products')
            ->select('prod_category')
            ->groupBy('prod_category')
            ->get();
        $products = Product::where("prod_qty",">",0)->where('prod_category', $request->category)->paginate(10);
        // return redirect()->route('categorized', $requestC)->withCategory();;
    }

    public function addCart(Request $request){

        //set Id for session cart
        $ID = "";
        if(\Auth::check()){
            $ID = \Auth::user()->id;
        }else{
            $ID = session()->getId();
        }

        $product = Product::find($request->productID);
        $rowid = ($request->productID);

        // check if ID is already in cart
        $check = \Cart::session($ID)->get($rowid);
        if($check == null){
            \Cart::session($ID)->add(array(
                'id' => $rowid,
                'name' => $product->prod_name,
                'price' => $product->prod_amt,
                'quantity' => $request->quantity,
                'attributes' => array('image' => $product->prod_image),
                'associatedModel' => 'Product'
            ));

            return response()->json([
                'message' => $product->prod_name . ' added to cart.'
            ]);
        }else{
            \Cart::session($ID)->update($rowid, array(
                'quantity' => $request->quantity, 
            ));

            return response()->json([
                'message' => "Added " . $request->quantity . ' pieces to ' . $product->prod_name
            ]);
        };

    }

    public function myCart(){

        $ID = "";
        if(\Auth::check()){
            $ID = \Auth::user()->id;
        }else{
            $ID = session()->getId();
        }
        // \Cart::session($ID)->clear();


        $cart = \Cart::session($ID)->getContent();
        $subTotal = \Cart::session($ID)->getSubTotal();


        return view ('market.cart', compact('cart', 'subTotal'));
    }


}
