<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComposedRequest;
use App\Http\Services\ComposedService;
use App\Models\Composed;
use Illuminate\Http\Request;

class ComposedController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private ComposedService $composedService;

    public function __construct(ComposedService $composedService)
    {
        $this->composedService = $composedService;
    }
    public function index()
    {
        $composeds = $this->composedService->getAll();
        return view('admin.pages.composed.index', compact('composeds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $composeds = $this->composedService->getAll();
        return view('admin.pages.composed.create', compact('composeds'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComposedRequest $request)
    {
        $this->composedService->create($request);
        return redirect()->route('admin.composeds.index')->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Composed $composed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $composeds = $this->composedService->getAll();
        $composed = $this->composedService->getById($id);
        return view('admin.pages.composed.edit', compact('composeds', 'composed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Composed $composed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Composed $composed)
    {
        //
    }
}
