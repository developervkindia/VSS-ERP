<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PayrollDetail>
 */
class PayrollDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grossSalary = fake()->numberBetween(30000, 150000);
         $basicSalary = $grossSalary * 0.6;
         $totalAllowances = fake()->numberBetween(500,1000);
         $allowanceBreakdown = [
           'House Rent' => fake()->numberBetween(100,200),
           'Transport' => fake()->numberBetween(100, 200),
        ];
        $totalDeductions = fake()->numberBetween(200, 1000);
        $deductionBreakdown = [
            'Provident Fund' => fake()->numberBetween(100,300),
            'Insurance' => fake()->numberBetween(100, 300)
        ];
         $totalTax = fake()->numberBetween(500,2000);
         $taxBreakdown = [
             'Income Tax' => fake()->numberBetween(500,1000),
              'Professional Tax' => fake()->numberBetween(100,200)
         ];
         $totalBenefits = fake()->numberBetween(200,500);
         $benefitBreakdown = [
             'Health' => fake()->numberBetween(100,200),
              'Transportation' => fake()->numberBetween(100,200)
         ];
       $netSalary = $grossSalary + $totalBenefits - $totalDeductions - $totalTax;


        return [
             'user_id' => User::factory(),
            'pay_date' => fake()->dateTimeBetween('-1 year', 'now'),
             'pay_period' => fake()->randomElement(['monthly', 'bi-weekly', 'weekly']),
            'basic_salary' => $basicSalary,
            'gross_salary' => $grossSalary,
             'total_allowances' => $totalAllowances,
             'allowance_breakdown' => json_encode($allowanceBreakdown),
            'total_deductions' => $totalDeductions,
            'deduction_breakdown' => json_encode($deductionBreakdown),
             'total_tax' => $totalTax,
            'tax_breakdown' => json_encode($taxBreakdown),
             'total_benefits' => $totalBenefits,
              'benefit_breakdown' => json_encode($benefitBreakdown),
            'net_salary' => $netSalary,
            'payment_method' => fake()->randomElement(['direct_deposit','check','cash']),
             'bank_name' => fake()->optional()->company(),
            'bank_account_number' => fake()->optional()->bankAccountNumber(),
            'bank_sort_code' => fake()->optional()->numerify('##-##-##'),
            'currency' => fake()->randomElement(['USD','EUR','GBP','CAD']),
             'payslip_number' => 'PS-' . fake()->uuid(),
        ];
    }
}
