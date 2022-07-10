<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;

use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeginKeys;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class MealSeeder extends Seeder
{

    use TruncateTable, DisableForeginKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('meals');
        Meal::factory()->count(50)->create();
        $this->enableForeignKeys();
    }
}
