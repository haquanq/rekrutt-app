<?php

namespace App\Modules\HiringSource\Controllers;

use App\Abstracts\BaseController;
use App\Modules\HiringSource\Requests\StoreHiringSourceRequest;
use App\Modules\HiringSource\Requests\UpdateHiringSourceRequest;
use App\Modules\HiringSource\Models\HiringSource;
use App\Modules\HiringSource\Resources\HiringSourceResource;
use Illuminate\Support\Facades\Gate;

class HiringSourceController extends BaseController
{
    public function index()
    {
        Gate::authorize("findAll", HiringSource::class);
        $hiringSources = HiringSource::all();
        return $this->okResponse(HiringSourceResource::collection($hiringSources));
    }

    public function show(int $id)
    {
        Gate::authorize("findById", HiringSource::class);
        $hiringSource = HiringSource::findOrFail($id);
        return $this->okResponse(new HiringSourceResource($hiringSource));
    }

    public function store(StoreHiringSourceRequest $request)
    {
        Gate::authorize("create", HiringSource::class);
        $createdHiringSource = HiringSource::create($request->validated());
        return $this->createdResponse(new HiringSourceResource($createdHiringSource));
    }

    public function update(UpdateHiringSourceRequest $request, int $id)
    {
        Gate::authorize("update", HiringSource::class);
        HiringSource::findOrFail($id)->update($request->validated());
        return $this->noContentResponse();
    }

    public function destroy(int $id)
    {
        Gate::authorize("delete", HiringSource::class);
        HiringSource::findOrFail($id)->delete();
        return $this->noContentResponse();
    }
}
