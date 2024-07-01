<?php

namespace App\Http\Controllers;

use App\Models\Tracking_Status;
use Illuminate\Http\Request;

class TrackingStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $laporanId)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $trackingStatus = new Tracking_Status([
            'laporan_id' => $laporanId,
            'status' => $request->status,
        ]);

        $trackingStatus->save();

        return redirect()->back()->with('success', 'Tracking status updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tracking_Status $tracking_Status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tracking_Status $tracking_Status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tracking_Status $tracking_Status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tracking_Status $tracking_Status)
    {
        //
    }
}
