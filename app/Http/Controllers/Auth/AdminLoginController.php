<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');
    }
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        // validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // attemt to log the user in 
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If Successfil, -> redirect to intended location
            return redirect()->intended(route('admin.dashboard'));
        }        
        // if unsuccessful, then rederict back to  the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
