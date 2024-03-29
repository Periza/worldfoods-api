<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Ingredient extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $timestamps = false;
    public $translatedAttributes = ['title'];

    protected $fillable = ['slug'];

    protected $hidden=['pivot', 'translations'];

    public function meals() {
        return $this->belongsToMany(Meal::class, 'meal_ingredient', 'ingredient_id', 'meal_id');
    }
}
