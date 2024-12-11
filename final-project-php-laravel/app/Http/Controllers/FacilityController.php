<?php

namespace App\Http\Controllers;

use app\Service\FacilityService;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    private FacilityService $facilityService;

    public function __construct(FacilityService $facilityService)
    {
        $this->facilityService = $facilityService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = $this->facilityService->index();
        return response()->json($facilities, 200);
        //return view('components.hotels.hotel-card', compact('fatilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $facility = $request->all($request);
        $this->facilityService->create($facility);
        return response()->json($facility, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->facilityService->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $facility = $this->facilityService->edit($id);
        $facility->update($request->all());
        $this->facilityService->update($facility);
        return response()->json($facility, 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->facilityService->destroy($id);
        return response('the record was deleted from the database', 204);
    }
}
