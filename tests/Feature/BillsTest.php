<?php

namespace Tests\Feature;

use App\Bills;
use App\Customer;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BillsTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * Se comprueba si se muestra el panel pricipal de la entidad Bill
     */
    public function testPanel()
    {
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create([
           'user_id' => $user->id
        ]);
        $bill = Bills::create([
            'user_id' => $user->id,
            'customer_id' => $customer->id,
            'price' => 45,
            'discount' => 5,
            'total' => 40
        ]);


        $response = $this->actingAs($user)->get('/home/' . $user->username . '/bills/panel');

        $response->assertStatus(200);
        $response->assertSee($user->avatar);
        $response->assertSee('home');
        $response->assertSee('contacts');
        $response->assertSee('List Bills');
        $response->assertSee('Bill  ID#');

    }


    /**
     * Este test comprueba si se carga el formulario para crear una Bill
     */
    public function testFormNewPage()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/home/' . $user->username . '/bills/new');
        $response->assertStatus(200);

    }

//    /**
//     * Test que comprueba si se crea una Bill
//     */
//    public function testStore()
//    {
//        $user = factory(User::class)->create();
//        $customer = factory(Customer::class)->create([
//            'user_id' => $user->id
//        ]);
//        $this->actingAs($user);
//
//       $this->post('/bills/new', [
//           'user_id' => $user->id,
//            'customer_id' => $customer->id,
//            'price' => 45,
//            'discount' => 5,
//            'total' => 40
//        ]);
//
//        $this->assertDatabaseHas('bills', [
//            'customer_id' => $customer->id
//        ]);
//    }


    /**
     * Comprueba si una bill puede ser eliminado
     */
    public function testDelete()
    {
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create([
            'user_id' => $user->id
        ]);
        $bill = Bills::create([
            'user_id' => $user->id,
            'customer_id' => $customer->id,
            'price' => 45,
            'discount' => 5,
            'total' => 40
        ]);

        $response = $this->delete('bills/delete/' . $bill->id);

        $response->assertStatus(302);
    }

}
