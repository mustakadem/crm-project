<?php

namespace App\Http\Controllers;

use App\Bills;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function count(){

        $username=$_GET['name'];
        $user= User::where('username',$username)->first();


        $countCustomers = DB::table('customers')->where('user_id',$user->id)->get()->count();

        $countProduct=DB::table('products')->where('user_id',$user->id)->count();

        $countBills = Bills::where('user_id',$user->id)->count();

        return response()->json([
            'customers' => $countCustomers  ,
            'products' => $countProduct,
            'bills' => $countBills
        ]);
    }
}
