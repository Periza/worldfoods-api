<?php

use App\Models\Tag;
use App\Models\Meal;
use App\Rules\InArray;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illumnate\Validation\Rule;
use App\Http\Resources\MealResource;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\MealController;
use App\Http\Requests\MealRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Database\Query\Builder;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/





Route::get('/tags', function (Request $request) {
    return Tag::all();
});

Route::get('/meals', [MealController::class, 'index']);

