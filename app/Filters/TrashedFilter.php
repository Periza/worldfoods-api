<?php

namespace App\Filters;

class TrashedFilter
{
    public function __invoke($query) 
    {
        return $query->withTrashed();
    }
}