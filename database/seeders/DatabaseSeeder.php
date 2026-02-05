<?php

namespace Database\Seeders;

use Database\Factories\CumpleFactory;
use Illuminate\Database\Seeder;
use App\Models\Cumple;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Cumple::factory(50)->create();
    }
}
