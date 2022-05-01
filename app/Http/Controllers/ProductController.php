<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function productList()
    {
        $products = Product::all();
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(1234);
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('product_img')) {
            $destinationPath = 'images/';
            $profileImage = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['product_img'] = "$profileImage";
        }

        Product::create($input);

        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        //
        $request->validate([
            'product_name' => 'required',
        ]);
        $product_img = '';
        $input = $request->all();
        if ($image = $request->file('product_img')) {
            $destinationPath = 'images/';
            $profileImage = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $product_img = $input['product_img'] = "$profileImage";
        } else {
            unset($input['product_img']);
        }
        $product = Product::find($id);
        $product->product_name = $request->input('product_name');
        $product->product_des = $request->input('product_des');
        $product->product_img = $product_img;
        $product->save();
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return "a";
      $product = Product::find($id);
      $product->delete();
    
      return back();
    }
}
