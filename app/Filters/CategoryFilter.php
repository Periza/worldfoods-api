<?php

namespace App\Filters;

class CategoryFilter {

    function __invoke($query, $category_id) {
        return $query->whereHas('category', function($q) use($category_id) {
            return $q->where('id', $category_id);
        });
    }
}