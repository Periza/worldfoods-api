<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeginKeys;

class MealsSeeder extends Seeder
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
        $this->enableForeignKeys();
    }
}
