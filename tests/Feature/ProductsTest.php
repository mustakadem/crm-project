<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{


    use DatabaseTransactions;

    /**
     * Se comprueba si se muestra el panel pricipal de la entidad Product
     */
    public function testPanel(){
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id,
        ]);



        $response = $this->actingAs($user)->get('/home/'.$user->username.'/products/panel');

        $response->assertStatus(200);
        $response->assertSee('Top Product Last Week');
        $response->assertSee($user->avatar);
        $response->assertSee('home');
        $response->assertSee('contacts');

    }

    /**
     * Se comprueba si se muestra la informacion de perfil del Producto
     *
     * @return void
     */
    public function testProfile()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id,
        ]);




        $response = $this->actingAs($user)->get('/home/'.$user->username.'/products/profile/'.$product->id);

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee('Description');
        $response->assertSee('logout');

    }



    /**
     * Se comprueba si se carga el producto en la lista.
     * @return void
     */
    public function testList(){
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id,
        ]);



        $response = $this->actingAs($user)->get('/home/'.$user->username.'/products/list');

        $response->assertStatus(200);
        $response->assertSee('List Of Products');
        $response->assertSee('Product  ID#');


    }

    /**
     * Este test comprueba si se carga el formulario para crear un nuevo Producto
     */
    public function testFormNewPage(){
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/home/'.$user->username.'/products/new');
        $response->assertStatus(200);
    }

    /**
     * Comprueba si un producto puede ser eliminado
     */
    public function testDelete(){
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->delete('customers/delete/'.$product->id);

        $response->assertStatus(302);
    }

    /**
     * Este test comprueba si se carga el formulario para editar el Producto
     */
    public function testFormEditPage(){
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->get('/home/'.$user->username.'/products/edit/'.$product->id);
        $response->assertStatus(200);
        $response->assertSee('name');
        $response->assertSee('Type Product');
        $response->assertSee('Description');

    }
}
