<?php

use Illuminate\Database\Seeder;

class PaymentMethodTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('payment_methods')->insert([
            [
                'name' => 'Cash on delivery'
            ],
            [
                'name' => 'Pay with card'
            ]
        ]);
    }
}
