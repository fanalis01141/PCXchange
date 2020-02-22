@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-size:120%">What do you want to sell, {{Auth::user()->name}}?
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form action="{{route('products.store')}}" id="formSell" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Card of image --}}
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Select image of your product:</strong>
                                    </div>
                                    <div class="card-body">
                                        <img id="blah" src="{{asset('180.png')}}" alt="product image" style="max-height:180px"/>
                                        <input type="file" onchange="readURL(this);" id="prod_image" name="prod_image"/>
                                        <small>PNG / JPG / JPEG / GIF formats only.</small>
                                    </div>
                                </div>
                            </div>
                            {{-- Card of Product Details --}}
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Details of your product:</strong>
                                    </div>
                                    <div class="card-body">
                                        <label for="prod_name">Name:</label>
                                        <input type="text" name="prod_name" id="prod_name" class="form-control" placeholder="Enter product name" required>

                                        <label for="" class="mt-2">Details / Description:</label>
                                        <textarea type="text" name="prod_desc" id= "prod_desc" class="form-control" placeholder="Enter product description" required></textarea>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label for="prod_name" class="mt-2">Amount:</label>
                                                <input type="text" name="prod_amt" id="prod_amt" class="form-control" placeholder="Enter amount" required>
                                            </div>
    
                                            <div class="col-md-3">
                                                <label for="prod_name" class="mt-2">Quantity:</label>
                                                <input type="text" name="prod_qty" id="prod_qty" class="form-control" placeholder="Enter quantity" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="prod_name" class="mt-2">Category:</label>
                                                <select name="prod_category" id="prod_category" class="form-control">  
                                                    <option value=""  disabled selected>- Category -</option>
                                                    <option value="Processor"  >Processor</option>
                                                    <option value="Graphics Card"  >Graphics Card</option>
                                                    <option value="RAM"  >RAM</option>
                                                    <option value="Monitor"  >Monitor</option>
                                                    <option value="Keyboard"  >Keyboard</option>
                                                    <option value="Mouse"  >Mouse</option>
                                                    <option value="Headset"  >Headset</option>
                                                    <option value="Motherboard"  >Motherboard</option>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label for="prod_name" class="mt-2">Brand:</label>
                                                <input type="text" name="prod_brand" id="prod_brand" class="form-control" placeholder="Enter brand" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="float-right">
                                    <button id="btnSell" class="btn btn-success" type="submit">Sell my product</button>
                                </div>
                            </div>
                            {{-- end of details --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}



</script>