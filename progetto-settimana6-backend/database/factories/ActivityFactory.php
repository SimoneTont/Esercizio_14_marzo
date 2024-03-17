<?php
namespace Database\Factories;

use App\Models\Activity;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'project_id' => Project::get()->random()->id,
        ];
    }
}
