<?php

namespace App\Http\Resources;

use Astrotomic\Tmdb\Facades\Tmdb;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Resources\Json\JsonResource;


class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   


        $status = "created";

        $greaterThanDiffTime = function ($time) use($request) {
            return strtotime($time) > $request->diff_time;
        };

        if($request->has('diff_time')) {
            if($greaterThanDiffTime($this->created_at) || $greaterThanDiffTime($this->updated_at) || $greaterThanDiffTime($this->deleted_at)) {
                if($this->deleted_at > $this->updated_at && $this->deleted_at > $this->created_at) {
                    $status = "deleted";
                } else if($this->updated_at > $this->deleted_at && $this->updated_at > $this->created_at) {
                    $status = "updated";
                }
            }
        }

        // set locale
        app()->setlocale($request->lang);

        $ingredients = false;
        $category = false;
        $tags = false;

        // check if with is present and not empty
        if($request->has('with')) {
            $with_array = explode(',', $request->input('with'));
            if(in_array('category', $with_array)) {
                $category = true;
            }
            if(in_array('ingredients', $with_array)) {
                $ingredients = true;
            }
            if(in_array('tags', $with_array)) {
                $tags = true;
            }

        }



        return [
            'id' => $this->id,
            'status' => $status,
            'category' => $this->when($category, $this->category()->getResults()),
            'tags' => $this->when($tags, $this->tags()->getResults()),
            'ingredients' => $this->when($ingredients, $this->ingredients()->getResults())
        ];
    }
}
