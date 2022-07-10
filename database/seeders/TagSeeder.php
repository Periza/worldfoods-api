<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeginKeys;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
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
        $this->truncate('tags');
        Tag::factory()->count(15)->create();
        $this->enableForeignKeys();
    }
}
