<?php

namespace App\Http\Controllers;

use App\Customer;
use App\product;
use App\User;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    public function create($username){
        $user=User::where('username',$username)->first();
        $customers= Customer::where('user_id',$user->id)->get();
        $products= Product::where('user_id',$user->id)->get();
        return view("bills.create",[
            'customers' => $customers,
            'products' => $products
        ]);
    }



    public function store(User $user, Request $request){


        $customer=Customer::find($request->customer);



    }

    public function price(Request $request){
        $products= Product::whereIn('id',$request->products)->get();

        $total= 0;

        foreach ($products as $product){
            $total+=$product['price'];
        }

        return response()->json([
            'total' => $total
        ]);


    }
}
