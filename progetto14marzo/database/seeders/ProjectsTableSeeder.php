<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        $userIds = User::pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            Project::factory()->create([
                'user_id' => $userIds[array_rand($userIds)],
            ]);
        }
    }
}