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
    public function testPanel()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id,
        ]);


        $response = $this->actingAs($user)->get('/home/' . $user->username . '/products/panel');

        $response->assertStatus(200);
        $response->assertSee($user->avatar);
        $response->assertSee('home');
        $response->assertSee('contacts');
        $response->assertSee('List Of Products');


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


        $response = $this->actingAs($user)->get('/home/' . $user->username . '/products/profile/' . $product->id);

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee('Description');
        $response->assertSee('logout');

    }


    /**
     * Este test comprueba si se carga el formulario para crear un nuevo Producto
     */
    public function testFormNewPage()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/home/' . $user->username . '/products/new');
        $response->assertStatus(200);
    }

    /**
     * Test que comprueba si se crea un producto
     */
    public function testStore()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->post('/products/new', [
            'name' => 'producto prueba',
            'type_product' => 'bienes',
            'price' => '45',
            'description' => 'prueba de producto',
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'producto prueba'
        ]);
    }

    /**
     * Comprueba si un producto puede ser eliminado
     */
    public function testDelete()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->delete('products/delete/' . $product->id);

        $response->assertStatus(302);
    }

    /**
     * Este test comprueba si se carga el formulario para editar el Producto
     */
    public function testFormEditPage()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->get('/home/' . $user->username . '/products/edit/' . $product->id);
        $response->assertStatus(200);
        $response->assertSee('name');
        $response->assertSee('Type Product');
        $response->assertSee('Description');

    }

    /**
     * Comprueba si se actualiza un Producto
     */
    public function testUpdate()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create([
            'user_id' => $user->id,
        ]);
        $this->actingAs($user);

        $this->put('/products/edit/' . $product->id, [
            'name' => 'Producto prueba Actualizado',
            'type_product' => 'servicio',
            'price' => '145',
            'description' => 'prueba de producto',
        ]);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Producto prueba Actualizado',
            'type_product' => 'servicio',
        ]);
    }
}
