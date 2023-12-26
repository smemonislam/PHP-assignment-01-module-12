<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use App\Models\SeatAllocation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeatAllocationRequest;
use App\Http\Requests\UpdateSeatAllocationRequest;

class SeatAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.seat-allocations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trips = Trip::with(['bus', 'location'])->latest()->get();

        $seatAllocations = SeatAllocation::pluck('seat_number')->toArray();

        return view('backend.pages.seat-allocations.create', compact('trips', 'seatAllocations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeatAllocationRequest $request)
    {
        $data_user = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ];

        $user = User::create($data_user);

        $data_trip = [
            'trip_id' => $request->input('trip_id'),
            'user_id' => $user->id,
            'seat_number' => $request->input('seat_number'),
        ];

        SeatAllocation::create($data_trip);

        return redirect()->route('seat-alloactions.index')->with('status', 'Tickets created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SeatAllocation $seatAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeatAllocation $seatAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeatAllocationRequest $request, SeatAllocation $seatAllocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeatAllocation $seatAllocation)
    {
        //
    }
}
