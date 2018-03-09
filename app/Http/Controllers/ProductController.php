<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;


class ProductController extends Controller
{


    /**
     * Muestra el panel que gestiona las opciones de los productos.
     *
     * @param $username
     * @return mixed
     */
    public function panel($username){

        $user = Auth::user();

        $products = $user->products()->paginate(6);


        return view::make('product.panel',[
            'products' => $products
        ])->render();
    }



    /**
     * Muestra el formulario de creacion de un nuevo producto
     *
     * @return \Illuminate\Http\Response
     */
    public function create($username)
    {
        return view::make('product.create')->render();
    }

    /**
     * Guarda en la base de dato el nuevo producto despues de pasasar por la validación.
     *
     * @param CreateProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        $user= Auth::user();

        if( $image = $request->file('image') ){
            $url = $image->store('ImageProducts','public');
        }else{
            $url = "https://picsum.photos/150/150/?random";
        }

        Product::create([
            'name' => $request->input('name'),
            'user_id' => $user->id,
            'description' => $request->input('description'),
            'type_product' => $request->input('type_product'),
            'image' => $url,
            'price' => $request->input('price'),
        ]);

        return redirect('/home/'.$user->username.'/products/panel');
    }

    /**
     * Muestra toda la informacion del producto
     *
     * @param $username
     * @param product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username,Product $product)
    {
        $countSales = $product->bills()->where('product_id',$product->id)->count();


        return view('product.profile',[
                'product' => $product,
                'sales' => $countSales
            ]);
    }

    /**
     * Muestra el formulario para editar el producto
     *
     * @param $username
     * @param product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($username, Product $product)
    {
        return view('product.edit',[
            'product' => $product
        ]);
    }

    /**
     * Actualiza el producto con los nuevos datos
     *
     * @param CreateProductRequest $request
     * @param product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreateProductRequest $request, Product $product)
    {
        $user = Auth::user();
        if( $image = $request->file('image') ){
            if( !strpos($product->image, "http") ) {
                $routeParts = explode('/', $product->image);
                Storage::disk('public')->delete('ImageProducts/'.end($routeParts));
            }

            $url = $image->store('ImageProducts','public');
        }else{
            $url = $product->image;
        }


        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' =>$url,
            'type_product' => $request->input('type_product'),
            'description' => $request->input('description'),
        ]);

        return redirect('/home/'.$user->username.'/products/profile/'.$product->id);
    }

    /**
     * Elimina el producto con el id recibido
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        Product::where('id',$id)->delete();


        return redirect('/home/'.Auth::user()->username.'/products/panel');
    }
}
