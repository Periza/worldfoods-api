<?php
namespace App\Filters;

use App\Filters\CategoryFilter;

class MealFilters {
    protected $filters = ['category' => CategoryFilter::class,
                            'tags' => TagsFilter::class];

    public function apply($query) {
        foreach($this->recievedFilters() as $name => $value) {
            $filterInstance = new $this->filters[$name];
            $query = $filterInstance($query, $value);
        }

        return $query;
    }

    public function recievedFilters() {
        return request()->only(array_keys($this->filters));
    }
}