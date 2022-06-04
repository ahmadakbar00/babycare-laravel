<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // function addData(Request $request){
    //     $baby= new Baby;
    //     $baby->name = $request->name;
    //     $baby->parent = 1;
    //     $baby->age = $request->age;
    //     $baby->length = $request->length;
    //     $baby->weight = $request->weight;
    //     $baby->gender = $request->gender;

    //     if($baby->save()){
    //         return redirect()->back()->with('success','You are now successfully registered');
    //     }else{
    //         return redirect()->back()->with('error','Failed to register');
    //     }
    // }

    function retrieveData(){
        // $user_id = Auth::user()->id;
        // $data = User::find(user_id);
        // return view('dashboards.users.profile',['data'=>$data]);
    }
}
