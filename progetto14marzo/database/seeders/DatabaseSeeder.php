<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Database\Factories\ProjectFactory;
use Database\Factories\ActivityFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserFactory::times(10)->create();

        ProjectFactory::times(20)->create();

        ActivityFactory::times(30)->create();
    }
}
