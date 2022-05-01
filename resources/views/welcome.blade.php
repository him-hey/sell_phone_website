@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-6">
            <h2>Welcome to Sell software website!</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique distinctio aliquam voluptatem reprehenderit quia odio? Rerum excepturi earum facere quae. Minima pariatur consequuntur iste ut ratione ducimus molestiae eum dolores!</p>
            <a class="btn btn-primary" href="{{ route('register') }}">Sign Up Now!</a>
        </div>
        <div class="col-6"></div>
    </div>
</div>
@endsection