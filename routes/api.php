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

Route::get('/meals', function(Request $request) {

    $validator = Validator::make($request->all(),[
        'lang' => ['required', new InArray],
        'category' => 'null'
    ]);

    if($validator->fails()) {
        return response()->json($validator->errors());
    }


    $pagination = function() use ($request){
        if($request->has('per_page')) {
            return $request->input('per_page');
        } else {
            return 0;
        }
    };

    $tags=[];
    if($request->has('tags')) {
        $tags = explode(',', $request->input('tags'));
    }

    
    
    /* $selectedMeal =  $tags ? [] : $tags;

    dd($selectedMeal); */

    $query = Meal::with('tags');
    foreach($tags as $tag) {
        $query->whereHas('tags', function($q) use ($tag) {
            $q->where('id', $tag);
        });
    }
    
    return $request->has('diff_time') ? MealResource::collection($query->withTrashed($pagination)->paginate()) : MealResource::collection($query->paginate());
});

