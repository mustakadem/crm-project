<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(){
        return view('user.panel', ['user' => $this->user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Muestra todos los datos del usuario
     *
     * @param $username
     * @return void
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
     * @return void
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
        }

        $user->save();

        return redirect()
            ->route('user.edit');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
