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
        Schema::create('appoiments', function (Blueprint $table) {
            $table->id();
            $table->time('p_time');
            $table->date('p_date');
            $table->string('p_appoiment_to');
            $table->string('p_name');
            $table->string('p_phone');
            $table->string('p_doctor');
            $table->string('p_reason');
            $table->string('p_email');
            $table->string('p_status_appoiment');
            $table->string('p_gdpr_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoiments');
    }
};
