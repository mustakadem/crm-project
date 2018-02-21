<?php

namespace App\Http\Controllers;

use App\Bills;
use App\Customer;
use App\product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BillsController extends Controller
{

    /**
     * @return mixed
     */
    public function panel(){
        return view::make('bills.panel')->render();
    }

    public function index( $username){

        $user = User::where('username' ,$username)->first();

        $bills= $user->bills()->get();

        return view::make('bills.list',array(
                'bills' => $bills
            ))->render();
    }


    public function create($username){
        $user=User::where('username',$username)->first();
        $customers= Customer::where('user_id',$user->id)->get();
        $products= Product::where('user_id',$user->id)->get();

        return view::make("bills.create",array(
                'customers' => $customers,
                'products' => $products
        ))->render();
    }



    public function store(User $user, Request $request){


        $customer=Customer::find($request->customer);


        $bill = $customer->bills()->create([
            'user_id' => $user->id,
            'total' => $request->total,
            'price' => $request->price,
            'discount' => $request->discount
        ]);


        $bill->products()->attach($request->products);


        return redirect('/home');


    }

    public function destroy($id){

        Bills::where('id',$id)->delete();

        $user = Auth::user();

        return view('bills.list',[
            'bills' => $user ->bills()->get()
        ]);
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
