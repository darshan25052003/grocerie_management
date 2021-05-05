<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monthly_expense;

class monthlyExpenseController extends Controller
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
        $monthly_expense = monthly_expense::Paginate(5);
        $username=$request->session()->get('username');
        $capsule =array('username'=>$username);
        return view('monthly_expense',['monthly_expenses'=>$monthly_expense])->with($capsule);

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
        return view('monthly_expense_add');

    
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
        $monthly_expense = $request->validate([
            'expenseName' => 'required|max:255',
            'expensePrice' => 'required|numeric',
        ]);
        $monthly_expense = new Monthly_expense();
        $monthly_expense->expenseName = $request->expenseName;
        $monthly_expense->expensePrice = $request->expensePrice;
        $monthly_expense->save();
        $request->session()->flash('status', 'expense create successful!');
        return redirect('monthly_expense');
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
        $monthly_expense=Monthly_expense::find($id);
        return view('monthly_expense_edit',['monthly_expenses'=>$monthly_expense]);
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
        $monthly_expense = $request->validate([
            'expenseName' => 'required|max:255',
            'expensePrice' => 'required|numeric',
        ]);
        $monthly_expense=Monthly_expense::find($id);
        $monthly_expense->expenseName = $request->expenseName;
        $monthly_expense->expensePrice = $request->expensePrice;
        $monthly_expense->save();
        $request->session()->flash('status', 'expense update successful!');
        return redirect('monthly_expense');
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
        $monthly_expense=Monthly_expense::find($id);
        $monthly_expense->delete(); 
        $request->session()->flash('status', 'expense delete successful!');
        return redirect('monthly_expense');
    }
}
