<?php

namespace Database\Factories;

use App\Models\Loan;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition()
    {
        $toolIds = Tool::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        return [
            'tool_id' => $this->faker->randomElement($toolIds),
            'borrower_user_id' => $this->faker->randomElement($userIds),
            'date_time_loan' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'expected_return_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            // 'date_time_return' => $this->faker->optional()->dateTimeBetween('now', '+1 month'),
            'isBorrowed' => $this->faker->boolean(),
            'observations' => $this->faker->optional()->paragraph,
        ];
    }
}
