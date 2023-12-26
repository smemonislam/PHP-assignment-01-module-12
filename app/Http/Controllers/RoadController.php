<?php

namespace App\Http\Controllers;

use App\Models\Road;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoadRequest;
use App\Http\Requests\UpdateRoadRequest;

class RoadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roads = Road::latest()->get();
        return view('backend.pages.roads.index', compact('roads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.roads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoadRequest $request)
    {
        Road::create($request->validated());

        return redirect()->back()->with('success', 'Roads created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Road $road)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Road $road)
    {
        return view('backend.pages.roads.edit', compact('road'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoadRequest $request, Road $road)
    {
        $road->update($request->validated());

        return redirect()->back()->with('success', 'Roads created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Road $road)
    {
        $road->delete();
        return redirect()->back()->with('success', 'Roads deleted successfully.');
    }
}
