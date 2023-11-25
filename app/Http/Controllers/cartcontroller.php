<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class cartcontroller extends Controller
{
    function cart_store(Request $request){
        Cart::insert([
            'customer_id'=>Auth::guard('customerlogin')->id(),
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'quantity'=>$request->quantity,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('cart', 'cart add!');
    }

    function cart_remove($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }
}
