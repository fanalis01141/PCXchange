<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check = \Auth::check();
        if($check){
            if(Shipping::where('user_id', \Auth::user()->id)->exists()){
                return redirect()->route('placeOrder');
            }else{
                return view('shipping.details');
            }
            return redirect()->back();
        }else{
            $sessioncheck = session()->get('checkoutStatus');{
                if ($sessioncheck){
                    return redirect()->route('placeOrder');
                }else{
                    session()->put('checkoutStatus', 'SNR'); //Session with no record
                    return view('shipping.details');
                }
            }
        }
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
        $check = \Auth::check();
        if($check){
            Shipping::create([ // Store to db if user is authenticated
                'user_id' => \Auth::user()->id,
                'phone_number' => $request->contact,
                'address' => $request->address,
            ]);
        }else{
            session([ // Store to session if user is unauthenticated
                'phone_number' =>  $request->contact,
                'address' => $request->address,
            ]);
        }
        return redirect()->route('placeOrder');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }

    public function checkout(){
        $ID = "";
        if(\Auth::check()){
            $ID = \Auth::user()->id;
        }else{
            $ID = session()->getId();
        }
        $cart = \Cart::session($ID)->getContent();
        $subTotal = \Cart::session($ID)->getSubTotal();

        return view('market.checkout', compact('cart', 'subTotal'));
    }

    public function placeOrder(){
        $ID = "";
        if(\Auth::check()){
            $ID = \Auth::user()->id;
        }else{
            $ID = session()->getId();
        }
        $cart = \Cart::session($ID)->getContent();
        $subTotal = \Cart::session($ID)->getSubTotal();

        return view('shipping.place', compact('cart', 'subTotal'));
    }
}
