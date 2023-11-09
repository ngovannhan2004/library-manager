<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConditionRequest;
use App\Http\Requests\UpdateConditionRequest;
use App\Http\Services\ConditionService;
use App\Models\Condition;
use Illuminate\Http\Request;

class ConditonController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private ConditionService $statusService;

    public function __construct(ConditionService $statusService)
    {
        $this->statusService = $statusService;
    }
    public function index()
    {
        $conditions = $this->statusService->getAll();
        return view('admin.pages.condition.index', compact('conditions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = $this->statusService->getAll();
        return view('admin.pages.condition.create', compact('statuses'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConditionRequest $request)
    {
        $this->statusService->create($request);
        return redirect()->route('admin.conditions.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Condition $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $conditions = $this->statusService->getAll();
        $status = $this->statusService->getById($id);
        return view('admin.pages.condition.edit', compact('status', 'conditions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateConditionRequest $request)
    {
        $this->statusService->update($id, $request);
        return redirect()->route('admin.conditions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->statusService->delete($id);
        return redirect()->route('admin.conditions.index');
    }

}
