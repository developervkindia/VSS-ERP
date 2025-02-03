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
       Schema::create('job_positions', function (Blueprint $table) {
            $table->id();

            //Core Job Information
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();

           //department relation
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('cascade');
            //Additional Job Info
            $table->string('employment_type')->nullable();  //(e.g., full-time, part-time, contract)
            $table->integer('experience_required')->nullable();
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            //Location Details
             $table->string('location_type')->nullable();
              $table->string('address')->nullable();
               $table->string('country')->nullable();
            $table->string('state')->nullable();
             $table->string('city')->nullable();
              $table->string('postal_code')->nullable();

           // Dates and Timelines
              $table->date('opening_date')->nullable();
           $table->date('closing_date')->nullable();
             $table->timestamp('publish_date')->nullable();
            $table->boolean('is_active')->default(true);
             $table->json('meta')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
