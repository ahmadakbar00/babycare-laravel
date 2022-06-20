<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\AdminBaby;
use App\Models\Baby;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DataTriningController extends Controller
{
    function addData(Request $request){
        $baby= new AdminBaby;
        $baby->age = $request->age;
        $baby->length = $request->length;
        $baby->weight = $request->weight;
        $baby->gender = $request->gender;
        $baby->status = $request->status;
        if($baby->save()){
            return redirect()->back()->with('success','You are now successfully registered');
        }else{
            return redirect()->back()->with('error','Failed to register');
        }
    }

    function index($id){
        $data = Baby::find($id);
        dd($data);
        return view('admin.baby',['data'=>$data]);
    }

    function editData(Request $request){
        $data = Baby::find($id);
        dd($request);
        return view('admin.baby',['data'=>$data]);
    }

}
