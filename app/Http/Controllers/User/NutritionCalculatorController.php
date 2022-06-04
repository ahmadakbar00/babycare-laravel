<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NutritionCalculatorController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'string', 'max:255'],
            'baby_id' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nutritional_state' => 'required',
        ]);
    }

    

    function calculate(Request $request){
        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'baby_id'=> ['required', 'string', 'max:255','email','unique:users'],
            'nutritional_state' =>'required',
        ]);

        $nutritional_status = new User();
        $nutritional_status->user_id = $request->user_id;
        $nutritional_status->baby_id = $request->baby_id;
        $nutritional_status->nutritional_state = $request->nutritional_state;

        if($nutritional_status->save()){
            return redirect()->back()->with('success','You are now successfully registered');
        }else{
            return redirect()->back()->with('error','Failed to register');
        }

    }
}
