<?php

use App\Http\Resources\MealResource;
use App\Models\Tag;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/meals', function(Request $request) {

   /* $request->validate([
        'lang' => 'required',
        'category' => 'nullable'
    ]); */

    


    return  new MealResource(Meal::first());
        
})->withTrashed();

Route::get('/', function(Request $request) {
    return "api";
;});
