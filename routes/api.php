<?php

use App\Models\Tag;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\MealResource;
use App\Rules\InArray;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illumnate\Validation\Rule;


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
        'lang' => ['required', new InArray],
        'category' => 'null'
    ]);

    if($validator->fails()) {
        return response()->json($validator->errors());
    }

    if($request->has('tags')) {
        $tags = explode(',', $request->input('tags'));
    }

    $pagination = function() use ($request){
        if($request->has('per_page')) {
            return $request->input('per_page');
        } else {
            return 0;
        }
    };

    

    return  $request->has('diff_time') ? MealResource::collection(Meal::withTrashed()->paginate($pagination)) : MealResource::collection(Meal::paginate($pagination));
        
});

Route::get('/', function(Request $request) {
    return "api";
;});
