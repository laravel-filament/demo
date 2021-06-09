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
        $start = microtime(true);
        $this->command->info('Start seeding...');

        $customers = \App\Models\Customer::factory(234)->create();

        $customerIds = $customers->pluck('id');
        $orders = \App\Models\Order::factory(1577)->create([
            'customer_id' => $customerIds->random(),
            'deliver_at' => now()->addSeconds(rand(1, 2592000)),
        ]);

        $products = \App\Models\Product::factory(876)->create();

        $users = User::factory(100)->create();

        $productIds = $products->pluck('id');
        $orders->each(function ($order) use ($productIds) {
            $order->products()->attach($productIds->random(5));
        });

        $this->command->info('✔ OK. Took '.microtime(true)-$start.' seconds.');
    }
}
