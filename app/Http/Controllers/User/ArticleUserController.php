<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\AdminBaby;
use App\Models\Articles;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ArticleUserController extends Controller
{
    function index(){
        $dataArticle = Articles::all();
        return view('users.article',['dataArticle'=>$dataArticle]);
    }
    function addArticle(Request $request){
        // dd($request);
        $baby= new Articles;
        $baby->title = $request->title;
        $baby->content = $request->content;
        $baby->category = $request->status;

        if($baby->save()){
            return redirect()->back()->with('success','You are now successfully registered');
        }else{
            return redirect()->back()->with('error','Failed to register');
        }
    }

    function users(){
        $data = Baby::find($id);
        dd($data);
        return view('admin.users',['data'=>$data]);
    }



    function aaa(Request $request){
        $baby = new Baby();
        $baby->name = 'ahmad';
        $baby->parent = 1;
        $baby->age = 2;
        $baby->length = 20;
        $baby->weight = 30;
        $baby->gender = 'Laki-laki';
        $baby->save();
        $query = DB::table('baby')->insert([
            $baby->name = 'ahmad',
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
