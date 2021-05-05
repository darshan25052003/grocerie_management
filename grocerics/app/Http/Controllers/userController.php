<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class userController extends Controller
{
    //
    public function index()
    {
        return view('login');
      
        
       
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required'
        ]);
        $user = User::where('username','=',$request->username)->where('password','=',$request->password)->get();
            if(count($user) > 0){
                $request->session()->put('id',$user[0]->id);
                $request->session()->put('username',$user[0]->username);
                return  redirect('/catogery');
            }
            else{
                return redirect('login')->with('msg', 'please enter your correct username and password');

  
      }
        
  
    }
    public function create()
    {
       
        return view('register');

    }
    public function store(Request $request)
    {
        $user = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required | min:8',
            'password_repeat' => 'required|same:password'
        ]);
    
        if($request->password==$request->password_repeat){
            $user = new User();
            $user->username = $request->username;
            $user->password = $request->password;
            $user->save();
            return redirect('login')->with('status', 'You have registered successfully. please login ');
            
        }
        else{

            return redirect('register');
                
        }
        

    }
    public function logout(Request $request)
    {
        $request->session()->forget('id');
        $request->session()->forget('username');
        return redirect('login');

    }

}
