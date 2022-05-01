@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::user()->role_id == 1)
    <h2>Products</h2>
    <a href="{{route('create')}}" class="btn btn-primary">Add New</a>
    <a href="{{url('send-mail')}}" class="btn btn-xs btn-info pull-right">Send Mail</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    <img src="{{$product->product_img}}" alt="product image" style="width: 150px; height:100px">
                </td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_des}}</td>
                <td>
                    <div class="row">
                        <div class="col" style="margin-right:-50%">
                            <a class ="btn btn-warning" href="{{route('edit', $product->product_id)}}">Edit</a>
                        </div>
                        <div class="col">
                            <form action="{{ route('destroy' , $product->product_id) }}" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger save-cancel" name="confirm_delete">delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h1>Please login as admin</h1>
    @endif
</div>
@endsection