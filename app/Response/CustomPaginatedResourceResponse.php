<?php

namespace App\Response;

use Illuminate\Http\Resources\Json\PaginatedResourceResponse;

class CustomPaginatedResourceResponse extends PaginatedResourceResponse {

    protected function paginationLinks($paginated) {
        return [
            'prev' => urldecode($paginated['prev_page_url']) === "" ? null : urldecode($paginated['prev_page_url']),
            'next' => urldecode($paginated['next_page_url']) === "" ? null : urldecode($paginated['next_page_url']),
            'self' => urldecode(request()->fullUrlWithQuery(['page' => $paginated['current_page']])) ?? null,
        ];
    }

    protected function meta($paginated) {
        return [
            'currentPage' => $paginated['current_page'],
            'totalItems' => $paginated['total'],
            'itemsPerPage' => $paginated['per_page'],
            'totalPages' => ceil($paginated['total']/$paginated['per_page'])
        ];
    }
}