<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use function Symfony\Component\String\b;

class Category extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $table = 'categories';

    protected $fillable = ['slug', 'title'];

    protected $hidden = ['pivot', 'translations'];

    public $translatedAttributes = ['title'];
    public $timestamps = false;
}


