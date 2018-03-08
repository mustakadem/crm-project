<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContactsController extends Controller
{
   public function index($username){
       $user = User::where('username',$username)->first();

       $contacts = $user->contacts()->get();

       return view('contacts.panel',[
           'contacts' => $contacts
       ]);

   }


    /**
     * Muestra el formulario de crear un nuevo contacto
     * @param $username
     * @return mixed
     */
    public function create($username){

       return view::make('contacts.create')->render();
   }
}
