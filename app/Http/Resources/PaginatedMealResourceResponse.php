<?php

namespace App\Http\Resources;

use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;

class PaginatedMealResourceResponse extends PaginatedResourceResponse
{
    protected function paginationLinks($paginated)
    {
        return [
            'prev' => $paginated['prev_page_url'] ?? null,
            'self' => $paginated['self_page_url'] ?? null,
            'next' => $paginated['next_page_url'] ?? null,
        ];
    
    
    }

    protected function meta($paginated)
    {
        $metaData = parent::meta($paginated);
        return [
            'currentPage' => $metaData['current_page'] ?? null,
            'totalItems' => $metaData['total'] ?? null,
            'perPage' => $metaData['per_page'] ?? null,
            'totalPages' => $metaData['total'] ?? null,
        ];
    }
}

