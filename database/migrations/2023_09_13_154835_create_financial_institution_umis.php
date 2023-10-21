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
        Schema::create('financial_institution_umis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('link');
            $table->string('code')->nullable();
            $table->integer('status')->nullable();
            $table->string('reason_status')->nullable();
            $table->string('logo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_institution_umis');
    }
};
