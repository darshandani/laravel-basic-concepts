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
        Schema::create('admission', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('religion');
            $table->string('gender');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('last_school_name');
            $table->string('medium_of_instruction');
            $table->string('last_school_result');
            $table->string('reason_for_leaving');
            $table->string('leaving_certificate')->nullable();
            $table->string('mark_list_report_card')->nullable();
            $table->string('medical_certificate')->nullable();
            $table->boolean('agree_terms')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission');
    }
};
