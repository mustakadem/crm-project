<?php

namespace Tests\Feature;

use App\Contact;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Se comprueba si se muestra el panel pricipal de la entidad Contacts
     */
    public function testPanel()
    {
        $user = factory(User::class)->create();
        $contacts = factory(Contact::class)->create([
            'user_id' => $user->id,
        ]);


        $response = $this->actingAs($user)->get('/home/' . $user->username . '/contacts/panel');

        $response->assertStatus(200);
        $response->assertSee($user->avatar);
        $response->assertSee('home');
        $response->assertSee('contacts');
        $response->assertSee('List Of Contacts');

    }

    /**
     * Se comprueba si se muestra la informacion de perfil del Producto
     *
     * @return void
     */
    public function testProfile()
    {
        $user = factory(User::class)->create();
        $contacts = factory(Contact::class)->create([
            'user_id' => $user->id,
        ]);


        $response = $this->actingAs($user)->get('/home/' . $user->username . '/contacts/profile/' . $contacts->id);

        $response->assertStatus(200);
        $response->assertSee($contacts->name);
        $response->assertSee('Notes');
        $response->assertSee('logout');

    }

    /**
     * Este test comprueba si se carga el formulario para crear un nuevo Contacts
     */
    public function testFormNewPage()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/home/' . $user->username . '/contacts/new');
        $response->assertStatus(200);
    }

    /**
     * Test que comprueba si se crea un contacto
     */
    public function testStore()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->post('/contacts/new', [
            'name' => 'contacto prueba',
            'surnames' => 'prueba',
            'image' => 'imagen.png',
            'address' => 'prueba de contacto',
            'movil' => '65168468848',
            'email' => 'prueba@gmail.com',
            'notes' => 'prueba de las pruebas',

        ]);

        $this->assertDatabaseHas('contacts', [
            'name' => 'contacto prueba'
        ]);
    }

    /**
     * Comprueba si un producto puede ser eliminado
     */
    public function testDelete()
    {
        $user = factory(User::class)->create();
        $contacts = factory(Contact::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->delete('contacts/delete/' . $contacts->id);

        $response->assertStatus(302);
    }

    /**
     * Este test comprueba si se carga el formulario para editar el Contacto
     */
    public function testFormEditPage()
    {
        $user = factory(User::class)->create();
        $contacts = factory(Contact::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->get('/home/' . $user->username . '/contacts/edit/' . $contacts->id);
        $response->assertStatus(200);
        $response->assertSee('name');
        $response->assertSee('Edit Contact');
        $response->assertSee('Añadir Imagen');

    }


    /**
     * Comprueba si se actualiza un Contacto
     */
    public function testUpdate()
    {
        $user = factory(User::class)->create();
        $contacts = factory(Contact::class)->create([
            'user_id' => $user->id,
        ]);


        $this->actingAs($user);

        $this->put('/contacts/edit/' . $contacts->id, [
            'name' => 'Contacto prueba Actualizado',
            'surnames' => 'prueba',
            'image' => 'imagen.png',
            'address' => 'prueba de contacto Actualizado',
            'movil' => '65168468848',
            'email' => 'prueba@gmail.com',
            'notes' => 'prueba de las pruebas',
        ]);

        $this->assertDatabaseHas('contacts', [
            'id' => $contacts->id,
            'name' => 'Contacto prueba Actualizado',
            'address' => 'prueba de contacto Actualizado',
        ]);
    }
}
