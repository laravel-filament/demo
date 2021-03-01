<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Filament\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Customer::factory(234)->create();
        \App\Models\Order::factory(1577)->create();
        \App\Models\Product::factory(876)->create();
        User::factory(100)->create();

        Order::all()->each(function ($order) {
            $order->deliver_at = now()->addSeconds(rand(1, 2592000));
            $order->save();

            $order->products()->attach(Product::all()->random());
            $order->products()->attach(Product::all()->random());
            $order->products()->attach(Product::all()->random());
            $order->products()->attach(Product::all()->random());
            $order->products()->attach(Product::all()->random());
        });
    }
}
