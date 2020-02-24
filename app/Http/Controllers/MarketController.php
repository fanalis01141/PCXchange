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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('market.filter', compact('products','brands','category', 'requestC'));
        // return redirect()->action('MarketController@showChosen', ['products' => $products, 'brands' => $brands, 'category' => $category]);

    }

    public function showChosen(){
        return view('market.filter');
    }


}
