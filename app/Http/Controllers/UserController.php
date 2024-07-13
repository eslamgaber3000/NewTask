<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
public function viewForm(){

return view('dashboard.user.index');
// echo "hello wrold";
}
public function loginUser(Request $request){

    //catech data 
    $credentials = $request->only('email', 'password');

    $request->validate([
        'email'=>'email | required',
        'password'=>'required'

    ]);
    if(Auth::attempt($credentials)){
     
        return redirect(route("products.all"));
        
    }else{
        
        session()->flash('errors','Invalid credentials. Please try again');
        return redirect('dashboard/login');   
    }

}

}
