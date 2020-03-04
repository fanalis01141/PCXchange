@extends('layouts.app')


@section('content')
    
    <div class="container">
        <h1>SHIPPING DETAILS</h1>

        <div class="col-md-5 offset-3 text-center">
            <form action="{{route('ship.store')}}" method="POST">
                @csrf
                <div class="col-md-12">
                    <label for="">Contact number</label>
                    <input type="text" class="form-control" placeholder="Enter your contact number" required name="contact">
                </div>
                <hr>
                <div class="col-md-12">
                    <label for="">Shipping address</label>
                    <textarea name="address" id="" cols="30" rows="5" class="form-control" placeholder="Enter shipping address"></textarea>
                </div>
                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-success">Save Shipping Details</button>
                </div>
            </form>
        </div>
    </div>

@endsection