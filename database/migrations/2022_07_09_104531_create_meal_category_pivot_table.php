<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_category', function(Blueprint $table) {
            $table->foreignId('meal_id')->index();
            $table->foreign('meal_id')->on('meals')->references('id');
            $table->foreignId('category_id')->index();
            $table->foreign('category_id')->on('categories')->references('id');
            $table->primary(['meal_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_category');
    }
};
