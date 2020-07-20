<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Customer::class, 50)->create()->each(function($customer){
            $customer->sales()->saveMany(factory(App\Sale::class,3)->make());
       });
    }
}
