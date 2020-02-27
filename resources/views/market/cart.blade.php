@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $c)
                            <tr>
                                <td scope="row">{{$c->name}}</td>
                                <td>{{$c->price}}</td>
                                <td>{{$c->quantity}}</td>
                                <td>{{$c->price * $c->quantity}}</td>
                                
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <hr>
                <div class="float-right">

                    Total amount is: {{$subTotal}}
                </div>
            </div>
        </div>
    </div>

@endsection