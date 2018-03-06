<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
     * Display the specified resource.
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
     * Show the form for editing the specified resource.
     *
     * @param $username
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('user.edit.panel',['user' => $this->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @return void
     */
    public function update(UpdateUserRequest $request)
    {
        $path = $request->path();

        if( strpos($path, 'data')) {
            $data = array_filter($request->all());
            $user = User::findOrFail($this->user->id);

            $user->fill($data);
        }elseif ( strpos($path, 'password') ){


            if( ! Hash::check($request->get('currentPassword'), $this->user->password ) ){
                return redirect()->back()->with('error', 'La constraseña actual no es correcta');
            }

            if( strcmp($request->get('currentPassword'), $request->get('newPassword')) == 0){
                return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
            }

            $this->user->password = bcrypt($request->get('newpasswordPassword'));
        }

        $user->save();

        return redirect()
            ->route('user.edit')
            ->with('exito', 'Datos actualizados');


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
