@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('update', $product->product_id)}}" method="POST" enctype="multipart/form-data" style="width: 60%;">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control" placeholder="Product Name" required>
        </div><br>
        <div class="form-group">
            <label for="product_img">Product Image:</label>
            <img src="/{{$product->product_img}}" alt="product image" style="width: 150px; height:100px"><br><br>
            <input type="file" product name="product_img" class="form-control" placeholder="Product Image">
        </div>
        <div class="form-group">
            <label for="product_des">Product Description:</label>
            <textarea class="form-control" name="product_des" id="product_des" cols="10" rows="5">{{$product->product_des}}</textarea>
        </div><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection