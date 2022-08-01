<?php

namespace App\Filters;

class TrashedFilter{
    public function _invoke($query) {
        return $query->withTrashed();
    }
}