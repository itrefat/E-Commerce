<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Image;





class UserController extends Controller
{
    function user(){
        $users = User::all();
        $total_user = User::count();

        
        return view ('admin.user.user_list', compact('users','total_user'));
    }

    function delete($user_id){
        User::find($user_id)->delete();
        return back()->with('delete', 'User delete success!');
    }

    function profile(){
        return view ('admin.user.profile');
    }

    function name_change(){
        
    echo"done";

        
    }

    function password_change(Request $request){
        $request->validate([
            'old_password'=> 'required',
            'password'=> ['required', Password::min(8)->letters()->numbers()],
            'password_confirmation'=> 'required',

        ]);

        if(Hash::check($request->old_password, Auth::user()->password)){
            user::find(Auth::id())->update([
                'password'=>bcrypt($request->password),
            ]);
            return back()->with('success','password changed successful');
        }
        else{
            return back()->with('Wrong', 'chek password again');
        }

    }

    function photo_change(Request $request){
        $profile_photo= $request->profile_photo;

        if(Auth::user()->profile_photo != 'defult.jpg'){
            $path = public_path('uploads/user/'.Auth::user()->profile_photo);
            unlink($path);

            $extension = $profile_photo->getClientOriginalExtension();
            $file_name = Auth::id().'.'.$extension;            
            $img = Image::make($profile_photo)->save(public_path('uploads/user/'.$file_name));
                    User::find(Auth::id())->update([
                        'profile_photo'=>$file_name,
                    ]);
                    return back()->with('photo_success','photo changed successful');


        }

        else{

        }
    }
}
 

