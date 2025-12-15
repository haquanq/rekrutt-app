<?php

namespace App\Modules\Interview\Policies;

use App\Modules\Auth\Enums\UserRole;
use App\Modules\Auth\Models\User;
use App\Modules\Interview\Models\Interview;
use App\Modules\Interview\Models\InterviewEvaluation;
use Illuminate\Auth\Access\Response;

class InterviewEvaluationPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user): bool
    {
        return true;
    }

    public function create(User $user, ?Interview $interview): Response
    {
        if ($user->hasRole(UserRole::ADMIN)) {
            return Response::deny("You are not allowed to create new interview evaluation.");
        } elseif ($interview && !$interview->hasParticipant($user)) {
            return Response::deny("You are not participating in this interview");
        }

        return Response::allow();
    }

    public function update(User $user, InterviewEvaluation $interviewEvaluation): Response
    {
        if ($user->hasRole(UserRole::ADMIN)) {
            return Response::deny("You are not allowed to update this interview evaluation.");
        } elseif (!$interviewEvaluation->isCreatedBy($user)) {
            return Response::deny("You are not the creator of this interview evaluation");
        }

        return Response::allow();
    }

    public function delete(User $user, InterviewEvaluation $interviewEvaluation): Response
    {
        if ($user->hasRole(UserRole::ADMIN)) {
            return Response::deny("You are not allowed to delete this interview evaluation.");
        } elseif (!$interviewEvaluation->isCreatedBy($user)) {
            return Response::deny("You are not the creator of this interview evaluation");
        }

        return Response::allow();
    }
}
