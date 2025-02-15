<?php

namespace App\Services;

use App\Data\ContractorData;
use App\Models\Contractor;
use App\Repositories\ContractorRepository;

class ContractorService
{
    protected ContractorRepository $repository;

    public function __construct(ContractorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllContractors()
    {
        return $this->repository->getAll();
    }

    public function createContractor(ContractorData $data): Contractor
    {
        return $this->repository->create($data->toArray());  // Преобразуем DTO в массив
    }

    public function updateContractor(string $id, ContractorData $data): Contractor
    {
        return $this->repository->update($id, $data->toArray());
    }

    public function deleteContractor(string $id): void
    {
        $this->repository->delete($id);
    }

    public function getContractorById(string $id): ?Contractor
    {
        return $this->repository->findById($id);
    }
}
