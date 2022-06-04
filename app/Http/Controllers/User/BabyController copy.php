<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Baby;
use App\Models\BabyUserDataTransform;
use App\Models\AdminBabyDataTransform;
use App\Models\AdminBabyRule;
use App\Models\AdminRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BabyController extends Controller
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

    function addData(Request $request){ 
        $parent_id = Auth::id();
        $baby= new Baby;
        $baby->name = $request->name;
        $baby->parent = $parent_id;
        $baby->age = $request->age;
        $baby->length = $request->length;
        $baby->weight = $request->weight;
        $baby->gender = $request->gender;
        // $baby->gender = $request->gender;
        // dd($request);
        
        if($baby->save()){
            $babyTransform = new BabyUserDataTransform;
            $adminBabyTransform = AdminBabyDataTransform::all();


            $babyRule = AdminRule::all();
            //get id transsform
            $age_transform_min = $babyRule[0]->id;
            $age_transform_mid = $babyRule[1]->id;
            $age_transform_max = $babyRule[2]->id;

            $weight_transform_min = $babyRule[3]->id;
            $weight_transform_mid = $babyRule[4]->id;
            $weight_transform_max = $babyRule[5]->id;
            
            $length_transform_min = $babyRule[6]->id;
            $length_transform_mid = $babyRule[7]->id;
            $length_transform_max = $babyRule[8]->id;
            
            $status_transform_min = $babyRule[9]->id;
            $status_transform_mid = $babyRule[10]->id;
            $status_transform_max = $babyRule[11]->id;
            
            // add to transform
            $age1_min = $babyRule[0]->min;
            $age1_max = $babyRule[0]->max;
            $age2_min = $babyRule[1]->min;
            $age2_max = $babyRule[1]->max;
            $age3_min = $babyRule[2]->min;
            $age3_max = $babyRule[2]->max;

            $weight1_min = $babyRule[3]->min;
            $weight1_max = $babyRule[3]->max;
            $weight2_min = $babyRule[4]->min;
            $weight2_max = $babyRule[4]->max;
            $weight3_min = $babyRule[5]->min;
            $weight3_max = $babyRule[5]->max;

            $length1_min = $babyRule[6]->min;
            $length1_max = $babyRule[6]->max;
            $length2_min = $babyRule[7]->min;
            $length2_max = $babyRule[7]->max;
            $length3_min = $babyRule[8]->min;
            $length3_max = $babyRule[8]->max;

            $status1 = $babyRule[9]->description;
            $status2 = $babyRule[10]->description;
            $status3 = $babyRule[11]->description;

            ///! INI NANTI PERLU DIMASUKAN KE DATABASE BABY USER TRANFORM
            //transform umur input berdasarkan rulenya
            $age_transform=0;
            if($request->age > $age1_min && $request->age < $age1_max ){
                $age_transform=$babyRule[0]->id;
            }
            else if($request->age > $age2_min && $request->age < $age2_max ){
                $age_transform=$babyRule[1]->id;
            }
            else if($request->age > $age3_min && $request->age < $age3_max ){
                $age_transform=$babyRule[2]->id;
            }
            // dd($age_transform);

            //transform berat input berdasarkan rulenya
            $weight_transform=0;
            if($request->weight > $weight1_min && $request->weight < $weight1_max ){
                $weight_transform=$babyRule[3]->id;
            }
            else if($request->weight > $weight2_min && $request->weight < $weight2_max ){
                $weight_transform=$babyRule[4]->id;
            }
            else if($request->weight > $weight3_min && $request->weight < $weight3_max ){
                $weight_transform=$babyRule[5]->id;
            }
            // dd($weight_transform);

            //transform panjang input berdasarkan rulenya
            $length_transform=0;
            if($request->length > $length1_min && $request->length < $length1_max ){
                $length_transform=$babyRule[6]->id;
            }
            else if($request->length > $length2_min && $request->length < $length2_max ){
                $length_transform=$babyRule[7]->id;
            }
            else if($request->length > $length3_min && $request->length < $length3_max ){
                $length_transform=$babyRule[8]->id;
            }
            // dd($length_transform);

            ///Add to Baby Transform
            // $babyTransform->name = $request->name;
            // $babyTransform->parent = $parent_id;
            // $babyTransform->age = $request->age;
            // $babyTransform->length = $request->length;
            // $babyTransform->weight = $request->weight;
            // $babyTransform->gender = $request->gender;
            // 'baby_id',
            // 'age',
            // 'length',
            // 'weight',
            // 'gender',
            // 'status',
            

            // Hitung status gizi
            // Get data transform admin baby
            // Hitung dengan naive bayes
            // Hasil status gizi masukan ke $status
            // Masukan status ke table baby, table data baby update, dan table transform
            
            // dd($length_transform);
            // dd($request->age);

            // $adminBabyRule = AdminBabyRule::all();
            $transformId=array();
            $transformAge=array();
            $transformstatus=array();
            $transform_maxstatus_maxweight=array();
            $transform_maxstatus_midweight=array();
            $transform_maxstatus_maxweight=array();
   
            $transform_midstatus_maxweight=array();
            $transform_midstatus_midweight=array();
            $transform_midstatus_maxweight=array();
   
            $transform_minstatus_maxweight=array();
            $transform_minstatus_midweight=array();
            $transform_minstatus_maxweight=array();
   
            foreach ($adminBabyTransform as $data) { // MAU MENGAMBIL DATA ADMIN BAYI TRANSFORM UNTUK DIGUNAKAN SEBAGAI PERHITUNGAN NAIVE BAYES
                dd($data);
                //transform_maxstatus_maxweight
                if($data->status == $status_transform_max && $data->age == $age_transform_min ){
                    array_push($transform_maxstatus_maxweight, $data->id );
                    // echo("hei:"+$data->id);
                    echo "hgfdsa";
                }
                //transform_maxstatus_maxweight
                else if($data->status == $status_transform_max && $data->age == $age_transform_min ){
                    array_push($transform_maxstatus_maxweight, $data->id );
                    echo($data->id);
                }
                //transform_maxstatus_maxweight
                else if($data->status == $status_transform_max && $data->age == $age_transform_min ){
                    array_push($transform_maxstatus_maxweight, $data->id );
                    echo($data->id);
                }
            }

            
            dd($transform_maxstatus_maxweight);  
            // dd($transformId);  
           
            // foreach ($user->publishers as $userPublisher) {
            //     foreach ($userPublisher->teams as $publisherTeam) {
            //       $teamUserIds = array_merge($teamUserIds , $publisherTeam->members->pluck('id')->toarray());
            //     }
            //   }
            //   $deDupedIds = array_unique($teamUserIds, SORT_NUMERIC);
            //   $idsCount = count($deDupedIds);
            // $length_min = $adminBabyRule[0]->length_min;
            // $length_max = $adminBabyRule[0]->length_max;
            // $weight_min = $adminBabyRule[0]->weight_min;
            // $weight_max = $adminBabyRule[0]->weight_max;
            // $age_min = $adminBabyRule[0]->age_min;
            // $age_max = $adminBabyRule[0]->age_max;
            // $status_underweight = $adminBabyRule[0]->status;
            // $status_normal = $adminBabyRule[1]->status;
            // $status_overweight = $adminBabyRule[2]->status;

            // $age_transform=0;
            // if($request->age < $length_min){
            //     $age_transform=1;
            // }else if($request >$length_max){
            //     $age_transform=1;
            // }

            // dd($baby->age > $request->age?'true':'wrong');
/////
            // $adminBabyTransform->length_min;
            // $adminBabyTransform = 
            // $baby_id = $baby->id;

            // $babyTransform->user_baby = $request->$baby_id;
            // $babyTransform->age = $request->age;
            // $babyTransform->length = $request->length;
            // $babyTransform->weight = $request->weight;
            // $babyTransform->gender = $request->gender;

            // $babyTransform->status = $request->gender;
           
            return redirect()->back()->with('success','You are now successfully registered');
        }else{
            return redirect()->back()->with('error','Failed to register');
        }
    }

    function retrieveData($id){
        // echo $id;
        $data = Baby::find($id);
        return view('dashboards.users.baby',['data'=>$data]);

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
