<?php

namespace App\Http\Controllers;

use App\Models\CustomersLogin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerRegisterController extends Controller
{
    function customer_register(){
        return view('frontend.customer_register');
    }

    function customer_register_store(Request $request){

        CustomersLogin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('register', 'Customer Registerd Successfull!');
       
        // CustomarLogin::insert([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>bcrypt($request->password),
        //     'created_at'=>Carbon::now(),
        // ]);
        // return back ()->with('register', 'Customer Registerd Success!');
    }
}
