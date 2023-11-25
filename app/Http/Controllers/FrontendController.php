<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Thumbnail;
use App\Models\Inventory;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    function welcome(){
        $all_products = Product::orderBy('created_at', 'DESC')->get();
        $categories =Category::all();
        $new_arrivels = Product::latest()->take(4)->get();
        return view ('frontend.index', [
            'all_products'=>$all_products,
            'categories'=>$categories,
            'new_arrivals'=> $new_arrivels,
        ]);
    }

    function product_details($product_slug){
        $product_info = Product::where('slug', $product_slug)->get();
        $thumbnails = Thumbnail::where('product_id',$product_info->first()->id)->get();
        $related_products = Product::where('category_id', $product_info->first()->category_id)->get();
        $avilable_colors = Inventory::where('product_id', $product_info->first()->id)->groupBy('color_id')->selectRaw('sum(color_id) as sum,color_id')->get();


        return view('frontend.product_details',[
            'product_info'=>$product_info,
            'thumbnails'=>$thumbnails,
            'related_products'=>$related_products,
            'avilable_colors'=>$avilable_colors,
        ]);
    }
 
    function getSize(Request $request){
        $str = '<option value="">Choose A Option</option>';
        $Sizes = Inventory::where('product_id', $request->product_id)->where('color_id',$request->color_id)->get();
        foreach($Sizes as $Size){
            $str .= '<option value="">'. $Size->rel_to_size_name.'</option>';
        }
        echo $str ;
    }

    function cart(Request $request){
        $coupon = $request->coupon;
        $message = null;
        $type = null;

        if($coupon == ''){
            $discount = 0;
        }
        else{
            if(Coupon::where ('coupon_name', $coupon)->exists()){
                if(Carbon::now()->format('Y-m-d')> Coupon::where('coupon_name', $coupon)->first()->valitity){
                    $message ='Coupon Code Expierd';
                    $discount = 0;
                }
                else{
                    $discount = 10;
                }
            }
       

        else{
            $message ='Invalid Coupon Code';
            $discount = 0;
        }
    }

        $carts = Cart::where('customer_id', Auth::guard('customerlogin')->id())->get();
        return view('frontend.cart', [
            'carts'=>$carts,
            'discount'=>$discount,
            'message'=>$message,
            'type'=>$type,

        ]);
    }

    function checkout(){
        return view ('frontend.checkout');
    }

}
