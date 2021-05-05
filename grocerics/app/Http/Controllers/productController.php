<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Catogery;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->session()->get('username')==''){
            return redirect('login');
        }
        $product = product::Paginate(5);
        $username=$request->session()->get('username');
        $capsule =array('username'=>$username);
        $catogery = Catogery::all();
        return view('product',['products'=>$product,'catogerys'=>$catogery])->with($capsule);

        // return view('product',['products'=>$product])->with($capsule);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->session()->get('username')==''){
            return redirect('login');
        }
        $catogery = Catogery::all();
        return view('product_add',['catogerys'=>$catogery]);
        //
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = $request->validate([
            'productName' => 'required|max:255',
            'productStatus' => 'required',
            'productPrice' => 'required|numeric',
            'productDescription' => 'required|max:255',
            'catogery' => 'required'
        ]);
        $product = new Product();
        $product->productName = $request->productName;
        $product->slug = $request->productName;
        $product->productStatus = $request->productStatus;
        $product->productPrice = $request->productPrice;
        $product->productDescription = $request->productDescription;
        $product->catogery = $request->catogery;
        $product->save();
        $request->session()->flash('status', 'product create successful!');

        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        if($request->session()->get('username')==''){
            return redirect('login');
        }
        $product=Product::find($id);
        $catogery = Catogery::all();
        return view('product_edit',['products'=>$product,'catogerys'=>$catogery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = $request->validate([
            'productName' => 'required|max:255',
            'productStatus' => 'required',
            'productPrice' => 'required|numeric',
            'productDescription' => 'required|max:255',
            'catogery' => 'required'
        ]);
        $product=Product::find($id);
        $catogery=Catogery::find($id);
        $catogery->catogeryName = $request->catogery;
        $product->productName = $request->productName;
        $product->slug = $request->productName;
        $product->productPrice = $request->productPrice;
        $product->productDescription = $request->productDescription;
        $product->catogery = $request->catogery;
        $product->save();
        $request->session()->flash('status', 'product updated successful!');
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $product=Product::find($id);
        $product->delete(); 
        $request->session()->flash('status', 'product delete successful!');
        return redirect('product');
    }
}
