<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data['title']='Login';
        return view('login',$data);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=>'required|min:6',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            if(auth()->user()->status=='Active')
            {
                return redirect()->intended('dashboard');
            }
            else{
                auth()->logout();
                session()->flash('error','Account deactive');
            }

        }
        else{
            session()->flash('error','Email or password invalid');
        }
        return redirect('/');
    }
}
