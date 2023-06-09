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
        Schema::create('category_has_news', function (Blueprint $table):void
        {
            $table->id();
            $table->foreignId('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
            $table->foreignId('news_id')
                ->references('id')
                ->on('news')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_has_news');
    }
};
