<?php

namespace App\Http\Controllers;
use App\Bills;
use App\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\CreateCustomersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class CustomersController extends Controller
{

    /**
     * Este metodo muestra el panel principal de los Customers, devuelve los clientes creados en la ultima semana y
     * los clientes que estan por encima de la media en el total de compras.
     * @return mixed
     */
    public function panel($username){

        $now=Carbon::now();


        $user = Auth::user();
        $totalCustomers = $user->customers()->get();
        $media= DB::table('bills')->avg('total');

        $customersOfTheWeek = array();
        $customersMorePurchases = array();


        foreach ($totalCustomers as $customer){

            $fecha2 = $customer['created_at'];
            $difference = $now->diffInDays($fecha2);

            $totalPrice = $customer->bills()->get()->max('total');

            if ($totalPrice >= $media){
                array_push($customersMorePurchases,$customer);
            };


            if ($difference <= 7){
            array_push($customersOfTheWeek,$customer);
            };
        }

        return view::make('customers.panel',array(
            'customersOfTheWeek' => $customersOfTheWeek,
            'customersMorePurchases' => $customersMorePurchases
        ))->render();
    }

    /**
     * Muestra la lista de los clientes.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($username){

        $user = User::where('username',$username)->first();
        $customers = $user->customers()->get();

        return view::make('customers.list',array(
            'customers' => $customers
            ))->render();
    }

    /**
     * Muestra toda la informacion de un Customer
     * @param $username
     * @param Customer $customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username,Customer $customer){

        return view('customers.profile',[
            'customer' => $customer
        ]);
    }

    /**
     * Metodo para mostrar el formulario para crear un customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($username){

        return view('customers.create');
    }

    /**
     *
     * @param CreateCustomersRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateCustomersRequest $request, User $user){
        Customer::create([
            'name' => $request->input('name'),
            'user_id' => $user->id,
            'surnames' => $request->input('surnames'),
            'type_customers' => $request->input('type_customer'),
            'image' => $request->input('image'),
            'address' => $request->input('address'),
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'company' => $request->input('company'),
            'job_title' => $request->input('job_title'),
            'notes' =>  $request->input('notes'),
        ]);

        return redirect('/home/'.$user->username.'/customers/panel');

    }

    /**
     * @param $username
     * @param Customer $customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($username, Customer $customer){
        return view('customers.edit',[
            'customer' => $customer
        ]);
    }

    /**
     * @param CreateCustomersRequest $request
     * @param $username
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreateCustomersRequest $request, $username, Customer $customer ){
        $user = User::find($customer->user_id);

        $customer->update([
            'name' => $request->input('name'),
            'surnames' => $request->input('surnames'),
            'type_customers' => $request->input('type_customer'),
            'image' => $request->input('image'),
            'address' => $request->input('address'),
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'company' => $request->input('company'),
            'job_title' => $request->input('job_title'),
            'notes' =>  $request->input('notes'),
        ]);

        return redirect('/home/'.$user->username.'/customers/profile/'.$customer->id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){

        Customer::where('id',$id)->delete();

       return redirect('/home/'.Auth::user()->username.'/customers/panel');
    }

    /**
     * Metodo para la validacion asincrona en cliente
     * @param Request $request
     * @param $campo
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateNewCustomer(Request $request , $campo){



        if ($campo == 'name'){
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|min:4'
            ]);
        }else if($campo == 'surnames'){
            $validator = Validator::make($request->all(),[
                'surnames' => 'string|min:4|required'
            ]);
        }else if($campo == 'email'){
            $validator = Validator::make($request->all(),[
                'email' => 'email|required'
            ]);
        }else if($campo == 'address'){
            $validator = Validator::make($request->all(),[
                'address' => 'string|nullable'
            ]);
        }else if($campo == 'movil'){
            $validator = Validator::make($request->all(),[
                'movil' => 'numeric|required|min:6'
            ]);
        }else if($campo == 'job_title'){
            $validator = Validator::make($request->all(),[
                'job_title' => 'string|min:4|nullable'
            ]);
        }else if($campo == 'company'){
            $validator = Validator::make($request->all(),[
                'company' => 'string|min:4|nullable'
            ]);
        }else if($campo == 'type_customer'){
            $validator = Validator::make($request->all(),[
                'type_customer' => 'in:potencial,activo,exporadico'
            ]);
        }

        $errors=$validator->errors();



        return response()->json([
            $campo => $errors->get($campo)
        ]);
    }
}
