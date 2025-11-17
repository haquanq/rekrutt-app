<?php

namespace Database\Seeders;

use App\Modules\Auth\Enums\UserRole;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $recruiterIds = [41, 41, 41, 41, 41, 43, 43, 43];

        foreach ($recruiterIds as $id) {
            UserFactory::new()->create([
                "position_id" => $id,
                "role" => UserRole::RECRUITER,
            ]);
        }

        $managerIds = [8, 10, 11, 12, 25, 29, 31, 34, 37, 39, 42, 44];

        foreach ($managerIds as $id) {
            UserFactory::new()->create([
                "position_id" => $id,
                "role" => UserRole::MANAGER,
            ]);
        }

        $executiveIds = [9, 14, 20, 28, 30, 36, 45, 50];

        foreach ($executiveIds as $id) {
            UserFactory::new()->create([
                "position_id" => $id,
                "role" => UserRole::EXECUTIVE,
            ]);
        }

        UserFactory::new()->create([
            "first_name" => "Ha",
            "last_name" => "Quang",
            "email" => "hquang@gmail.com",
            "phone_number" => "0123456789",
            "username" => "haquanq",
            "role" => UserRole::ADMIN,
            "password" => Hash::make("12345678"),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "position_id" => 44,
        ]);
    }
}
