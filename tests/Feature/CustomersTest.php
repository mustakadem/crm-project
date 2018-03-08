<?php

namespace Tests\Feature;

use App\Customer;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomersTest extends TestCase
{

    use DatabaseTransactions;


    /**
     * Se comprueba si se muestra el panel pricipal de la entidad Customer
     */
    public function testPanel(){
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create([
            'user_id' => $user->id,
        ]);



        $response = $this->actingAs($user)->get('/home/'.$user->username.'/customers/panel');

        $response->assertStatus(200);
        $response->assertSee($customer->image);
        $response->assertSee($user->avatar);
        $response->assertSee('home');
        $response->assertSee('contacts');

    }

    /**
     * Se comprueba si se muestra la informacion de perfil del cliente
     *
     * @return void
     */
    public function testProfile()
    {
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create([
            'user_id' => $user->id,
        ]);




        $response = $this->actingAs($user)->get('/home/'.$user->username.'/customers/profile/'.$customer->id);

        $response->assertStatus(200);
        $response->assertSee($customer->name);
        $response->assertSee('logout');

    }


    /**
     * Se comprueba si se carga el cliente en la lista.
     * @return void
     */
    public function testList(){
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create([
            'user_id' => $user->id,
        ]);



        $response = $this->actingAs($user)->get('/home/'.$user->username.'/customers/list');

        $response->assertStatus(200);
        $response->assertSee($customer->name);

    }

    /**
     * Este test comprueba si se carga el formulario para crear un nuevo Customer
     */
    public function testFormNewPage(){
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/home/'.$user->username.'/customers/new');
        $response->assertStatus(200);
    }


    /**
     * Comprueba si un customer puede ser eliminado
     */
    public function testDelete(){
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->delete('customers/delete/'.$customer->id);

        $response->assertStatus(302);
    }

    /**
     * Este test comprueba si se carga el formulario para editar el Customer
     */
    public function testFormEditPage(){
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->get('/home/'.$user->username.'/customers/edit/'.$customer->id);
        $response->assertStatus(200);
        $response->assertSee('name');
        $response->assertSee('Type Customer');
    }
}
