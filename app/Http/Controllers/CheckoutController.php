<?php

namespace App\Http\Controllers;

use App\Mail\CustomerInvoice;
use App\Models\Billing;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    function order_store(Request $request){
        if ($request->payment_method ==1){
            $order_id = Order::insertGetId([
                'customer_id'=>Auth::guard('customerlogin')->id(),
                'sub_total'=>$request->sub_total,
                'delivery'=>$request->delivery,
                'total'=>$request->sub_total+($request->delivery),
                'created_at'=>Carbon::now(),
            ]);
            
            Billing::insert([
                'order_id'=>$order_id,
                'customer_id'=>Auth::guard('customerlogin')->id(),
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'country'=>$request->country,
                'city'=>$request->city,
                'address'=>$request->address,
                'company'=>$request->company,
                'notes'=>$request->notes,
                'created_at'=>Carbon::now(),
            ]);
            
            

            $carts = Cart::where('customer_id', Auth::guard('customerlogin')->id())->get();
            foreach($carts as $cart){
                OrderProduct::insert([
                    'order_id'=>$order_id,
                    'customer_id'=>Auth::guard('customerlogin')->id(),
                    'product_id'=>$cart->product_id,
                    'price'=>$cart->rel_to_product->after_discount,
                    'quantity'=>$cart->quantity,
                    'created_at'=>Carbon::now(),

                ]);
                Mail::to($request->email)->send(new CustomerInvoice($order_id));
                // Cart::find($cart->id)->delete();
            }
            return redirect()->route('order.success')->with('ordersuccess', 'your order successfully placed!' );

        }
        else if ($request->payment_method ==2){
            echo 'ssl';
        }
        else {
            echo 'script';
        }
    }


    function order_success(){
        return view('frontend.ordersuccess');
    }
}
