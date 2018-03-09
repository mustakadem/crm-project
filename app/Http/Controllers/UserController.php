<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

    private $user;
    public function __construct()
    {
        $this->middleware( function($request, $next){
            $this->user = auth()->user();
            return $next($request);
        });
        $this->user = auth()->user();
    }


    /**
     * Pagina principal del usuario
     * Mustra los productos mas vendidos y los mas caros.
     * Devuelve los clientes creados en la ultima semana y los clientes que estan por encima de la media en el total de compras
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(){

        $now=Carbon::now();

        $media= DB::table('bills')->avg('total');
        $totalCustomers = $this->user->customers()->get();
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


        $totalProducts = $this->user->products()->get();

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

        return view('user.panel', [
            'user' => $this->user,
            'customersMorePurchases' => $customersMorePurchases,
            'customersOfTheWeek' => $customersOfTheWeek,
            'topProducts' => $topProducts,
            'moreExpensiveProduct' => $moreExpensiveProduct
        ]);
    }


    /**
     * Muestra todos los datos del usuario
     *
     * @param $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username)
    {
        $user= User::where('username', $username)->first();


        return view('user.profile')->with('user',$user);
    }


    /**
     * Muestra el panel principal para elegir que parte de datos se quiere actualizar
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('user.edit.panel',['user' => $this->user]);
    }

    /**
     * Actualiza parte de los datos del usuario dependiendo de la ruta que recibe.
     *
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request)
    {
        $path = $request->path();
        $user = User::findOrFail($this->user->id);

        if( strpos($path, 'data')) {
            $data = array_filter($request->all());


            $user->fill($data);



        }elseif ( strpos($path, 'password') ){


            if( ! Hash::check($request->get('current_password'), $this->user->password ) ){
                return redirect()->back()->with('error', 'La constraseña actual no es correcta');;
            }

            if( strcmp($request->get('current_password'), $request->get('password')) == 0){
                return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');;
            }

            $this->user->password = bcrypt($request->get('password'));
        }elseif (strpos($path, 'avatar')){

            if( $image = $request->file('image') ){

                if( !strpos($user->image, "http") ) {
                    $routeParts = explode('/', $user->image);
                    Storage::disk('public')->delete('ImageUsers/'.end($routeParts));
                }

                $url = $image->store('ImageUsers','public');
            }else{
                $url = $user->image;
            }
        }

        $user->save();

        return redirect()
            ->route('user.edit');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->user->delete();

        return redirect()->route('/home');
    }


    /**
     * Registra la ip y el cliente cada vez que hay un login
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function dataLogin(Request $request){

        $ip = $request->ip();

        $agent = ($request->server->getHeaders())['USER_AGENT'];

        DB::table('data_session')->insert([
            'user_id' => $this->user->id,
            'ip' => $ip,
            'explore' => $agent,
            'created_at' => now()
        ]);

        return redirect('/home');

    }
}
