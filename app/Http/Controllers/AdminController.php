<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminBaby;
use App\Models\User;
use App\Models\Baby;
use App\Models\Report;

class AdminController extends Controller
{
    function index(){
        // $id = Auth::id();
        // $dataTraining = AdminBaby::all();

        $id = Auth::id();
        // $data = Baby::all()->where('parent',$id);
        $data = Baby::all();
        
        $dataStatus = Report::all()->count();
        $countDataStatus = Report::all()->count();

        $gender = [];
        $dataBaik = Baby::all()->where('status','=','Baik')->count();
        $dataKurang = Baby::all()->where('status','=','Kurang')->count();
        $dataLebih = Baby::all()->where('status','=','Lebih')->count();
        $dataLakilaki = Baby::all()->where('gender','=','Laki-laki')->count();
        $dataPerempuan = Baby::all()->where('gender','=','Perempuan')->count();
        $data2 = Report::all();

        // $dataListBaby =  Baby::all()->orderBy('id','DESC')->get();
        // $dataListReport = Report::all()->orderBy('id','DESC')->get();
        $dataListBaby =  Baby::all();
        $dataListReport = Report::all();

        $dataListReport->merge($dataListBaby);

        return view('admin.index',['data'=>$data, 'data2'=>$data2, 'gender'=>$gender,'dataBaik'=>$dataBaik, 'dataKurang'=>$dataKurang,'dataLebih'=>$dataLebih,'dataLakiLaki'=>$dataLakilaki,'dataPerempuan'=>$dataPerempuan,'dataStatus'=>$dataStatus,'dataListReport'=>$dataListReport]);

    }

    function dataTrainingMenu(){
        $id = Auth::id();
        $dataTraining = AdminBaby::all();
        return view('admin.dataTraining',['dataTraining'=>$dataTraining]);
    }
    
    function dataTraining($id){
        // $id = Auth::id();
        $dataTraining = AdminBaby::find($id);
        // dd($dataTraining);
        return view('admin.editDataTraining',['dataTraining'=>$dataTraining]);
    }

    function addDataTraining(Request $request){
        $dataTraining = new AdminBaby;
        $dataTraining->age = $request->age;
        $dataTraining->length = $request->length;
        $dataTraining->weight = $request->weight;
        $dataTraining->gender = $request->gender;
        $dataTraining->status = $request->status;
        if($dataTraining->save()){
            // return view('admin.index',['dataTraining'=>$dataTraining]);
            return redirect()->back()->with('success','Data Training Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error','Terdapat yang salah');
        }
    }

    function editDataTraining(Request $request){
        $dataTraining = AdminBaby::find($request->id);
        $dataTraining->age = $request->age;
        $dataTraining->length = $request->length;
        $dataTraining->weight = $request->weight;
        $dataTraining->gender = $request->gender;
        $dataTraining->status = $request->status;
        if($dataTraining->save()){
            $id = Auth::id();
            $dataTraining = AdminBaby::all();
            return view('admin.index',['dataTraining'=>$dataTraining]);
        }else{
            return redirect()->back()->with('error','Terdapat yang salah');
        }
    }

    function updateDataTraining(Request $request){
        $dataTraining = AdminBaby::find($request->id);
        $dataTraining->age = $request->age;
        $dataTraining->length = $request->length;
        $dataTraining->weight = $request->weight;
        $dataTraining->gender = $request->gender;
        $dataTraining->status = $request->status;
        if($dataTraining->save()){
            return redirect('admin/data-training')->with('success','Data Training Berhasil Di Update');
        }else{
            return redirect()->back()->with('error','Terdapat yang salah');
        }
    }
    
    function deleteDataTraining(Request $request){

        $dataTraining = AdminBaby::find($request->id);
        if($dataTraining->delete()){
            return redirect('admin/data-training')->with('success','Data berhasil dihapus');
           }else{
            return redirect()->back()->with('error','Failed to register');
           }
    }

    function dataUser($id){
        $dataUser = User::find($id);
        // dd($dataUser);
        return view('admin.editDataUser',['dataUser'=>$dataUser]);
    }

    function updateDataUser(Request $request){
        $dataUser = User::find($request->id);
        $dataUser->name = $request->name;
        $dataUser->email = $request->email;
        if($request->role == "Admin"){
            $dataUser->role = 1;
        }else{
            $dataUser->role = 2;
        }
        if($dataUser->save()){
            return redirect('admin/users')->with('success','Data User Berhasil Di Update');
        }else{
            return redirect()->back()->with('error','Terdapat yang salah');
        }
    }
    
    function deleteDataUser(Request $request){

        $dataUser = User::find($request->id);
        if($dataUser->delete()){
            return redirect('admin/users')->with('success','Data berhasil dihapus');
           }else{
            return redirect()->back()->with('error','Failed to register');
           }
    }

    function profile(){
        return view('admin.profile');
    }

    function settings(){
        return view('admin.settings');
    }
}
