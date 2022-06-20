<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Report;
use App\Models\Baby;
use App\Models\Articles;


class UserController extends Controller
{
    function index(){
        $id = Auth::id();
        $data = Baby::all()->where('parent',$id);
        
        $dataStatus = Report::all()->where('parent_id',$id)->count();
        $countDataStatus = Report::all()->where('parent_id',$id)->count();

        $gender = [];
        $dataBaik = Baby::all()->where('parent',$id)->where('status','=','Baik')->count();
        $dataKurang = Baby::all()->where('parent',$id)->where('status','=','Kurang')->count();
        $dataLebih = Baby::all()->where('parent',$id)->where('status','=','Lebih')->count();
        $dataLakilaki = Baby::all()->where('parent',$id)->where('gender','=','Laki-laki')->count();
        $dataPerempuan = Baby::all()->where('parent',$id)->where('gender','=','Perempuan')->count();
        
        $data2 = Report::all()->where('parent_id',$id);
        $dataLaporanBaik = Report::all()->where('parent_id',$id)->where('status','=','Baik')->count();
        $dataLaporanKurang = Report::all()->where('parent_id',$id)->where('status','=','Kurang')->count();
        $dataLaporanLebih = Report::all()->where('parent_id',$id)->where('status','=','Lebih')->count();

        $dataListBaby =  Baby::where('parent',$id)->orderBy('id','DESC')->get();
        $dataListReport = Report::where('parent_id',$id)->orderBy('id','DESC')->get();

        $dataListReport->merge($dataListBaby);
        // dd($dataListBaby);
        
        return view('users.index',['data'=>$data, 'data2'=>$data2, 'gender'=>$gender,'dataBaik'=>$dataBaik, 'dataKurang'=>$dataKurang,'dataLebih'=>$dataLebih,'dataLakiLaki'=>$dataLakilaki,'dataPerempuan'=>$dataPerempuan,'dataStatus'=>$dataStatus,'dataListReport'=>$dataListReport,'dataLaporanBaik'=>$dataLaporanBaik, 'dataLaporanKurang'=>$dataLaporanKurang,'dataLaporanLebih'=>$dataLaporanLebih]);
    }
    function addBaby(){
        // $id = Auth::id();
        $id = Auth::id();
        $data = Baby::all()->where('parent',$id);
        // $data = User::find($id);
        // dd($data);
        // return view('user.addBaby',['data'=>$data]);
        return view('users.addBaby',['data'=>$data]);
    }
    
    function babyDetail(){
        // $id = Auth::id();
        $id = Auth::id();
        $data = Baby::all()->where('parent',$id);
        // $data = User::find($id);
        // dd($data);
        // return view('users.addBaby',['data'=>$data]);
        return view('users.babyDetail',['data'=>$data]);
    }
    function article(){
        $dataArticle = Articles::all();
        return view('users.article',['dataArticle'=>$dataArticle]);
    }
    function history(){
        $id = Auth::id();
        $data = User::find($id);
        $dataListReport = Report::where('parent_id',$id)->orderBy('id','DESC')->get();
        // dd($data);
        return view('users.history',['dataListReport'=>$dataListReport]);
    }
    function profile(){
        $id = Auth::id();
        $data = User::find($id);
        return view('users.profile',['data'=>$data]);
    }
    function settings(){
        return view('users.settings');
    }
}
