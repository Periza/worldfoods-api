<?php

namespace Database\Seeders;


use App\Models\Meal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguangeSeeder extends Seeder
{
    use TruncateTable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate previous entries
        $this->truncate(['category_translations', 'ingredient_translations', 'meal_translations', 'tag_translations']);

        // get all locales
        $locales = Config::get('translatable.locales');

       /*  function get_faker_locale(string $loc) : string {
            switch ($loc) {
                case 'en':
                    return 'en_US';
                case 'fr':
                    return 'fr_FR';
                case 'de':
                    return 'de_DE';
                case 'it':
                    return 'it_IT';
                case 'hr':
                    return 'hr_HR';
                default:
                    return 'en_US';
            }
        }; */

        // counts
        
        $num_of_tags = DB::table('tags')->count();
        
        function seedMeals($locale) {
            $faker = \Faker\Factory::create();
            $num_of_meals = DB::table('meals')->count();
            for($i = 1; $i <= $num_of_meals; $i++) {
                DB::table('meal_translations')->insert(['locale' => $locale, 'meal_id' => $i, 'title' => $faker->words(random_int(1, 5), true)." ".$locale, 'description' => $faker->sentence(random_int(1,3))."-".$locale]);
            }
        }

        function seedIngredients($locale) {
            $faker = \Faker\Factory::create();
            $num_of_ingredients = DB::table('ingredients')->count();
            for($i = 1; $i <= $num_of_ingredients; $i++) {
                DB::table('ingredient_translations')->insert(['locale' => $locale, 'ingredient_id' => $i, 'title' => $faker->words(random_int(1,4), true).'-'.$locale]);
            }
        }

        function seedCategories($locale) {
            $faker = \Faker\Factory::create();
            $num_of_categories = DB::table('categories')->count();
            for($i = 1; $i <= $num_of_categories; $i++) {
                DB::table('category_translations')->insert(['locale' => $locale, 'category_id' => $i, 'title' => $faker->words(random_int(1,2), true).'-'.$locale]);
            } 
        }

        function seedTags($locale) {
            $faker = \Faker\Factory::create();
            $num_of_tags = DB::table('tags')->count();
            for($i = 1; $i <= $num_of_tags; $i++) {
                DB::table('tag_translations')->insert(['locale' => $locale, 'tag_id' => $i, 'title' => $faker->words(1, true).'-'.$locale]);
            }
        }

        // for every locale
        foreach($locales as $locale) {
            seedMeals($locale);
            seedIngredients($locale);
            seedCategories($locale);
            seedTags($locale);
        }

        




        

    }
}
