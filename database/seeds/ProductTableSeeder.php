<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
            [
                'food_type_id' => 1,
                'type_meat_id' => 1,
                'name' => 'Diavolo',
                'price' => 1.5,
                'big_image' => 'images/big/diavolo.jpg',
                'small_image' => 'images/diavolo.jpg'
            ],
            [
                'food_type_id' => 1,
                'type_meat_id' => 11,
                'name' => 'Magherita',
                'price' => 1,
                'big_image' => 'images/big/margarita.jpg',
                'small_image' => 'images/margarita.jpg'
            ],
            [
                'food_type_id' => 1,
                'type_meat_id' => 21,
                'name' => 'Pizza Mare',
                'price' => 1.4,
                'big_image' => 'images/big/pizza-mare.jpg',
                'small_image' => 'images/pizza-mare.jpg'
            ],
            [
                'food_type_id' => 1,
                'type_meat_id' => 1,
                'name' => 'Dolce Vita',
                'price' => 1.3,
                'big_image' => 'images/big/dolce-vita.jpg',
                'small_image' => 'images/dolce-vita.jpg'
            ],
            [
                'food_type_id' => 1,
                'type_meat_id' => 11,
                'name' => 'Vegeterian',
                'price' => 1.1,
                'big_image' => 'images/big/vegeterian.jpg',
                'small_image' => 'images/vegeterian.jpg'
            ],
            [
                'food_type_id' => 1,
                'type_meat_id' => 21,
                'name' => 'Tuna',
                'price' => 1.1,
                'big_image' => 'images/big/tuna.jpg',
                'small_image' => 'images/tuna.jpg'
            ],
            [
                'food_type_id' => 11,
                'type_meat_id' => 1,
                'name' => 'Carbonara',
                'price' => 2.5,
                'big_image' => 'images/big/carbonara.jpg',
                'small_image' => 'images/carbonara.jpg'
            ],
            [
                'food_type_id' => 21,
                'type_meat_id' => 1,
                'name' => 'Calzone',
                'price' => 2,
                'big_image' => 'images/big/calzone.jpg',
                'small_image' => 'images/calzone.jpg'
            ],
            [
                'food_type_id' => 1,
                'type_meat_id' => 11,
                'name' => 'Triple mushrooms',
                'price' => 1.4,
                'big_image' => 'images/big/triple-mushroom.jpg',
                'small_image' => 'images/triple-mushroom.jpg'
            ],
            [
                'food_type_id' => 11,
                'type_meat_id' => 1,
                'name' => 'Bolognese',
                'price' => 3.1,
                'big_image' => 'images/big/bolognese.jpg',
                'small_image' => 'images/bolognese.jpg'
            ]
        ]);
    }
}
