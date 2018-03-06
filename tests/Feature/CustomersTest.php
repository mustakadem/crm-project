<?php

namespace Tests\Feature;

use App\Customer;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomersTest extends TestCase
{

    use DatabaseTransactions;




    public function testPanel(){
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create([
            'user_id' => $user->id,
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);


        $response = $this->get('/home/'.$user->username.'/customers/panel');

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

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);


        $response = $this->get('/home/'.$user->username.'/customers/profile/'.$customer->id);

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

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);


        $response = $this->get('/home/'.$user->username.'/customers/list');

        $response->assertStatus(200);
        $response->assertSee($customer->name);

    }
}
