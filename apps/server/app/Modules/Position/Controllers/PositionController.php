<?php

namespace App\Modules\Position\Controllers;

use App\Abstracts\BaseController;
use App\Modules\Position\Requests\PositionIndexRequest;
use App\Modules\Position\Requests\PositionStoreReqeust;
use App\Modules\Position\Requests\PositionUpdateRequest;
use App\Modules\Position\Models\Position;
use App\Modules\Position\Resources\PositionResource;
use App\Modules\Position\Resources\PositionResourceCollection;
use Dedoc\Scramble\Attributes\Endpoint;
use Dedoc\Scramble\Attributes\QueryParameter;
use Illuminate\Support\Facades\Gate;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PositionController extends BaseController
{
    public function index()
    {
        Gate::authorize("findAll", Position::class);

        $positions = QueryBuilder::for(Position::class)
            ->allowedIncludes(["department"])
            ->allowedFilters([AllowedFilter::partial("title"), AllowedFilter::exact("departmentId", "department_id")])
            ->autoPaginate();

        return PositionResourceCollection::make($positions);
    }

    public function show(int $id)
    {
        Gate::authorize("findById", Position::class);

        $position = QueryBuilder::for(Position::class)
            ->allowedIncludes(["department"])
            ->findOrFail($id);

        return PositionResource::make($position);
    }

    public function store(PositionStoreReqeust $request)
    {
        Gate::authorize("create", Position::class);
        $createdPosition = Position::create($request->validated());
        return $this->createdResponse(new PositionResource($createdPosition));
    }

    public function update(PositionUpdateRequest $request, int $id)
    {
        Gate::authorize("update", Position::class);
        Position::findOrFail($id)->update($request->validated());
        return $this->noContentResponse();
    }

    public function destroy(int $id)
    {
        Gate::authorize("delete", Position::class);
        Position::findOrFail($id)->delete();
        return $this->noContentResponse();
    }
}
