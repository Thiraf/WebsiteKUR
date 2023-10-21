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
        Schema::create('credit_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('registration_number',12);
            $table->uuid('member_id');
            $table->uuid('business_type_id');
            // $table->tinyInteger('business_type_id');
            $table->uuid('business_permit_id');
            // $table->tinyInteger('business_permit_id');
            $table->string('npwp')->nullable();
            $table->string('business_place_photo')->nullable();
            $table->string('address_business_place');
            $table->integer('regency_id');
            $table->integer('district_id');
            $table->string('village');
            $table->string('postal_code');
            $table->uuid('kur_type_id');
            // $table->tinyInteger('kur_type_id');
            $table->integer('amount');
            $table->uuid('tenor');
            // $table->tinyInteger('tenor');
            $table->uuid('bank_id');
            $table->string('status');
            $table->string('pic_contact')->nullable();
            $table->date('verification_date')->nullable();
            $table->string('reject_message')->nullable();
            $table->uuid('process_by')->nullable();
            $table->string('accepted_plafond')->nullable();
            $table->text('pending_message')->nullable();
            $table->boolean('is_confirmed')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_requests');
    }
};
