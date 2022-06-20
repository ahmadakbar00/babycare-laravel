<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Report;
use App\Models\AdminBaby;
use App\Models\Baby;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ReportController extends Controller
{

    
    function nutritionCalc($age, $weight, $length){
        $dataTraining = new AdminBaby;
        $data = AdminBaby::all();

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
        return $LabelProbabilty;
    }

    function addData(Request $request){

        $idUser = Auth::user();
        $idParent = Auth::id();
        $report_monthly = 0;
        $report_monthly_total = 0;

        $get_report_monthly = Report::where('baby_id', '=', $request->id)->count();
        $get_report_monthly_total = Report::all()->count();
        
        // $data1 = Report::select('report_monthly','surname')->where('baby_id',$request->id);
        // $data3 = Report::wherebaby_id($request->id);
        // $data6 = Report::find($request->id);
        // dd($data1, $data3, $data4, $data6);
        // dd($data1, $data3, $data4, $data6);

        $report_table = Report::find($request->id);
        if($get_report_monthly!=null){
            $report_monthly = $get_report_monthly + 1;
            $report_monthly_total = $get_report_monthly_total + 1; //aslinya get count data yang ada
            // dd($report_monthly);
        }else{
            $monthly_report = 1;
            $monthly_report_total = 1;
            $report_monthly_total = $get_report_monthly_total + 1;
        }
        // dd($report_monthly, $report_monthly_total);
        
        $report= new Report;
        $report->name = $request->name;
        $report->baby_id = $request->id;
        // dd($request->id);
        $report->parent_id = $idParent;
        $report->report_monthly = $report_monthly; //get data model report
        $report->report_monthly_total = $report_monthly_total;
        $report->age = $request->age;
        $report->length = $request->length;
        $report->weight = $request->weight;
        $report->gender = $request->gender;
        $report->status = $this->nutritionCalc($request->age, $request->weight, $request->length);

        $baby= Baby::find($request->baby_id);
        $baby->name = $request->name;
        $baby->parent = 1;
        $baby->age = $request->age;
        $baby->length = $request->length;
        $baby->weight = $request->weight;
        $baby->gender = $request->gender;
        $baby->status = $this->nutritionCalc($request->age, $request->weight, $request->length);
        $baby->save();

        if($report->save()){
            return redirect()->back()->with('success','You are now successfully registered');
        }else{
            return redirect()->back()->with('error','Failed to register');
        }
    }

    function retrieveData($id){
        $data = Baby::find($id);
        return view('users.baby',['data'=>$data]);

    }

}