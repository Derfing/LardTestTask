<?php

namespace App\Http\Controllers;
use App\Data\ContractorData;
use App\Http\Requests\ContractorRequest;
use App\Services\ContractorService;

class ContractorController
{
    protected ContractorService $contractorService;

    public function __construct(ContractorService $contractorService)
    {
        $this->contractorService = $contractorService;
    }

    public function index()
    {
        $contractors = $this->contractorService->getAllContractors();
        return view('contractors.index', compact('contractors'));
    }

    public function create()
    {
        return view('contractors.create');
    }

    public function store(ContractorRequest $request)
    {
        $data = $request->validated();
        $contractorData = new ContractorData($data);
        $this->contractorService->createContractor($contractorData);
        return redirect()->route('contractors.index')->with('success', 'Контрагент успешно создан');
    }

    public function edit(string $id)
    {
        $contractor = $this->contractorService->getContractorById($id);
        return view('contractors.edit', compact('contractor'));
    }

    public function update(ContractorRequest $request, string $id)
    {
        $data = $request->validated();
        $contractorData = new ContractorData($data);
        $this->contractorService->updateContractor($id, $contractorData);
        return redirect()->route('contractors.index')->with('success', 'Контрагент успешно обновлен');
    }

    public function destroy(string $id)
    {
        $this->contractorService->deleteContractor($id);
        return redirect()->route('contractors.index')->with('success', 'Контрагент успешно удален');
    }

    public function show(string $id)
    {
        $contractor = $this->contractorService->getContractorById($id);
        return view('contractors.show', compact('contractor'));
    }
}

