<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersLoginController extends Controller
{
    function customer_login(Request $request){
        if(Auth::guard('customerlogin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('/');
        }
        else{
            return redirect()->route('customer.login.register');
        }
    }

    function customer_logout(){
        Auth::guard('customerlogin')->logout();
        return redirect()->route('customer.login.register');
    }
}
