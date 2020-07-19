<?php

use Illuminate\Database\Seeder;

class TypeOfMeatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('type_of_meats')->insert([
            [
                'name' => 'Fish'
            ]
        ]);
    }
}
