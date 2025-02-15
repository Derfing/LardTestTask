<?php

namespace App\Repositories;

use App\Models\Contractor;

class ContractorRepository
{
    public function getAll()
    {
        return Contractor::paginate(10);
    }

    public function findById(string $id): ?Contractor
    {
        return Contractor::find($id);
    }

    public function create(array $data): Contractor
    {
        return Contractor::create($data);
    }

    public function update(string $id, array $data): Contractor
    {
        $contractor = Contractor::findOrFail($id);
        $contractor->update($data);
        return $contractor;
    }

    public function delete(string $id): void
    {
        Contractor::destroy($id);
    }
}
