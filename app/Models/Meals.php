<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Meal can can have only one category.
// Categories can have multiple meals.

class Meals extends Model
{
    use HasFactory, SoftDeletes;
}
