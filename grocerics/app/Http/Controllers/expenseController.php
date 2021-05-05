<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class expenseController extends Controller
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
        $expense = expense::Paginate(5);
        $username=$request->session()->get('username');
        $capsule =array('username'=>$username);
        return view('expense',['expenses'=>$expense])->with($capsule);
      
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
        return view('expense_add');

      
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
        $expense = $request->validate([
            'expenseName' => 'required|max:255',
            'expensePrice' => 'required|numeric',
        ]);
        $expense = new Expense();
        $expense->expenseName = $request->expenseName;
        $expense->expensePrice = $request->expensePrice;
        $expense->save();
        $request->session()->flash('status', 'expense create successful!');
        return redirect('expense');
           
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
        if($request->session()->get('username')==''){
            return redirect('login');
        }
        $expense=expense::find($id);
        return view('expense_edit',['expenses'=>$expense]);
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
        $expense = $request->validate([
            'expenseName' => 'required|max:255',
            'expensePrice' => 'required|numeric',
        ]);
        $expense=Expense::find($id);
        $expense->expenseName = $request->expenseName;
        $expense->expensePrice = $request->expensePrice;
        $expense->save();
        $request->session()->flash('status', 'expense update successful!');

        return redirect('expense');
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
        $expense=Expense::find($id);
        $expense->delete(); 
        $request->session()->flash('status', 'expense delete successful!');
        return redirect('expense');
    }
}
