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


        $countCustomers = $user->customers()->get()->count();

        $countProduct=$user->products()->get()->count();

        $countBills = $user->bills()->get()->count();

        $totalSales= $user->bills()->get()->sum('total');


        return response()->json([
            'customers' => $countCustomers  ,
            'products' => $countProduct,
            'bills' => $countBills,
            'totalSales' => $totalSales
        ]);
    }
}
