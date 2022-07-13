<?php

namespace App\Http\Resources;

use Astrotomic\Tmdb\Facades\Tmdb;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Resources\Json\JsonResource;


class MealResource extends JsonResource
{

    /* public function __construct($resource) {
        $this->pagination = [
            'total' => $resource->total(),
            'count' => $resource->count(),
            'per_page' => $resource->perPage(),
            'current_page' => $resource->currentPage(),
            'total_pages' => $resource->lastPage()
        ];

        $resource = $resource->getCollection();

        parent::__construct($resource);
    } */
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

        if($greaterThanDiffTime($this->created_at) || $greaterThanDiffTime($this->updated_at) || $greaterThanDiffTime($this->deleted_at)) {
            if($this->deleted_at > $this->updated_at && $this->deleted_at > $this->created_at) {
                $status = "deleted";
            } else if($this->updated_at > $this->deleted_at && $this->updated_at > $this->created_at) {
                $status = "updated";
            }
        }

        // set locale
        app()->setlocale($request->lang);

        

        return [
            'id' => $this->id,
            'status' => $status,
            'category' => $this->category()->getResults(),
            'tags' => $this->tags()->getResults(),
            'ingredients' => $this->ingredients()->getResults()
        ];
    }
}