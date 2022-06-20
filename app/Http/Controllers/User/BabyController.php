<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Baby;
use App\Models\BabyUserDataTransform;
use App\Models\AdminBabyDataTransform;
use App\Models\AdminBabyRule;
use App\Models\AdminRule;
use App\Models\AdminBaby;
use App\Models\Report;

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

        $request->validate([
            'name' => ['required', 'string'],
            'age' =>['required', 'numeric'],
            'length'=>['required', 'numeric'],
            'weight'=>['required', 'numeric'],
            'gender'=>['required', 'string'],
        ]);

        $parent_id = Auth::id();
        $baby= new Baby;
        $baby->name = $request->name;
        $baby->parent = $parent_id;
        $baby->age = $request->age;
        $baby->length = $request->length;
        $baby->weight = $request->weight;
        $baby->gender = $request->gender;
        // $baby->status = $request->status;

        // Menarik data dulu data dari baby total [data baby inputan user + data training admin]
        // $baby = new Baby;

        // Mencar.diknwlk==i 
        $dataTraining = new AdminBaby;
        // $data = Baby::select('name','surname')->where('status','Lebih');
        // $data = AdminBaby::find("Lebih");
        // $data = AdminBaby::whereStatus('Lebih');
        // $data = Baby::where('status', '=', 'Lebih')->first();
        // $data = AdminBaby::with('status')->whereIn('');
        $data = AdminBaby::all();
        // $dataLebih = $data->status("Lebih");

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
        $age = $request->age;
        $weight =$request->weight;
        $length = $request->length;

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


        //LIKELIHOOD
        ///Likelihood Kurang
        $likelihoodKurang = $probUmurKurang * $probBBKurang * $probTBKurang;
        
        ///Likelihood Baik
        $likelihoodBaik = $probUmurBaik * $probBBBaik * $probTBBaik;
        
        ///Likelihood Lebih
        $likelihoodLebih = $probUmurLebih * $probBBLebih * $probTBLebih;

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
        $baby->status = $LabelProbabilty;
        
        if($baby->save()){
            return redirect()->back()->with('success','Data anak berhasil ditambahkan');
        }else{
            return redirect()->back()->with('error','Terdapat data yang salah');
        }
    }

    function retrieveData($id){
        // echo $id;
        // $data = Baby::find($id);
        $data = Report::where('baby_id', '=', $id)->orderBy('id','DESC')->first();
        // dd($data);
       
        if($data!=null){
            $allBabyReport = Report::where('baby_id', '=', $id)->get();
            $data3 = [];
            foreach($allBabyReport as $b){
                array_push($data3, $b->age);
            }
            $dataWeight = [];
            foreach($allBabyReport as $b){
                array_push($dataWeight, $b->weight);
            }
            $dataLength = [];
            foreach($allBabyReport as $b){
                array_push($dataLength, $b->length);
            }

            $baik = Report::where('baby_id', '=', $id)->where('status', '=', 'Baik')->count();
            $kurang = Report::where('baby_id', '=', $id)->where('status', '=', 'Kurang')->count();
            $lebih = Report::where('baby_id', '=', $id)->where('status', '=', 'Lebih')->count();
            $report_total_peranak = Report::where('baby_id', '=', $id)->orderBy('report_monthly','DESC')->first();
            
            $data2 = array( 'baik' => $baik, 
                            'kurang' => $kurang, 
                            'lebih'  => $lebih,
                            'report_total_peranak' => $report_total_peranak->report_monthly
                        );
            return view('users.baby',['data'=>$data,'data2'=>$data2,'data3'=>$data3, 'dataWeight'=>$dataWeight,'dataLength'=>$dataLength]);
        }else{
            // $allBabyReport = Baby::where('baby_id', '=', $id)->get();

            $dataWeight = [];
            $dataLength = [];
            $data3 = [];

            $babyData = Baby::where('id', '=', $id)->first();
            array_push($dataWeight, $babyData->weight);
            array_push($dataWeight, $babyData->weight);
            array_push($dataLength, $babyData->length);
            array_push($dataLength, $babyData->length);
            array_push($data3, $babyData->age);


            $data = Baby::find($id);
            $kurang = Baby::where('id', '=', $id)->where('status', '=', 'Kurang')->count();
            $baik = Baby::where('id', '=', $id)->where('status', '=', 'Baik')->count();
            $lebih = Baby::where('id', '=', $id)->where('status', '=', 'Lebih')->count();
            $report_total_peranak = 1;

            $data2 = array( 'baik' => $baik, 
                            'kurang' => $kurang, 
                            'lebih'  => $lebih,
                            'report_total_peranak' => $report_total_peranak
                        );
                        
            return view('users.baby',['data'=>$data,'data2'=>$data2,'data3'=>$data3,'dataWeight'=>$dataWeight,'dataLength'=>$dataLength]);
        }
      
    }

    function editbaby(Request $request){
        $this->validate($request, [
                'name'     => 'required',
            ]);
            
            $baby = Baby::find($request->id);
            $report = Report::where('baby_id','=',$request->id)->get();
            $baby->name = $request->name;
            foreach ($report as $report){
                $report->name = $request->name;
            }
            $baby->save();
            
        if($report->save()){
            return redirect()->back()->with('success','Data anak berhasil diedit');
        }else{
            return redirect()->back()->with('error','Terdapat yang salah');
        }

    }
    function deleteBaby(Request $request){
            $baby = Baby::find($request->id);
            $report = Report::where('baby_id','=',$request->id)->get();
            // dd($request->id);
        if($baby->delete()){
            $id = Auth::id();
            $data = Baby::all()->where('parent',$id);
            return view('users.babyDetail',['data'=>$data])->with('success','Data anak berhasil dihapus');
        }else{
            return redirect()->back()->with('error','Terdapat yang salah');
        }

    }
}
