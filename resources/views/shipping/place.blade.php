@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th >Product</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $c)
                            <tr>
                                <td scope="row">
                                    <img src="/storage/product_images/{{$c->attributes->image}}" alt="" style="max-width:10rem; max-height: 15rem; width:8rem; height:7rem;">
                                    <br>
                                    <a class="font-weight-bolder mt-1" href="{{route('market.show',$c->attributes->productid)}}">{{ucfirst($c->name)}}</a>                                    
                                </td>

                                <td style="vertical-align:middle">
                                    {{$c->price}}
                                </td>
                                <td style="vertical-align:middle">{{$c->quantity}}</td>
                                <td style="vertical-align:middle">{{$c->price * $c->quantity}}</td>
                                
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <hr>
                <div class="float-right">
                    Total amount is: 
                    <strong>        
                        {{$subTotal}}
                    </strong>
                    <br>
                    <a type="submit" href="{{route('ship.index')}}" class="btn btn-primary" id="checkout">Place order</a>
                </div>
            </div>
        </div>
    </div>

@endsection




