<?php

namespace Database\Factories;

use App\Enums\CandidateStatus;
use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Candidate::class;
    public function definition(): array
    {
        return [
            "first_name" => fake()->firstName(),
            "last_name" => fake()->lastName(),
            "date_of_birth" => fake()
                ->dateTimeBetween("-45years", "-21years")
                ->format("Y M d"),
            "address" => fake()->address(),
            "email" => fake()->unique()->safeEmail(),
            "phone" => fake()->unique()->numerify("##########"),
            "status" => CandidateStatus::NEW,
            "hiring_source_id" => random_int(1, 9),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ];
    }
}
