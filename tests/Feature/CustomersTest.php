<?php

namespace Tests\Feature;

use App\Customer;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
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
     * Este test comprueba si se carga el formulario para crear un nuevo Customer
     */
    public function testFormCreatePage(){
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
     * Test que comprueba si se crea un cliente
     */
    public function testStore(){
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->post('/customers/new', [
            'name' => 'cliente prueba',
            'surnames' => 'prueba',
            'type_customer' => 'potencial',
            'address' => 'prueba',
            'image' => 'imagen.png',
            'movil' => '594859',
            'email' => 'prueba@gmail.com',
            'company' => 'prueba',
            'job_title' => 'prueba',
            'notes' => 'prueba',
        ]);

        $this->assertDatabaseHas('customers', [
            'name' => 'cliente prueba'
        ]);
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

    /**
     * Comprueba si se actualiza un Cliente
     */
    public function testUpdate(){
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create([
            'user_id' => $user->id,
        ]);
        $this->actingAs($user);

        $this->put('/customers/edit/'.$customer->id, [
            'name' => 'cliente prueba Actualizado',
            'surnames' => 'prueba Actualizado',
            'type_customer' => 'potencial',
            'address' => 'prueba Actualizado',
            'image' => 'imagen.png',
            'movil' => '5948594',
            'email' => 'prueba@gmail.com',
            'company' => 'prueba Actualizado',
            'job_title' => 'prueba',
            'notes' => 'prueba',
        ]);

        $this->assertDatabaseHas('customers', [
            'id'        => $customer->id,
            'name' => 'cliente prueba Actualizado',
        ]);



    }


}
