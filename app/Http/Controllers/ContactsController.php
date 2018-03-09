<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\CreateContactsRequest;
use App\Http\Requests\CreateCustomersRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
     * Muestra el perfil del contacto
     * @param $username
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function show($username, Contact $contact){
       return view('contacts.profile',[
           'contact' => $contact,
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

    /**
     *Guarda en la base de datos un nuevo contacto si no hay problemas de validacion
     * @param CreateContactsRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateContactsRequest $request){

        $user = Auth::user();
        if( $image = $request->file('image') ){
            $url = $image->store('ImageContacts','public');
        }else{
            $url = "https://picsum.photos/150/150/?random";
        }

        Contact::create([
            'name' => $request->input('name'),
            'user_id' => $user->id,
            'surnames' => $request->input('surnames'),
            'image' => $url,
            'address' => $request->input('address'),
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'notes' =>  $request->input('notes'),
        ]);

        return redirect('/home/'.$user->username.'/contacts/panel');

    }

    public function edit($username , Contact $contact){

        return view('contacts.edit',[
            'contact' => $contact
        ]);
    }

    /**
     * Actualiza el contacto si no hay fallos de validacion
     * @param CreateContactsRequest $request
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreateContactsRequest $request, Contact $contact){
        $user = User::find($contact->user_id);

        if( $image = $request->file('image') ){
            if( !strpos($contact->image, "http") ) {
                $routeParts = explode('/', $contact->image);
                Storage::disk('public')->delete('ImageContacts/'.end($routeParts));
            }

            $url = $image->store('ImageContacts','public');
        }else{
            $url = $contact->image;
        }


        $contact->update([
            'name' => $request->input('name'),
            'surnames' => $request->input('surnames'),
            'image' => $url,
            'address' => $request->input('address'),
            'movil' => $request->input('movil'),
            'email' => $request->input('email'),
            'notes' =>  $request->input('notes'),
        ]);

        return redirect('/home/'.$user->username.'/contacts/profile/'.$contact->id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){

        Contact::where('id',$id)->delete();

        return redirect('/home/'.Auth::user()->username.'/contacts/panel');
    }
}
