<?php

namespace App\Http\Controllers;
use App\Bills;
use App\User;
use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\CreateCustomersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($username){
        $user = User::where('username',$username)->first();
        $customers = $user->customers()->get();
        return view('customers.list',[
           'customers' => $customers
        ]);
    }

    /**
     * Metodo para mostrar el formulario para crear un customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($username){

        return view('customers.create');
    }

    public function store(CreateCustomersRequest $request, User $user){
        Customer::create([
            'name' => $request->input('name'),
            'user_id' => $user->id,
            'surnames' => $request->input('surnames'),
            'type_customers' => "exporadico",
            'image' => $_POST['image']?$_POST['image']:null,
            'address' => $request->input('address'),
            'number' => $_POST['number']?$_POST['number']:null,
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'company' => $_POST['company']?$_POST['company']:null,
            'job_title' => $_POST['job_title']?$_POST['job_title']:null,
            'notes' => $_POST['notes']?$_POST['notes']:null,
        ]);

        return redirect('/home');

    }

    public function destroy($id){

        Customer::where('id',$id)->delete();

        $user = Auth::user();

       return view('customers.list',[
           'customers' => $user ->customers()->get()
       ]);
    }
}
