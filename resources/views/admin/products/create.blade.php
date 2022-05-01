@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data" style="width: 60%;">
        @csrf
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" class="form-control" placeholder="Product Name" required>
        </div>
        <div class="form-group">
            <label for="product_img">Product Image:</label>
            <input type="file" name="product_img" class="form-control" placeholder="Product Image">
        </div>
        <div class="form-group">
            <label for="product_des">Product Description:</label>
            <textarea class="form-control" name="product_des" id="product_des" cols="10" rows="5"></textarea>
        </div><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection