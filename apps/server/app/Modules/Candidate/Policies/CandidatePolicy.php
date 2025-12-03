<?php

namespace App\Modules\Candidate\Policies;

use App\Modules\Auth\Enums\UserRole;
use App\Modules\Auth\Models\User;
use Illuminate\Auth\Access\Response;

class CandidatePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user): bool
    {
        return true;
    }

    public function create(User $user): Response
    {
        if (!$user->hasRole(UserRole::RECRUITER, UserRole::HIRING_MANAGER)) {
            return Response::deny("You are not allowed to create new candidate.");
        }

        return Response::allow();
    }

    public function update(User $user): Response
    {
        if (!$user->hasRole(UserRole::RECRUITER, UserRole::HIRING_MANAGER)) {
            return Response::deny("You are not allowed to update this candidate.");
        }

        return Response::allow();
    }

    public function delete(User $user): Response
    {
        if (!$user->hasRole(UserRole::RECRUITER, UserRole::HIRING_MANAGER)) {
            return Response::deny("You are not allowed to delete this candidate.");
        }

        return Response::allow();
    }
}
