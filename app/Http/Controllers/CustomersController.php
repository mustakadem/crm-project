<?php

namespace App\Http\Controllers;
use App\Bills;
use App\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\CreateCustomersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class CustomersController extends Controller
{

    /**
     * Este metodo muestra el panel principal de los Customers.
     * @return mixed
     */
    public function panel($username){

        $user = Auth::user();
        $customers = $user->customers()->get();

        return view::make('customers.panel',array(
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

        $totalSales = Bills::where('customer_id',$customer->id)->count();
        return view('customers.profile',[
            'customer' => $customer,
            'totalSales' => $totalSales
        ]);
    }

    /**
     * Metodo para mostrar el formulario para crear un customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create($username){

        return view('customers.create')->render();
    }

    /**
     *Guarda en la base de datos un nuevo cliente si no hay problemas de validacion
     * @param CreateCustomersRequest $request
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateCustomersRequest $request){

        $user = Auth::user();
        if( $image = $request->file('image') ){
            $url = $image->store('ImageCustomers','public');
        }else{
            $url = "https://picsum.photos/150/150/?random";
        }

        Customer::create([
            'name' => $request->input('name'),
            'user_id' => $user->id,
            'surnames' => $request->input('surnames'),
            'type_customers' => $request->input('type_customer'),
            'image' => $url,
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
     * Muestra el formualrio para editar el Cliente
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
     * @param Customer $customer
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreateCustomersRequest $request, Customer $customer ){
        $user = User::find($customer->user_id);


        if( $image = $request->file('image') ){
            if( !strpos($customer->image, "http") ) {
                $routeParts = explode('/', $customer->image);
                Storage::disk('public')->delete('ImageCustomers/'.end($routeParts));
            }

            $url = $image->store('ImageCustomers','public');
        }else{
            $url = $customer->image;
        }


        $customer->update([
            'name' => $request->input('name'),
            'surnames' => $request->input('surnames'),
            'type_customers' => $request->input('type_customer'),
            'image' => $url,
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
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){

        Customer::where('id',$id)->delete();

       return redirect('/home/'.Auth::user()->username.'/customers/panel');
    }

}
