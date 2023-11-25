<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    function subcategory(){
        $categories = Category::all();
        $subcategory = Subcategory::all();

        return view('admin.subcategory.subcategory', [
            'categories' =>$categories,
            'subcategory' =>$subcategory,

        ]);
    }

    function subcategory_store(Request $request){

        $request->validate([
            'category_id' => 'required',
            'subcategory_name'=>'required',
            'subcategory_name'=>'unique:subcategories',
        ]);



        Subcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Subcategory Add!');
    }
        
    
}
