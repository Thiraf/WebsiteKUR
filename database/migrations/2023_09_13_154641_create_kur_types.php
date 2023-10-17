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
        Schema::create('kur_types', function (Blueprint $table) {
            $table->uuid('id');
            // $table->tinyInteger('id')->primary();
            $table->string('name');
            $table->integer('min_value');
            $table->integer('max_value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kur_types');
    }
};
