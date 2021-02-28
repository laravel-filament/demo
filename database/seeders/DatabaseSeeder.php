<?php

namespace Database\Seeders;

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
         \App\Models\Customer::factory(100)->create();
        User::factory(100)->create();
    }
}
