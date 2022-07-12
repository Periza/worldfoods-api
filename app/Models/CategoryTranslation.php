<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;

    protected $hidden = ['locale', 'category_id'];

    protected $fillabe = ['title'];
    public $timestamps = false;
}
