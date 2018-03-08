<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;


class ProductController extends Controller
{


    /**
     * Muestra el panel que gestiona las opciones de los productos.
     * Mustra los productos mas vendidos y los mas caros.
     * @param $username
     * @return mixed
     */
    public function panel($username){

        $now=Carbon::now();


        $user = Auth::user();

        $totalProducts = $user->products()->get();

        $topProducts= array();
        $moreExpensiveProduct= array();
        $media= Product::avg('price');

        $max=0;

        foreach ($totalProducts as $product){


            $total = DB::table('bills_product')->where('product_id',$product->id)->count();

            $difference = $now->diffInDays($product['created_at']);

            if ($max > 0 ? $total >= $max:$total > $max && $difference <= 7 ){
                $max = $total;
                array_push($topProducts,$product);
            }

            if ($product['price'] >= $media){
                array_push($moreExpensiveProduct,$product);
            }
        }

        return view::make('product.panel',[
            'topProducts' => $topProducts,
            'moreExpensiveProduct' => $moreExpensiveProduct
        ])->render();
    }


    /**
     * Muestra la lista de los productos
     *
     * @param $username
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {
        $user = User::where('username',$username)->first();
        $products= $user->products()->paginate(6);

        return view::make('product.list',array(
                'products' => $products
            ))->render();
    }

    /**
     * Muestra el formulario de creacion de un nuevo producto
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view::make('product.create')->render();
    }

    /**
     * Guarda en la base de dato el nuevo producto despues de pasasar por la validación.
     *
     * @param CreateProductRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request,User $user)
    {
        Product::create([
            'name' => $request->input('name'),
            'user_id' => $user->id,
            'description' => $request->input('description'),
            'type_product' => $request->input('type_product'),
            'image' => $request->input('image'),
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
        $countSales = DB::table('bills_product')->where('product_id',$product->id)->count();


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
     * @param $username
     * @param product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreateProductRequest $request,$username, Product $product)
    {
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'type_product' => $request->input('type_product'),
            'description' => $request->input('description'),
        ]);

        return redirect('/home/'.$username.'/products/profile/'.$product->id);
    }

    /**
     * Elimina el producto con el id recibido
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username,$id){

        Product::where('id',$id)->delete();


        return redirect('/home/'.$username.'/products/panel');
    }
}
