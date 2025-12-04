<?php

namespace App\Modules\Recruitment\Controllers;

use App\Abstracts\BaseController;
use App\Modules\Recruitment\Models\RecruitmentApplication;
use App\Modules\Recruitment\Requests\RecruitmentApplicationDestroyRequest;
use App\Modules\Recruitment\Requests\RecruitmentApplicationStoreRequest;
use App\Modules\Recruitment\Requests\RecruitmentApplicationUpdatePriorityRequest;
use App\Modules\Recruitment\Resources\RecruitmentApplicationResource;
use App\Modules\Recruitment\Resources\RecruitmentApplicationResourceCollection;
use Dedoc\Scramble\Attributes\QueryParameter;
use Illuminate\Support\Facades\Gate;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RecruitmentApplicationController extends BaseController
{
    /**
     * Find all recruitment applications
     *
     * Return a list of recruitment applications. Allows pagination, relations and filter query.
     *
     * Authorization rules:
     * - User with roles: any.
     */
    #[
        QueryParameter(
            name: "page[number]",
            type: "integer",
            description: "Current page number (default: 1)",
            example: 1,
        ),
    ]
    #[
        QueryParameter(
            name: "page[size]",
            type: "integer",
            description: "Size of current page (default: 15, max: 100)",
            example: 15,
        ),
    ]
    #[
        QueryParameter(
            name: "include",
            type: "string",
            description: "Include nested relations </br>" .
                " Allow relations: recruitment, candidate, interviews </br>" .
                "Example: include=recruitment,candidate",
        ),
    ]
    #[
        QueryParameter(
            name: "filter[*]",
            type: "string",
            description: "Filter by fields </br>" .
                "Allow fields: status, priority, candidateId, recruitmentId </br>" .
                "Example: filter[status]=INTERVIEWING",
        ),
    ]
    public function index()
    {
        Gate::authorize("viewAny", RecruitmentApplication::class);

        $recruitmentApplications = QueryBuilder::for(RecruitmentApplication::class)
            ->allowedIncludes(["recrtuitment", "candidate", "interviews"])
            ->allowedFilters([
                AllowedFilter::exact("status"),
                AllowedFilter::exact("priority"),
                AllowedFilter::exact("candidateId", "candidate_id"),
                AllowedFilter::exact("recruitmentId", "recruitment_id"),
            ])
            ->autoPaginate();

        return RecruitmentApplicationResourceCollection::make($recruitmentApplications);
    }

    /**
     * Find recruitment application by Id
     *
     * Return a unique recruitment application. Allow relations query.
     *
     * Authorization rules:
     * - User with roles: any.
     */
    #[
        QueryParameter(
            name: "include",
            type: "string",
            description: "Include nested relations </br>" .
                " Allow relations: recruitment, candidate, interviews </br>" .
                "Example: include=recruitment,candidate",
        ),
    ]
    public function show(int $id)
    {
        Gate::authorize("view", RecruitmentApplication::class);

        $recruitmentApplication = QueryBuilder::for(RecruitmentApplication::class)
            ->allowedIncludes(["recrtuitment", "candidate", "interviews"])
            ->findOrFail($id);

        return RecruitmentApplicationResource::make($recruitmentApplication);
    }

    /**
     * Create recruitment application
     *
     * Return created recruitment application.
     *
     * Authorization rules:
     * - User with roles: RECRUITER, HIRING_MANAGER.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(RecruitmentApplicationStoreRequest $request)
    {
        $createdRecruitmentApplication = RecruitmentApplication::create($request->validated());
        return $this->createdResponse(new RecruitmentApplicationResource($createdRecruitmentApplication));
    }

    /**
     * Update priority status of recruitment application
     *
     * Return no content.
     *
     * Authorization rules:
     * - User with roles: RECRUITER, HIRING_MANAGER.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updatePriority(RecruitmentApplicationUpdatePriorityRequest $request, int $id)
    {
        $request->recruitmentApplication->update($request->validated());
        return $this->noContentResponse();
    }

    /**
     * Delete recruitment application by Id
     *
     * Permanently delete recruitment application. Return no content.
     *
     * Authorization rules:
     * - User with roles: RECRUITER, HIRING_MANAGER.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(RecruitmentApplicationDestroyRequest $request)
    {
        $request->recruitmentApplication->delete();
        return $this->noContentResponse();
    }
}
