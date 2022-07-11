<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(CategorySeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(MealSeeder::class);
        $this->call(PivotSeeder::class);
        $this->call(LanguangeSeeder::class);
    }
}
