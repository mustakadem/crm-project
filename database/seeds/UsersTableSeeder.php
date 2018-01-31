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

        $users->each(function (App\User $users){
            $customers = factory(App\Customer::class)
               ->times(15)
               ->create([
                   'user_id' => $users->id,
               ]);
        });
    }
}
