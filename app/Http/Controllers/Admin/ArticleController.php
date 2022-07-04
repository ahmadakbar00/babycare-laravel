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

class ArticleController extends Controller
{
    function index(){
        $dataArticle = Articles::all();
        return view('admin.article',['dataArticle'=>$dataArticle]);
    }
    function addArticle(Request $request){
        // dd($request);
        $id = Auth::id();
        $baby= new Articles;
        $baby->title = $request->title;
        $baby->user_id = $id;
        $baby->content = $request->content;
        $baby->category = $request->status;

        if($baby->save()){
            return redirect()->back()->with('success','Artikel Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Failed to register');
        }
    }

    function dataArticle($id){
        // $id = Auth::id();
        $dataArticle = Articles::find($id);
        return view('admin.editDataArticle',['dataArticle'=>$dataArticle]);
    }

    function updateDataArticle(Request $request){
        $dataArticle = Articles::find($request->id);
        $dataArticle->title = $request->title;
        $dataArticle->content = $request->content;
        $dataArticle->category = $request->category;
        if($dataArticle->save()){
            return redirect('admin/article')->with('success','Data Artikel Berhasil Di Update');
        }else{
            return redirect()->back()->with('error','Terdapat yang salah');
        }
    }

    function deleteDataArticle(Request $request){

        $datArticle = Articles::find($request->id);
        if($datArticle->delete()){
            return redirect('admin/article')->with('success','Data Artikel berhasil dihapus');
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
