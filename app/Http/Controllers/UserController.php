<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{


    /**
     * Pagina principal del usuario
     */

    public function home(){
        return view('user.panel');
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
     * @param $name
     * @return void
     */
    public function show($name)
    {
        $user= DB::table('users')->where('username', $name)->first();


        return view('user.profile')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $name
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $user= DB::table('users')->where('username', $name)->first();
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUserRequest $request
     * @param  int $id
     * @return void
     */
    public function update(CreateUserRequest $request, $id)
    {

        $user = User::find($id);
        $user->name = $_POST['name']?$_POST['name']:null;
        $user->surnames = $_POST['surname']?$_POST['surname']:null;
        $user->email = $request->input('email');
        $user->movil = $request->input('movil');
        $user->sector = $_POST['sector']?$_POST['sector']:null;
        $user->avatar = $_POST['avatar']?$_POST['avatar']:null;
        $user->website = $_POST['website']?$_POST['website']:null;

        $user->save();

        return redirect('/home');
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
