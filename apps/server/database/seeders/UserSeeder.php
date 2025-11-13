<?php

namespace Database\Seeders;

use App\Modules\Auth\Enums\UserRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [];

        $recruiterIds = [41, 41, 41, 41, 41, 43, 43, 43];

        foreach ($recruiterIds as $id) {
            $newUser = UserFactory::new()
                ->create([
                    "position_id" => $id,
                    "role" => UserRole::RECRUITER,
                ])
                ->toArray();
            array_push($users, $newUser);
        }

        $managerIds = [8, 10, 11, 12, 25, 29, 31, 34, 37, 39, 42, 44];

        foreach ($managerIds as $id) {
            $newUser = UserFactory::new()
                ->create([
                    "position_id" => $id,
                    "role" => UserRole::MANAGER,
                ])
                ->toArray();
            array_push($users, $newUser);
        }

        $executiveIds = [9, 14, 20, 28, 30, 36, 45, 50];

        foreach ($executiveIds as $id) {
            $newUser = UserFactory::new()
                ->create([
                    "position_id" => $id,
                    "role" => UserRole::EXECUTIVE,
                ])
                ->toArray();
            array_push($users, $newUser);
        }
    }
}
