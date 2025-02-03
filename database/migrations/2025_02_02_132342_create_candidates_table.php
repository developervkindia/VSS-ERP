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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('job_positions')->onDelete('cascade'); // Assuming you want to cascade delete
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('resume_path');
            $table->text('cover_letter')->nullable();
            $table->integer('experience')->nullable();
            $table->text('skills')->nullable();
            $table->string('status')->default('Applied');
            $table->unsignedTinyInteger('rating')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('portfolio_website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
