<?php

namespace App\Http\Resources;

use App\Http\Resources\PaginatedMealResourceResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MealCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    protected function preparePaginatedResponse($request) { 
    if ($this->preserveAllQueryParameters) { 
      $this->resource->appends($request->query()); 
    } elseif (! is_null($this->queryParameters)) { 
      $this->resource->appends($this->queryParameters); 
    } 
    return (new PaginatedMealResourceResponse($this))->toResponse($request); // Here we return our newly created Response 
  }
}
