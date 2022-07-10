<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Meal;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PivotSeeder extends Seeder
{
    use TruncateTable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate all pivot tables
        $this->truncate(['meal_tag', 'meal_ingredient']);

        // get number of database rows
        $count = Meal::query()->count();
        $tag_count = Tag::query()->count();
        $ingredient_count = Ingredient::query()->count();
        // 
        Meal::all()->each(function (Meal $meal) use ($tag_count, $ingredient_count) {
            $attached = [];
            foreach(range(1, random_int(random_int(1, $tag_count), $tag_count)) as $number) {
                $random_int = random_int(1, $number);
                if(in_array($random_int, $attached)) {
                    continue;
                }
                $meal->tags()->attach($random_int);
                array_push($attached, $random_int);
            }

            foreach(range(1, random_int(random_int(1, $ingredient_count), $ingredient_count)) as $number) {
                $random_int = random_int(1, $number);
                if(in_array($random_int, $attached)) {
                    continue;
                }
                $meal->ingredients()->attach($random_int);
                array_push($attached, $random_int);
            }
        });

        
        
        // $meals->each(function(Meal $meal) {$meal->tags()->sync([1,2,3,4,5,6,7,8]);})
    }
}
