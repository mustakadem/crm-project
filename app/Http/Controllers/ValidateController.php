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
                'address' => 'string|required'
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
            ]);
        }else if($campo == 'image'){
            $validator = Validator::make($request->all(),[
                'image' => 'string|required'
            ]);
        }else if($campo == 'price'){
            $validator = Validator::make($request->all(),[
                'price' => 'numeric|required'
            ]);
        }else if($campo == 'type_product'){
            $validator = Validator::make($request->all(),[
                'type_product' => 'required|in:servicio,bienes'
            ]);
        }else if($campo == 'description'){
            $validator = Validator::make($request->all(),[
                'description' => 'string|required|max:300|min:10'
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
                'address' => 'string|required'
            ]);
        }else if($campo == 'movil'){
            $validator = Validator::make($request->all(),[
                'movil' => 'numeric|required|min:6'
            ]);
        }

        $errors=$validator->errors();



        return response()->json([
            $campo => $errors->get($campo)
        ]);
    }
}
