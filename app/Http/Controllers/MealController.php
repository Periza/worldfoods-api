<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Requests\MealRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\MealResource;
use App\Filters\MealFilters;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MealRequest $request, MealFilters $filters)
    {
    $pagination = function() use ($request){
        if($request->has('per_page')) {
            return $request->input('per_page');
        } else {
            return 0;
        }
    };

    // filter by tags if there are tags in the request
    $tags=[];
    if($request->has('tags')) {
        $tags = explode(',', $request->input('tags'));
    }

    $query = Meal::with('tags');
    foreach($tags as $tag) {
        $query->whereHas('tags', function($q) use ($tag) {
            return $q->where('id', $tag);
        });
    }

    $mf = new MealFilters;
    $query = $mf->apply($query);
    
    

    $query = MealResource::collection($query->paginate());
    return $query;
    
    return $request->has('diff_time') ? MealResource::collection($query->withTrashed($pagination)->paginate()) : MealResource::collection($query->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
