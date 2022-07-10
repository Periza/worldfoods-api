<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait TruncateTable {
    protected function truncate($tables) {

        if(is_array($tables)) {
            foreach($tables as $table) {
                DB::table($table)->truncate();
            }
        } else {
            DB::table($tables)->truncate();
        }
    }
}