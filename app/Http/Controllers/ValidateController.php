<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateController extends Controller
{

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
            ],[
                'name.required' => 'El campo nombre es requerido',
                'name.min' => 'Minimo 4 caracteres'
            ]);
        }else if($campo == 'surnames'){
            $validator = Validator::make($request->all(),[
                'surnames' => 'string|min:4|required'
            ],[
                'surnames.required' => 'El campo  Surnames es requerido',
                'surnames.min' => 'Minimo 4 caracteres'
            ]);
        }else if($campo == 'email'){
            $validator = Validator::make($request->all(),[
                'email' => 'email|required'
            ],[
                'email.email' => 'Debes introducir un email valido',
                'email.required' => 'El campo email es requerido'
            ]);
        }else if($campo == 'address'){
            $validator = Validator::make($request->all(),[
                'address' => 'string|required'
            ],[
                'address.required' =>'El campo address es requerido'
            ]);
        }else if($campo == 'movil'){
            $validator = Validator::make($request->all(),[
                'movil' => 'numeric|required|min:6'
            ],[
                'movil.required' => 'El campo movil es requerido',
                'movil.numeric' => 'El campo movil solo admite numeros',
                'movil.min' => 'Minimo debe contener 6 digitos'
            ]);
        }else if($campo == 'job_title'){
            $validator = Validator::make($request->all(),[
                'job_title' => 'string|min:4|nullable'
            ],[
                'job_title.min' => 'Minimo debe contener 4 caracteres'
            ]);
        }else if($campo == 'company'){
            $validator = Validator::make($request->all(),[
                'company' => 'string|min:4|nullable'
            ],[
                'company.min' => 'Minimo debe contener 4 caracteres'
            ]);
        }else if($campo == 'type_customer'){
            $validator = Validator::make($request->all(),[
                'type_customer' => 'in:potencial,activo,exporadico'
            ],[
                'type_customer.in' => 'Selecciona un tipo valido'
            ]);
        }

        $errors=$validator->errors();



        return response()->json([
            $campo => $errors->get($campo)
        ]);
    }

    /**
     * Metodo para la validacion asincrona en cliente
     * @param Request $request
     * @param $campo
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateNewProduct(Request $request , $campo){



        if ($campo == 'name'){
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|min:4'
            ],[
                'name.required' => 'El campo name es requerido',
                'name.min' => 'Minimo 4 caracteres'
            ]);
        }else if($campo == 'image'){
            $validator = Validator::make($request->all(),[
                'image' => 'string|required'
            ],[
                'image.required' => 'El campo image es requerido',
            ]);
        }else if($campo == 'price'){
            $validator = Validator::make($request->all(),[
                'price' => 'numeric|required'
            ],[
                'price.required' => 'El campo price es requerido',
                'price.numeric' => 'El campo price solo admite digitos'
            ]);
        }else if($campo == 'type_product'){
            $validator = Validator::make($request->all(),[
                'type_product' => 'required|in:servicio,bienes'
            ],[
                'type_product.in' => 'Selecciona un tipo valido',
                'type_product.required' => 'El campo es requerido'
            ]);
        }else if($campo == 'description'){
            $validator = Validator::make($request->all(),[
                'description' => 'string|required|max:300|min:10'
            ],[
               'description.required' => 'La descripcion es obligatoria',
               'description.max' => 'Maximo 300 caracteres',
               'description.min' => 'Minimo 10 caracteres'
            ]);

        }

        $errors=$validator->errors();



        return response()->json([
            $campo => $errors->get($campo)
        ]);
    }

    public function validateNewBill(Request $request ){

        $validator = Validator::make($request->all(),[
            'products' => 'required'
            ]);


        $errors=$validator->errors();

        return response()->json([
            'products' => $errors->get('products')
        ]);
    }

    /**
     * Metodo para la validacion de contactos asincrona en cliente
     * @param Request $request
     * @param $campo
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateNewContact(Request $request , $campo){



        if ($campo == 'name'){
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|min:4'
            ],[
                'name.required' => 'El campo name es requerido',
                'name.min' => 'Minimo 4 caracteres'
            ]);
        }else if($campo == 'surnames'){
            $validator = Validator::make($request->all(),[
                'surnames' => 'string|min:4|required'
            ],[
                'surnames.required' => 'El campo surnames es requerido',
                'surnames.min' => 'Minimo 4 caracteres'
            ]);
        }else if($campo == 'email'){
            $validator = Validator::make($request->all(),[
                'email' => 'email|required'
            ],[
                'email.email' => 'Debes introducir un email valido',
                'email.required' => 'El campo email es requerido'
            ]);
        }else if($campo == 'address'){
            $validator = Validator::make($request->all(),[
                'address' => 'string|required'
            ],[
                'address.required' =>'El campo address es requerido'
            ]);
        }else if($campo == 'movil'){
            $validator = Validator::make($request->all(),[
                'movil' => 'numeric|required|min:6'
            ],[
                'movil.required' => 'El campo movil es requerido',
                'movil.numeric' => 'El campo movil solo admite numeros',
                'movil.min' => 'Minimo debe contener 6 digitos'
            ]);
        }

        $errors=$validator->errors();



        return response()->json([
            $campo => $errors->get($campo)
        ]);
    }

    /**
     * @param Request $request
     * @param $dato
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateRegister(Request $request,$dato){


        if ($dato == 'username') {
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:20|min:4|unique:users'
            ],[
                'username.required' => 'El nombre de usuario es obligatorio',
                'username.max' => 'Maximo 20 caracteres',
                'username.min' => 'Minimo 4 caracteres',
                'username.unique' => 'El nombre de usuario ya existe',
            ]);
        }
        if ($dato == 'email') {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users'
            ],[
                'email.required' => 'El email es obligatorio',
                'email.email' => 'Introduce un email valido',
                'email.unique' => 'El email ya esta registrado'
            ]);
        }

        if ($dato == 'password'){
            $validator = Validator::make($request->all(),[
                'password' => 'required|string|min:6|confirmed'
            ],[
                'password.required' => 'Introduzca la contraseña',
                'password.min' => 'Minimo 6 caracteres',
                'password.confirmed' => 'Las contraseñas no coinciden'
            ]);
        }


        $errors=$validator->errors();

        return response()->json([
            $dato => $errors->get($dato)
        ]);
    }
}
