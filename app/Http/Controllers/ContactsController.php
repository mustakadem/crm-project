<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
   public function index($username){
       $user = User::where('username',$username)->first();

       $contacts = $user->contacts()->get();

       return view('contacts.panel',[
           'contacts' => $contacts
       ]);

   }
}
