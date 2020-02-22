@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Welcome, {{Auth::user()->name}}</h1>
        </div>
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Here are your products on sale
                    <a href="{{route('products.create')}}" class="float-right btn btn-success btn-sm">Sell new items</a>
                </div>
                <div class="card-body">
                    <div class="scrollmenu row ">
                        @foreach ($products as $p)

                            <div class="card ml-3 mr-1 mt-2" style="width: 12rem;">
                                <div class="text-center">
                                    <img class="card-img-top" src="/storage/product_images/{{$p->prod_image}}" alt="Card image cap" style="width:130px; height:120px;">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{strtoupper(str_limit($p->prod_name, 10))}}
                                        </h5>
                                        <p class="card-text">PHP {{$p->prod_amt}}.00</p>
                                        <small>{{$p->prod_qty}} left in stock</small>
                                        
                                </div>
                            </div>                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
