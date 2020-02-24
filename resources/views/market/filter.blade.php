@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card text-center">
                <div class="card-header">Categories</div>
                <div class="card-body text-center">
                    <div class="row">
                        
                        @foreach ($category as $c)
    
                            <form action="{{route('market.byCategory', $c->prod_category)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-secondary mb-1 ml-1" name="category" value="{{$c->prod_category}}" style="font-size:0.7rem;">
                                    {{$c->prod_category}}
                                </button>
                            </form>
    
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card text-center mt-3">
                <div class="card-header">Brands</div>
                <div class="card-body text-center">
                    @foreach ($brands as $b)
                        <a href="">
                            {{ucfirst($b->prod_brand)}}
                        </a>
                        <br>

                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Showing all products for {{$requestC}}</div>
                <div class="card-body">
                    <div class="scrollmenu row ">
                        @foreach ($products as $p)

                            <div class="card ml-3 mr-1 mt-2" style="width: 12rem;">
                                <div class="text-center">
                                    <img class="card-img-top" src="/storage/product_images/{{$p->prod_image}}" alt="Card image cap" style="width:130px; height:120px;">
                                </div>
                                <div class="card-body">
                                    <a href="">
                                        <h5 class="card-title">{{strtoupper(str_limit($p->prod_name, 10))}}
                                    </a>
                                    </h5>
                                    <p class="card-text">PHP {{$p->prod_amt}}.00</p>
                                    <small>{{$p->prod_qty}} left in stock</small>
                                    <div class="card-footer">
                                        <button class="btn btn-sm btn-success btn-block">Buy Now</button>
                                        <button class="btn btn-sm btn-primary btn-block">Add to Cart</button>
                                    </div>
                                </div>
                            </div>                            
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
