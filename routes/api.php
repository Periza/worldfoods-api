<?php

use App\Models\Tag;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\MealResource;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;


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

    $validator = Validator::make($request->all(),[
        'lang' => 'required',
        'category' => 'null'
    ]);

    if($validator->fails()) {
        return response()->json($validator->errors());
    }

    return  MealResource::collection(Meal::withTrashed()->paginate());
        
});

Route::get('/', function(Request $request) {
    return "api";
;});
