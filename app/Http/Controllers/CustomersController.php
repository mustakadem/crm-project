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
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class CustomersController extends Controller
{

    public function panel(){

        $now=Carbon::now();
        $fechaCompracion=$now->subWeek();

        $user = Auth::user();
        $totalCustomers = $user->customers()->get();

        $customersOfTheWeek = array();
        $customersMorePurchases = array();


        foreach ($totalCustomers as $customer){

            $fecha2 = $customer['created_at'];
            $difference = $now->diffForHumans($fecha2);

            $totalPrice = $customer->bills()->get()->max('total');


            if (strcmp ( $difference, "1 week before" ) === 0){
            array_push($customersOfTheWeek,$customer);
            }
        }

        return view::make('customers.panel',array(
            'customersOfTheWeek' => $customersOfTheWeek
        ))->render();
    }

    /**
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
       return redirect('/home');
    }
}
