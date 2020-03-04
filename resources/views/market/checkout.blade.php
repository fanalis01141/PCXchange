@include('layouts.app')

@section('content')
    
    <div class="container">
        @foreach ($cart as $c)
            {{$c->name}}
        @endforeach
    </div>

@endsection