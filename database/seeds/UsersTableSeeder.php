<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users= factory(App\User::class,10)->create();



        $users->each(function (App\User $user){
            $customers = factory(App\Customer::class)
               ->times(15)
               ->create([
                   'user_id' => $user->id,
               ]);
            $products= factory(App\Product::class)
                ->times(30)
                ->create([
                   'user_id' => $user->id,
                ]);


        });
    }
}
