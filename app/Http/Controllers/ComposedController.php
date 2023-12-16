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



    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComposedRequest $request)
    {

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
