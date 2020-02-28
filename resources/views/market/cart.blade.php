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
                    <button type="submit" class="btn btn-primary" id="checkout">Checkout order</button>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="shipping" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shipping details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="{{route('ship.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="col-md-5">
                                <label for="">Contact number</label>
                                <input type="text" class="form-control" placeholder="Enter your contact number" required name="contact">
                            </div>
                            <hr>
                            <div class="col-md-8">
                                <label for="">Shipping address</label>
                                <textarea name="address" id="" cols="30" rows="5" class="form-control" placeholder="Enter shipping address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection