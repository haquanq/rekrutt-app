<?php

namespace Database\Seeders;

use Database\Factories\CandidateFactory;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        CandidateFactory::new()->count(10)->create();
    }
}
