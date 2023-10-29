<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->tinyInteger('id')->primary();
            $table->string('title');
            $table->text('content');
            $table->string('img')->nullable();
            $table->string('slug');
            $table->string('type')->nullable();
            $table->char('category_news_id',36)->nullable();
            // $table->tinyInteger('category_news_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
