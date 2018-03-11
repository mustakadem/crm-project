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

        $user1 = \App\User::create([
            'name' => 'juan',
            'surnames' => 'lopez',
            'username' => 'juanLopez',
            'email' => 'juanLopez@gmail.com',
            'movil' => '5435345435',
            'sector' => 'informatica',
            'avatar' => 'https://picsum.photos/150/150/?random',
            'website' => 'http://JuanLopez.com',
            'password' =>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm' // secret
        ]);

        $custormer1 = \App\Customer::create([
            'user_id' => $user1->id,
            'name' => 'manuel',
            'surnames' => 'sanchez',
            'type_customers' => 'activo',
            'image' => 'https://picsum.photos/150/150/?random',
            'address' => 'calle trinta',
            'movil' => '435435435',
            'email' => 'manuelSanchez@gmail.com',
            'company' => 'Master',
            'job_title' => 'Administrativo',
            'notes' => 'Es un cliente que cuidar'
        ]);
        $custormer2 = \App\Customer::create([
            'user_id' => $user1->id,
            'name' => 'pedro',
            'surnames' => 'gabriel',
            'type_customers' => 'activo',
            'image' => 'https://picsum.photos/150/150/?random',
            'address' => 'calle japon',
            'movil' => '435435435',
            'email' => 'pedro@gmail.com',
            'company' => 'Sanco',
            'job_title' => 'Administrativo',
            'notes' => 'Es un cliente que cuidar'
        ]);

             \App\Contact::create([
            'user_id' => $user1->id,
            'name' => 'pablo',
            'surnames' => 'sanchez',
            'image' => 'https://picsum.photos/150/150/?random',
            'address' => 'calle japon',
            'movil' => '435435435',
            'email' => 'pablo@gmail.com',
            'notes' => 'Es un Contacto que cuidar'
        ]);

            \App\Contact::create([
            'user_id' => $user1->id,
            'name' => 'santi',
            'surnames' => 'ramirez',
            'image' => 'https://picsum.photos/150/150/?random',
            'address' => 'calle japon',
            'movil' => '435435435',
            'email' => 'santi@gmail.com',
            'notes' => 'Es un Contacto que cuidar'
        ]);

        $product1 = \App\Product::create([
            'user_id' => $user1->id,
            'name' => 'movil',
            'type_product' => 'servicio',
            'price' => 50,
            'description' => 'el mejor movil de todos',
        ]);
        $product2 = \App\Product::create([
            'user_id' => $user1->id,
            'name' => 'coche',
            'type_product' => 'servicio',
            'price' => 150,
            'description' => 'el mejor coche de todos',
        ]);
        $product3 = \App\Product::create([
            'user_id' => $user1->id,
            'name' => 'radiador',
            'type_product' => 'servicio',
            'price' => 350,
            'description' => 'el mejor radiador de todos',
        ]);

        $image1 = \App\Image::create([
            'path' => 'https://picsum.photos/150/150/?random',

        ]);
        $image2 = \App\Image::create([
            'path' => 'https://picsum.photos/150/150/?random',

        ]);




        $bill1 = \App\Bills::create([
            'user_id' => $user1->id,
            'customer_id' => $custormer1->id,
            'price' => 200,
            'discount' => 5,
            'total' => 195
        ]);
        $bill2 = \App\Bills::create([
            'user_id' => $user1->id,
            'customer_id' => $custormer1->id,
            'price' => 400,
            'discount' => 5,
            'total' => 395
        ]);
        $bill3 = \App\Bills::create([
            'user_id' => $user1->id,
            'customer_id' => $custormer2->id,
            'price' => 550,
            'discount' => 5,
            'total' => 545
        ]);

        $bill1->products()->attach([$product1->id,$product2->id]);
        $bill2->products()->attach([$product1->id,$product3->id]);
        $bill3->products()->attach([$product1->id,$product3->id,$product2->id]);

        $product1->images()->attach($image1->id);
        $product2->images()->attach($image2->id);
        $product3->images()->attach([$image1->id,$image2->id]);





    }
}
