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
                    <div class="row">
                        @foreach ($products as $p)

                            <div class="card text-left mr-2">
                                <img src="/storage/product_images/{{$p->prod_image}}" alt="" style="width:210px; height:200px;">
                                <div class="card-body">
                                    <ul><h4 class="card-title">{{$p->prod_name}}</h4></ul>
                                    <p class="card-text">PHP {{$p->prod_amt}}.00</p>
                                    <small>{{$p->prod_qty}} left</small>
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
