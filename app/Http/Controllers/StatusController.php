<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Services\StatusService;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private StatusService $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }
    public function index()
    {
        $statuses = $this->statusService->getAll();
        return view('admin.pages.status.index', compact('statuses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = $this->statusService->getAll();
        return view('admin.pages.status.create', compact('statuses'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request)
    {
        $this->statusService->create($request);
        return redirect()->route('admin.statuses.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $statuses = $this->statusService->getAll();
        $status = $this->statusService->getById($id);
        return view('admin.pages.status.edit', compact('status', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateStatusRequest $request)
    {
        $this->statusService->update($id, $request);
        return redirect()->route('admin.statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->statusService->delete($id);
        return redirect()->route('admin.statuses.index');
    }

}
