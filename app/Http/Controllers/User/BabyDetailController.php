<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\BabyUserDataTransform;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class BabyDetailController extends Controller
{

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'favorite_color' => 'required',
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    function addData($id){
        dd($id);
        $baby= new Baby;
        $baby->name = $request->name;
        $baby->parent = $id;
        $baby->age = $request->age;
        $baby->length = $request->length;
        $baby->weight = $request->weight;
        $baby->gender = $request->gender;
        // dd($request);

        if($baby->save()){
            return redirect()->back()->with('success','You are now successfully registered');
        }else{
            return redirect()->back()->with('error','Failed to register');
        }
    }

    function retrieveData($id){
        // echo $id;
        $data = Report::find($id);
        return view('users.babyDetail.baby',['data'=>$data]);
            // echo $id;
            $data = Baby::find($id);
            // $data = "aa"
            return view('user.baby',['data'=>$data]);
    

        // $baby= new Baby;
        // $baby->name = $request->name;
        // $baby->parent = 1;
        // $baby->age = $request->age;
        // $baby->length = $request->length;
        // $baby->weight = $request->weight;
        // $baby->gender = $request->gender;
        // // dd($request);

        // if($baby->save()){
        //     return redirect()->back()->with('success','You are now successfully registered');
        // }else{
        //     return redirect()->back()->with('error','Failed to register');
        // }
    }

    function aaa(Request $request){
        // $request->validate([
        //     // 'parent'=> ['required', 'string', 'max:255','email','unique:users'],
        //     'name' => ['required', 'string'],
        //     // 'parent' => '1',
        //     'age' =>['required', 'string'],
        //     'length'=>['required', 'string'],
        //     'weight'=>['required', 'string'],
        //     'gender'=>['required', 'string'],
        //     // 'status'=>['required', 'string'],
        // ]);

        $baby = new Baby();
        $baby->name = 'ahmad';
        // $baby->parent = $request->parent;
        $baby->parent = 1;
        $baby->age = 2;
        $baby->length = 20;
        $baby->weight = 30;
        $baby->gender = 'Laki-laki';
        $baby->save();
        // if($baby->save()){
        //     return redirect()->back()->with('success','You are now successfully registered');
        // }else{
        //     return redirect()->back()->with('error','Failed to register');
        // }

        $query = DB::table('baby')->insert([
            $baby->name = 'ahmad',
            // $baby->parent = $request->parent,
            $baby->parent = 1,
            $baby->age = 2,
            $baby->length = 20,
            $baby->weight = 30,
            $baby->gender = 'Laki-laki',
        ]);

        if($query){
            return redirect()->back()->with('success','You are now successfully registered');
            
        }else{

                        return redirect()->back()->with('error','Failed to register');

        }

    }
}
