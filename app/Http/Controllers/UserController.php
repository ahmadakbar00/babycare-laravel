<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Baby;

class UserController extends Controller
{
    function index(){
        $id = Auth::id();
        $data = Baby::all()->where('parent',$id);
        // dd($data);
        return view('dashboards.users.index',['data'=>$data]);
    }

    function profile(){
        $id = Auth::id();
        $data = User::find($id);
        // dd($data);
        return view('dashboards.users.profile',['data'=>$data]);
    }

    function settings(){
        return view('dashboards.users.settings');
    }
    function babyDetail(){
        return view('dashboards.users.babyDetail');
    }
}
