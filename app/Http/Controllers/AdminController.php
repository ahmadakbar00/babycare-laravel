<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminBaby;
use App\Models\User;
use App\Models\Baby;
use App\Models\Report;
use App\Models\AdminBabyTesting;

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
       
        $data = AdminBaby::all();
        $countData = count($data);
        $dataTestingCount = round($countData / 4);
        $dataTrainingCount = $countData - $dataTestingCount;
        // dd($dataTrainingCount, $dataTestingCount);
        $dataTrainingBackground = AdminBaby::all()->take($dataTrainingCount);
        // $dataTesting = AdminBaby::all()->sortByDesc('id')->take($dataTestingCount);
        $dataTesting = AdminBabyTesting::all()->take(10);
        // dd($dataTesting);
        // dd($dataTrainingBackground, $dataTesting);

        $arrReal = [];
        $arrPredict = [];

        foreach($dataTesting as $data){
            $age = $data->age;
            $weight = $data->weight;
            $length = $data->length;
            $gender = $data->gender;
            array_push($arrReal, $data->status);
            $status = $this->nutritionCalc($age, $weight, $length, $gender);
            array_push($arrPredict, $status);
        }

        // Real - Predict
        $baik_baik = 0;
        $baik_kurang = 0;
        $baik_lebih = 0;
        $kurang_baik = 0;
        $kurang_kurang = 0;
        $kurang_lebih = 0;
        $lebih_baik = 0;
        $lebih_kurang = 0;
        $lebih_lebih = 0;

        // dd($arrReal, $arrPredict);
    for($i=0;$i<count($arrReal); $i++){
        if($arrReal[$i] == "Baik"){
            if($arrPredict[$i] == "Baik"){
                $baik_baik += 1;
            }
            if($arrPredict[$i] == "Kurang"){
                $baik_kurang += 1;
            }
            if($arrPredict[$i] == "Lebih"){
                $baik_lebih += 1;
            }
        }
        if($arrReal[$i] == "Kurang"){
            if($arrPredict[$i] == "Baik"){
                $kurang_baik += 1;
            }
            if($arrPredict[$i] == "Kurang"){
                $kurang_kurang += 1;
            }
            if($arrPredict[$i] == "Lebih"){
                $kurang_lebih += 1;
            }
        }
        if($arrReal[$i] == "Lebih"){
            if($arrPredict[$i] == "Baik"){
                $lebih_baik += 1;
            }
            if($arrPredict[$i] == "Kurang"){
                $lebih_kurang += 1;
            }
            if($arrPredict[$i] == "Lebih"){
                $lebih_lebih += 1;
            }
        }   
    }

    // dd('baik_baik =>' , $baik_baik,
    //    'baik_kurang =>' , $baik_kurang,
    //    'baik_lebih =>' , $baik_lebih,
    //    'kurang_baik =>' , $kurang_baik,
    //    'kurang_kurang =>' , $kurang_kurang,
    //    'kurang_lebih =>' , $kurang_lebih,
    //    'lebih_baik =>' , $lebih_baik,
    //    'lebih_kurang =>' , $lebih_kurang,
    //    'lebih_lebih) =>' , $lebih_lebih);

    $akurasi = ($baik_baik + $kurang_kurang + $lebih_lebih) / ($baik_baik + $baik_kurang + $baik_lebih + $kurang_baik + $kurang_kurang + $kurang_lebih + $lebih_baik + $lebih_kurang + $lebih_lebih) * 100;
    
    // dd(round(102/4));
    // dd('Akurasi => ' ,$akurasi.'%' );
    

        $id = Auth::id();
        $dataTraining = AdminBaby::paginate(5);

        return view('admin.dataTraining',['dataTraining'=>$dataTraining, 'akurasi'=>$akurasi]);
    }
    

    function dataTestingMenu(){
        $id = Auth::id();
        $dataTesting = AdminBaby::all();
        return view('admin.dataTesting',['dataTesting'=>$dataTesting]);
    }
    
    function dataTraining($id){
        // $id = Auth::id();
        $dataTraining = AdminBaby::find($id);
        // dd($dataTraining);
        return view('admin.editDataTraining',['dataTraining'=>$dataTraining]);
    }

    function addDataTraining(Request $request){
        $id = Auth::id();
        $dataTraining = new AdminBaby;
        $dataTraining->age = $request->age;
        $dataTraining->length = $request->length;
        $dataTraining->weight = $request->weight;
        $dataTraining->gender = $request->gender;
        $dataTraining->status = $request->status;
        $dataTraining->user_id = $id;
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

    function nutritionCalc($age, $weight, $length, $gender){
        $dataTraining = new AdminBaby;
        $data = AdminBaby::all()->take(60);

        //GET DATA BY CLASS/LABEL
        $dataLebih = [];
        foreach ($data as $d){
           if($d->status == "Lebih"){
               array_push($dataLebih, $d);
           }
        }

        $dataKurang = [];
        foreach ($data as $d){
           if($d->status == "Kurang"){
               array_push($dataKurang, $d);
           }
        }

        $dataBaik = [];
        foreach ($data as $d){
           if($d->status == "Baik"){
               array_push($dataBaik, $d);
           }
        }

        //CARI PROBABILITAS PER CLASS
        ///Class Baik (jumlah data baik / jumlah data semua)
        $probabilitasKelasBaik = count($dataBaik)/count($data);
        ///Class Kurang
        $probabilitasKelasKurang = count($dataKurang)/count($data);
        ///Class Lebih
        $probabilitasKelasLebih = count($dataLebih)/count($data);

        //CARI MEAN PER CLASS
        ///Jumlah nilai Baik / jumlah semua data.
        ///Umur
        $jmlUmur = 0;
        foreach($dataBaik as $d){
            $jmlUmur += $d->age;
        }
        $meanUmurBaik = $jmlUmur/count($dataBaik);
        
        $jmlUmur = 0;
        foreach($dataKurang as $d){
            $jmlUmur += $d->age;
        }
        $meanUmurKurang = $jmlUmur/count($dataKurang);
        
        $jmlUmur = 0;
        foreach($dataLebih as $d){
            $jmlUmur += $d->age;
        }

        $meanUmurLebih = $jmlUmur/count($dataLebih);

        /// BB
        $jmlBB = 0;
        foreach($dataBaik as $d){
            $jmlBB += $d->weight;
        }
        $meanBBBaik = $jmlBB/count($dataBaik);
        
        $jmlBB = 0;
        foreach($dataKurang as $d){
            $jmlBB += $d->weight;
        }
        $meanBBKurang = $jmlBB/count($dataKurang);
        
        $jmlBB = 0;
        foreach($dataLebih as $d){
            $jmlBB += $d->weight;
        }
        $meanBBLebih = $jmlBB/count($dataLebih);

        /// TB
        $jmlTB = 0;
        foreach($dataBaik as $d){
            $jmlTB += $d->length;
        }
        $meanTBBaik = $jmlTB/count($dataBaik);
        
        $jmlTB = 0;
        foreach($dataKurang as $d){
            $jmlTB += $d->length;
        }
        $meanTBKurang = $jmlTB/count($dataKurang);
        
        $jmlTB = 0;
        foreach($dataLebih as $d){
            $jmlTB += $d->length;
        }
        $meanTBLebih = $jmlTB/count($dataLebih);
     
        //CARI DEVIASI STANDARD
        /// a = tentukan jumlah data per atribut perclass
        /// b = n-1 => jumlah data peratribut perclass kurangi 1
        /// x = masing-masing nilai data peratribut perclass ditambahkan (jumlahkan keseleruhan anggota data(sigma))
        /// y = masing-masing nilai data per atribut perclass dipangkat 2 / kuadratkan lalu ditambahkan (jumlahkan keselruhan anggota (sigma))
        /// z = hasil dari perhitungan data peratribut perclass tadi di pangkatkan 2 (kuadratkan).
        /// (((a) x (y)) - (x^2)) / (a x b)
        
        //UMUR
        ///Kurang
        $x = 0;
        $y = 0;
        $sigma=0;
        foreach($dataKurang as $d){
            $x += $d->age;
            $y += $d->age * $d->age;
            $sigma += ($d->age - $meanUmurKurang)*($d->age - $meanUmurKurang);

        }
        $stdevUmurKurang = sqrt($sigma / (count($dataKurang)-1));
        ///Baik
        $x = 0;
        $y = 0;
        $sigma=0;
        foreach($dataBaik as $d){
            $x += $d->age;
            $y += $d->age * $d->age;
            $sigma += ($d->age - $meanUmurBaik)*($d->age - $meanUmurBaik);

        }
        $stdevUmurBaik = sqrt($sigma / (count($dataBaik)-1));
        ///Lebih
        $x = 0;
        $y = 0;
        $sigma=0;
        foreach($dataLebih as $d){
            $x += $d->age;
            $y += $d->age * $d->age;
            $sigma += ($d->age - $meanUmurLebih)*($d->age - $meanUmurLebih);

        }
        $stdevUmurLebih = sqrt($sigma / (count($dataLebih)-1));

        //BB
        ///Kurang
        $x = 0;
        $y = 0;
        $sigma=0;
        foreach($dataKurang as $d){
            $x += $d->weight;
            $y += $d->weight * $d->weight;
            $sigma += ($d->weight - $meanBBKurang)*($d->weight - $meanBBKurang);

        }
        $stdevBBKurang = sqrt($sigma / (count($dataKurang)-1));
        ///Baik
        $x = 0;
        $y = 0;
        $sigma=0;
        foreach($dataBaik as $d){
            $x += $d->weight;
            $y += $d->weight * $d->weight;
            $sigma += ($d->weight - $meanBBBaik)*($d->weight - $meanBBBaik);

        }
        $stdevBBBaik = sqrt($sigma / (count($dataBaik)-1));
        ///Lebih
        $x = 0;
        $y = 0;
        $sigma=0;
        foreach($dataLebih as $d){
            $x += $d->weight;
            $y += $d->weight * $d->weight;
            $sigma += ($d->weight - $meanBBLebih)*($d->weight - $meanBBLebih);

        }
        $stdevBBLebih = sqrt($sigma / (count($dataLebih)-1));

        //TB
        ///Kurang
        $x = 0;
        $y = 0;
        $sigma=0;
        foreach($dataKurang as $d){
            $x += $d->length;
            $y += $d->length * $d->length;
            $sigma += ($d->length - $meanTBKurang)*($d->length - $meanTBKurang);

        }
        $stdevTBKurang = sqrt($sigma / (count($dataKurang)-1));
        ///Baik
        $x = 0;
        $y = 0;
        $sigma=0;
        foreach($dataBaik as $d){
            $x += $d->length;
            $y += $d->length * $d->length;
            $sigma += ($d->length - $meanTBBaik)*($d->length - $meanTBBaik);

        }
        $stdevTBBaik = sqrt($sigma / (count($dataBaik)-1));
        ///Lebih
        $x = 0;
        $y = 0;
        $sigma=0;
        foreach($dataLebih as $d){
            $x += $d->length;
            $y += $d->length * $d->length;
            $sigma += ($d->length - $meanTBLebih)*($d->length - $meanTBLebih);

        }
        $stdevTBLebih = sqrt($sigma / (count($dataLebih)-1));

        //RUMUS GAUSSIAN
        // $age = $request->age;
        // $weight =$request->weight;
        // $length = $request->length;

        //Umur
        //P(Umur|Kurang)
        $probUmurKurang = (1/sqrt(2 * 3.14  * $stdevUmurKurang)) * (exp(-( pow( $age - $meanUmurKurang ,2) / (2 * pow($stdevUmurKurang,2)))));
        //P(Umur|Baik)
        $probUmurBaik = (1/sqrt(2 * 3.14  * $stdevUmurBaik)) * (exp(-( pow( $age - $meanUmurBaik ,2) / (2 * pow($stdevUmurBaik,2)))));
        //P(Umur|Lebih)
        $probUmurLebih = (1/sqrt(2 * 3.14  * $stdevUmurLebih)) * (exp(-( pow( $age - $meanUmurLebih ,2) / (2 * pow($stdevUmurLebih,2)))));
        
        //BB
        //P(BB|Kurang)
        $probBBKurang = (1/sqrt(2 * 3.14  * $stdevBBKurang)) * (exp(-( pow( $weight - $meanBBKurang ,2) / (2 * pow($stdevBBKurang,2)))));
        //P(BB|Baik)
        $probBBBaik = (1/sqrt(2 * 3.14  * $stdevBBBaik)) * (exp(-( pow( $weight - $meanBBBaik ,2) / (2 * pow($stdevBBBaik,2)))));
        //P(BB|Lebih)
        $probBBLebih = (1/sqrt(2 * 3.14  * $stdevBBLebih)) * (exp(-( pow( $weight - $meanBBLebih ,2) / (2 * pow($stdevBBLebih,2)))));

        //TB
        //P(TB|Kurang)
        $probTBKurang = (1/sqrt(2 * 3.14  * $stdevTBKurang)) * (exp(-( pow( $length - $meanTBKurang ,2) / (2 * pow($stdevTBKurang,2)))));
        //P(TB|Baik)
        $probTBBaik = (1/sqrt(2 * 3.14  * $stdevTBBaik)) * (exp(-( pow( $length - $meanTBBaik ,2) / (2 * pow($stdevTBBaik,2)))));
        //P(TB|Lebih)
        $probTBLebih = (1/sqrt(2 * 3.14  * $stdevTBLebih)) * (exp(-( pow( $length - $meanTBLebih ,2) / (2 * pow($stdevTBLebih,2)))));


        //PERHITUNGAN DISKRIT
        $jmlLakilakiKurang = AdminBaby::get()->where('gender','Laki-laki')->where('status','Kurang')->count();
        $jmlLakilakiBaik = AdminBaby::get()->where('gender','Laki-laki')->where('status','Baik')->count();
        $jmlLakilakiLebih = AdminBaby::get()->where('gender','Laki-laki')->where('status','Lebih')->count();

        $jmlPerempuanKurang = AdminBaby::get()->where('gender','Perempuan')->where('status','Kurang')->count();
        $jmlPerempuanBaik = AdminBaby::get()->where('gender','Perempuan')->where('status','Baik')->count();
        $jmlPerempuanLebih = AdminBaby::get()->where('gender','Perempuan')->where('status','Lebih')->count();

        $jmlKurang = AdminBaby::get()->where('status','Kurang')->count();
        $jmlBaik = AdminBaby::get()->where('status','Baik')->count();
        $jmlLebih = AdminBaby::get()->where('status','Lebih')->count();

        if($gender == 'Laki-laki'){
            $probGenderKurang = $jmlLakilakiKurang / $jmlKurang;
            $probGenderBaik = $jmlLakilakiBaik / $jmlBaik;
            $probGenderLebih = $jmlLakilakiLebih / $jmlLebih;
        }        
        
        if($gender == 'Perempuan'){
            $probGenderKurang = $jmlPerempuanKurang / $jmlKurang;
            $probGenderBaik = $jmlPerempuanBaik / $jmlBaik;
            $probGenderLebih = $jmlPerempuanLebih / $jmlLebih;
        }        

        //LIKELIHOOD
        ///Likelihood Kurang
        $likelihoodKurang = $probUmurKurang * $probBBKurang * $probTBKurang * $probGenderKurang;
        
        ///Likelihood Baik
        $likelihoodBaik = $probUmurBaik * $probBBBaik * $probTBBaik * $probGenderBaik;
        
        ///Likelihood Lebih
        $likelihoodLebih = $probUmurLebih * $probBBLebih * $probTBLebih * $probGenderLebih;

        //KALLIKAN PROBABILITAS
        $probabilitasKurang = $likelihoodKurang * $probabilitasKelasKurang;
        $probabilitasBaik = $likelihoodBaik * $probabilitasKelasBaik;
        $probabilitasLebih = $likelihoodLebih * $probabilitasKelasLebih;
        
        //HASIL STATUS GIZI
        $highestProbability = 0;
        $LabelProbabilty = "";
        if ($probabilitasKurang > $probabilitasBaik && $probabilitasKurang > $probabilitasLebih){
            $highestProbability = $probabilitasKurang;
            $LabelProbabilty = "Kurang";
        }else if($probabilitasBaik > $probabilitasKurang && $probabilitasBaik > $probabilitasLebih){
            $highestProbability = $probabilitasBaik;
            $LabelProbabilty = "Baik";
        }elseif($probabilitasLebih > $probabilitasKurang && $probabilitasLebih > $probabilitasBaik){
            $highestProbability = $probabilitasLebih;
            $LabelProbabilty = "Lebih";
        }

        // dd($probabilitasKurang, $probabilitasBaik, $probabilitasLebih);

        ///MASUKAN HASIL NAIVE BAYES KEDATABASE
        return $LabelProbabilty;
    }

}
