<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Resources\PaginatedMealResourceResponse;
use App\Response\CustomPaginatedResourceResponse;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\ResourceResponse;
use Illuminate\Pagination\AbstractPaginator;

class MealCollection extends ResourceCollection
{
    public function toResponse($request)
    {
      $paginated = $this->resource->toArray();
      return $this->resource instanceof AbstractPaginator 
                  ? (new CustomPaginatedResourceResponse($this))->toResponse($request)
                  : parent::toResponse($request);

    }
}
