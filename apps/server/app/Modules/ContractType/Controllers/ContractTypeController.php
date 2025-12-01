<?php

namespace App\Modules\ContractType\Controllers;

use App\Abstracts\BaseController;
use App\Modules\ContractType\Requests\ContractTypeStoreRequest;
use App\Modules\ContractType\Requests\ContractTypeUpdateRequest;
use App\Modules\ContractType\Models\ContractType;
use App\Modules\ContractType\Resources\ContractTypeResource;
use Illuminate\Support\Facades\Gate;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ContractTypeController extends BaseController
{
    public function index()
    {
        Gate::authorize("viewAny", ContractType::class);

        $contractTypes = QueryBuilder::for(ContractType::class)
            ->allowedFilters([AllowedFilter::partial("name")])
            ->get();

        return $this->okResponse(ContractTypeResource::collection($contractTypes));
    }

    public function show(int $id)
    {
        Gate::authorize("view", ContractType::class);
        $contractType = ContractType::findOrFail($id);
        return $this->okResponse(new ContractTypeResource($contractType));
    }

    public function store(ContractTypeStoreRequest $request)
    {
        Gate::authorize("create", ContractType::class);
        $createdContractType = ContractType::create($request->validated());
        return $this->okResponse(new ContractTypeResource($createdContractType));
    }

    public function update(ContractTypeUpdateRequest $request, int $id)
    {
        Gate::authorize("update", ContractType::class);
        ContractType::findOrFail($id)->update($request->validated());
        return $this->noContentResponse();
    }

    public function destroy(int $id)
    {
        Gate::authorize("delete", ContractType::class);
        ContractType::findOrFail($id)->delete();
        return $this->noContentResponse();
    }
}
