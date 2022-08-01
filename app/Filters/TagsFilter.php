<?php

namespace App\Filters;

class TagsFilter {

    function __invoke($query, $tag_ids) {
        $tags = explode(',', $tag_ids);
        foreach($tags as $tag) {
            $query->whereHas('tags', function($q) use($tag){
                return $q->where('id', $tag);
            });
        }
        
        return $query;

        
    }
}