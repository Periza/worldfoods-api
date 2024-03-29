<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;



use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meal extends Model implements TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use Translatable;

    public $translatedAttributes = ['title', 'description'];

    protected $fillable = ['status'];


    public function category() : BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function tags() : BelongsToMany{
        return $this->belongsToMany(Tag::class, 'meal_tag', 'meal_id', 'tag_id');
    }

    public function ingredients() : BelongsToMany {
        return $this->belongsToMany(Ingredient::class, 'meal_ingredient', 'meal_id', 'ingredient_id');
    }
}
