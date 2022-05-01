@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-4">
            <div class="card" style="height: 100%;">
                <img style="height: 200px;" class="card-img-top" src="{{$product->product_img}}" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">{{$product->product_name}}</h4>
                    <p>{{$product->product_des}}</p>
                    <a href="#" class="btn btn-primary">Add To Card</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection