<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Resources\PaginatedMealResourceResponse;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MealCollection extends ResourceCollection
{

    protected $preserveAllQueryParameters = true;
    public function toResponse($request)
    {
      $data = $this->resolve($request);
      if($data instanceof Collection) {
        $data = $data->all();
      }
      // dd($request->all());
      $paginated = $this->resource->toArray();
      // dd(urldecode($request->fullUrlWithQuery(['lang' => 'it'])));
      
      
      $json = array_merge_recursive(
        [
          'meta' => [
            'currentPage' => $paginated['current_page'],
            'totalItems' => $paginated['total'],
            'itemsPerPage' => $paginated['per_page'],
            'totalPages' => ceil($paginated['total']/$paginated['per_page'])
          ]
        ],
        [
          self::$wrap => $data
        ],
        [
          'links' => [
            'prev' => $paginated['prev_page_url'] ?? null,
            'next' => urldecode($request->fullUrlWithQuery(['page' => '3'])),
            'self' => urldecode($request->fullUrlWithQuery(['page' => $paginated['current_page']])) ?? null,
          ]
        ]
      );

      return response()->json($json);
      
    }
    

}
