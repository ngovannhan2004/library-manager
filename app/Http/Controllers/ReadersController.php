<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReadersRequest;
use App\Http\Requests\UpdateReadersRequest;
use App\Http\Services\ReadersService;
use App\Models\Readers;
use Illuminate\Http\Request;

class ReadersController extends Controller
{

    private ReadersService $readersService;

    public function __construct(ReadersService $readersService)
    {
        $this->readersService = $readersService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $readers = $this->readersService->getAll();
        return view('admin.pages.readers.index', compact('readers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $readers = $this->readersService->getAll();
        return view('admin.pages.readers.create', compact('readers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReadersRequest $request)
    {
        $this->readersService->create($request);
        return redirect()->route('admin.readers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Readers $readers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $readers = $this->readersService->getAll();
        $reader = $this->readersService->getById($id);
        return view('admin.pages.readers.edit', compact('reader', 'readers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateReadersRequest $request)
    {
        $this->readersService->update($id,$request);
        return redirect() ->route('admin.readers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->readersService->delete($id);
        return redirect() ->route('admin.readers.index');
    }
}
