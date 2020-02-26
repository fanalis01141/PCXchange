@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/storage/product_images/{{$product->prod_image}}" alt="" class="ml-4" style="width:25rem; height:20rem; max-width:25rem; max-height:20rem;">
                <input type="text" hidden value="{{$product->id}}" class="itemID">
            </div>
            <div class="col-md-6">
                <h1>
                    {{$product->prod_name}}
                </h1>
                <hr>
                    
                    <div class="col-md-6">
                        <div class="row">
                            <div class="text-left">
                                <h3>₱ {{$product->prod_amt}}.00<h3>
                            </div>
                            <div class="text-right">
                                <h5 class="ml-3 mt-1">{{$product->prod_qty}} pieces left</h5>
                            </div>
                        </div>
                    </div>
                <br>
                <div class="col-md-6">
                    <div class="row">
                        <label>Quantity:</label>
                        <input type="number" name="" id="" min="1" value="0" max="999" class="form-control">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                        <button type="submit" class="btn btn-success ml-3">Buy Now</button>
                    </div>
                    
                </div>
                <hr>
                <p class="font-weight-bolder">
                    Product description: <br>
                </p>
                {{$product->prod_desc}}
            </div>
        </div>
        <hr>
        <h3>You might also like these products</h3>
        <div class="row">
            @foreach ($same_category as $same)
                <div class="card ml-3 mr-1 mt-2" style="width: 12rem;">
                    <div class="text-center">
                        <img class="card-img-top" src="/storage/product_images/{{$same->prod_image}}" alt="Card image cap" style="width:130px; height:120px;">
                    </div>
                    <div class="card-body">
                        <a href="{{route('market.show', $same->id)}}">
                            <h5 class="card-title">{{strtoupper(str_limit($same->prod_name, 10))}}
                        </a>
                        </h5>
                        <p class="card-text">PHP {{$same->prod_amt}}.00</p>
                        <small>{{$same->prod_qty}} left in stock</small>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-success btn-block">Buy Now</button>
                            <button class="btn btn-sm btn-primary btn-block">Add to Cart</button>
                        </div>
                    </div>
                </div>     
            @endforeach
        </div>
    </div>
@endsection
