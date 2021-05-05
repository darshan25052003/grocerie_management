<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class stockController extends Controller
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
        $stock = Stock::Paginate(5);
        $username=$request->session()->get('username');
        $capsule =array('username'=>$username);
        return view('stock',['stocks'=>$stock])->with($capsule);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if($request->session()->get('username')==''){
            return redirect('login');
        }
        return view('stock_add');
      
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
        $stock = $request->validate([
            'StockName' => 'required|max:255',
            'avaliable_quantity' => 'required|numeric'
        ]);
        $stock = new Stock();
        $stock->StockName = $request->StockName;
        $stock->avaliable_quantity = $request->avaliable_quantity;
        $stock->save();
        $request->session()->flash('status', 'stock create successful!');
        return redirect('stock');
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
        $stock=Stock::find($id);
        return view('stock_edit',['stocks'=>$stock]);
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
        $stock = $request->validate([
            'StockName' => 'required|max:255',
            'avaliable_quantity' => 'required|numeric'
        ]);
        $stock=Stock::find($id);
        $stock->StockName = $request->StockName;
        $stock->avaliable_quantity = $request->avaliable_quantity;
        $stock->save();
        $request->session()->flash('status', 'stock update successful!');
        return redirect('stock');
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
        $stock=Stock::find($id);
        $stock->delete(); 
        $request->session()->flash('status', 'stock delete successful!');
        return redirect('stock');
    }
}
