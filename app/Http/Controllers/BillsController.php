<?php

namespace App\Http\Controllers;

use App\Bills;
use App\Customer;
use App\product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BillsController extends Controller
{

    /**
     * @return mixed
     */
    public function panel($username){

        $user = Auth::user();
        $bills = $user->bills()->paginate(10);

        return view::make('bills.panel',[
            'bills' => $bills
        ])->render();
    }




    /**
     * Metodo para mostrar el formulario de una nueva factura, con un select de los clientes y productos
     * @param $username
     * @return mixed
     */
    public function create($username){
        $user=User::where('username',$username)->first();
        $customers= Customer::where('user_id',$user->id)->get();
        $products= Product::where('user_id',$user->id)->get();

        return view::make("bills.create",array(
                'customers' => $customers,
                'products' => $products
        ))->render();
    }


    /**
     * En este metodo se crea la factura y luego se le aplica attach para añadir en la tabla pivot
     * bills_products todos los productos que se han seleccionado
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store( Request $request){

        $user= Auth::user();

        $customer=Customer::find($request->customer);


        $bill = $customer->bills()->create([
            'user_id' => $user->id,
            'total' => $request->total,
            'price' => $request->price,
            'discount' => $request->discount
        ]);


        $bill->products()->attach($request->products);


        return redirect('/home/'.$user->username.'/bills/panel');


    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id){

        Bills::where('id',$id)->delete();

        return redirect('/home/'.Auth::user()->username.'/bills/panel');
    }

    /**
     * Metodo para la llamada asincrona que gestiona el precio final aplicandole el descuento
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
