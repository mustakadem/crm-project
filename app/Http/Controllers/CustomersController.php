<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\Http\Requests\CreateCustomersRequest;

class CustomersController extends Controller
{

    /**
     * Método que muestra la información de un mensaje. Utiliza Route Binding
     * para coneguir el customer facilitado por el parámetro.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(){
        $customers= Customer::orderBy('created_at','desc')->get();


        return view('customers.list',[
            'customers' => $customers
        ]);
    }

    /**
     * Metodo para mostrar el formulario para crear un customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        return view('customers.create');
    }

    public function store(CreateCustomersRequest $request){

        Customer::create([
            'name' => $request->input('name'),
            'surnames' => $request->input('surnames'),
            'type_customers' => "exporadico",
            'image' => $_POST['image'],
            'address' => $request->input('address'),
            'number' => $_POST['number'],
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'company' => $_POST['company'],
            'job_title' => $_POST['job_title'],
            'notes' => $_POST['notes'],
        ]);

        return redirect('/home');

    }
}
