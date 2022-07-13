<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeginKeys;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    use TruncateTable, DisableForeginKeys;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks
        $this->disableForeignKeys();
        // Truncate table
        $this->truncate('categories');
        Category::factory()->count(15)->create();
        $this->enableForeignKeys();
    }
}
