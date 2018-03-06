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

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){

        Customer::where('id',$id)->delete();
       return redirect('/home');
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
                'movil' => 'numeric|required'
            ]);
        }else if($campo == 'job_title'){
            $validator = Validator::make($request->all(),[
                'job_title' => 'string|min:4|nullable'
            ]);
        }else if($campo == 'company'){
            $validator = Validator::make($request->all(),[
                'company' => 'string|min:4|nullable'
            ]);
        }

        $errors=$validator->errors();



        return response()->json([
            $campo => $errors->get($campo)
        ]);
    }
}
