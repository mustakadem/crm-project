<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function count(){

        $username=$_GET['name'];
        $user= DB::table('users')->where('username',$username)->first();


        $countCustomers = DB::table('customers')->where('user_id',$user->id)->get()->count();

        $countProduct=DB::table('products')->where('user_id',$user->id)->count();

        return response()->json([
            'customers' => $countCustomers  ,
            'products' => $countProduct
        ]);
    }
}
