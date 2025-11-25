<?php

namespace App\Modules\EducationLevel\Controllers;

use App\Abstracts\BaseController;
use App\Modules\EducationLevel\Requests\StoreEducationLevelRequest;
use App\Modules\EducationLevel\Requests\UpdateEducationLevelRequest;
use App\Modules\EducationLevel\Models\EducationLevel;
use App\Modules\EducationLevel\Resources\EducationLevelResource;
use Illuminate\Support\Facades\Gate;

class EducationLevelController extends BaseController
{
    public function index()
    {
        Gate::authorize("findAll", EducationLevel::class);
        $educationlevels = EducationLevel::all();
        return $this->okResponse(EducationLevelResource::collection($educationlevels));
    }

    public function show(int $id)
    {
        Gate::authorize("findByid", EducationLevel::class);
        $educationLevel = EducationLevel::findOrFail($id);
        return $this->okResponse(new EducationLevelResource($educationLevel));
    }

    public function store(StoreEducationLevelRequest $request)
    {
        Gate::authorize("create", EducationLevel::class);
        $createdEducationlevel = EducationLevel::create($request->validated());
        return $this->createdResponse(new EducationLevelResource($createdEducationlevel));
    }

    public function update(UpdateEducationLevelRequest $request, int $id)
    {
        Gate::authorize("update", EducationLevel::class);
        EducationLevel::findOrFail($id)->update($request->validated());
        return $this->noContentResponse();
    }

    public function destroy(int $id)
    {
        Gate::authorize("delete", EducationLevel::class);
        EducationLevel::findOrFail($id)->delete();
        return $this->noContentResponse();
    }
}
