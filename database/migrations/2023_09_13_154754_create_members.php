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
        Schema::create('members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('nik', 36);
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('phone',20)->nullable();
            $table->string('second_phone',20)->nullable();
            $table->string('address')->nullable();
            $table->string('gender');
            $table->date('dob');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
