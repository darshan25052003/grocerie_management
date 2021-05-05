<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catogery;

class catogeryController extends Controller
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
            else{
                $catogery = catogery::Paginate(5);
                $username=$request->session()->get('username');
                $capsule =array('username'=>$username);
                return view('catogery',['catogerys'=>$catogery])->with($capsule);
            }
    
       
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
        return view('catogery_add');
       
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $catogery = $request->validate([
            'catogeryName' => 'required|max:255',
            'catogeryStatus' => 'required',
        ]);
        $catogery = new Catogery();
        $catogery->catogeryName = $request->catogeryName;
        $catogery->slug = $request->catogeryName;
        $catogery->catogeryStatus = $request->catogeryStatus;
        $catogery->save();
        $request->session()->flash('status', 'catogery create successful!');
        return redirect('catogery');
     
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
        $catogery=Catogery::find($id);
        return view('catogery_edit',['catogerys'=>$catogery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
       
        $catogery = $request->validate([
            'catogeryName' => 'required|max:255'
        ]);
        $catogery=Catogery::find($id);
        $catogery->catogeryName = $request->catogeryName;
        $catogery->slug = $request->catogeryName;
        $catogery->catogeryStatus = $request->catogeryStatus;
        $catogery->save();
        $request->session()->flash('status', 'catogery updated successful!');
        return redirect('catogery');
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
        $catogery=Catogery::find($id);
        $catogery->delete(); 
        $request->session()->flash('status', 'catogery delete successful!');

        return redirect('catogery');
    }
   
}
