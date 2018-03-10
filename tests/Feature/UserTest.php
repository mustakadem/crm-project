<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Se comprueba la vista home del usuario
     */
    public function testHome(){
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
        $response->assertSee($user->avatar);
        $response->assertSee('home');
        $response->assertSee('contacts');
        $response->assertSee('Products');
        $response->assertSee('Customers');
        $response->assertSee('Bills');

    }

    /**
     * Se comprueba si se muestra la informacion de perfil del Usuario
     *
     * @return void
     */
    public function testProfile()
    {
        $user = factory(User::class)->create();



        $response = $this->actingAs($user)->get('/home/profile/'.$user->username);

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertSee('logout');

    }


    /**
     * Este test comprueba si se carga la pagina para editar el usuario
     */
    public function testFormEditPage()
    {
        $user = factory(User::class)->create();


        $response = $this->actingAs($user)->get('/edit/data');

        $response->assertStatus(200);
        $response->assertSee('Edit Data');
        $response->assertSee('Edit Password');
        $response->assertSee('Edit avatar');

    }

    /**
     * Comprueba si un usuario puede ser eliminado
     */
    public function testDelete()
    {
        $user = factory(User::class)->create();


        $response = $this->delete('/user/delete/'.$user->id);

        $response->assertStatus(302);
    }

    /**
     * Comprueba si se actualiza un Usuario
     */
    public function testUpdateData()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->patch('/edit/data', [
            'name' => 'Actualizado',
            'surnames' => 'prueba',
            'sector' => 'prueba',
            'website' => 'imagen.png',
            'movil' => '516585544',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Actualizado',
            'surnames' => 'prueba',
        ]);
    }

    /**
     * Este test comprueba si se carga la pagina para editar la contraseña
     */
    public function testFormEditPasswordPage()
    {
        $user = factory(User::class)->create();


        $response = $this->actingAs($user)->get('/edit/password');

        $response->assertStatus(200);
        $response->assertSee('Edit Data');
        $response->assertSee('Edit Password');
        $response->assertSee('Edit avatar');

    }

    /**
     * Este test comprueba si se carga la pagina para editar el avatar
     */
    public function testFormEditAvatarPage()
    {
        $user = factory(User::class)->create();


        $response = $this->actingAs($user)->get('/edit/avatar');

        $response->assertStatus(200);
        $response->assertSee('Edit Data');
        $response->assertSee('Edit Password');
        $response->assertSee('Edit avatar');

    }

}
