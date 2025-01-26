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
        Schema::create('payroll_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('pay_date');
             $table->string('pay_period')->nullable(); // Added for monthly, weekly etc
             $table->decimal('basic_salary', 10, 2);
            $table->decimal('gross_salary', 10, 2);
             $table->decimal('total_allowances', 10, 2)->default(0);
            $table->json('allowance_breakdown')->nullable();
             $table->decimal('total_deductions', 10, 2)->default(0);
             $table->json('deduction_breakdown')->nullable();
             $table->decimal('total_tax',10,2)->default(0);
              $table->json('tax_breakdown')->nullable();
             $table->decimal('total_benefits',10,2)->default(0);
             $table->json('benefit_breakdown')->nullable();
             $table->decimal('net_salary', 10, 2);
            $table->string('payment_method')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_sort_code')->nullable();
            $table->string('currency')->default('USD');
            $table->string('payslip_number')->nullable()->unique(); // added for unique payslip
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_details');
    }
};
