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
        $fatilities = $this->facilityService->index();
        return $fatilities;
        //return response()->json($fatilities, 200);
        //return view('components.hotels.hotel-card', compact('fatilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fatility = $request->all($request);
        $this->facilityService->create($fatility);
        return response()->json($fatility, 201);
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
        $fatility = $this->facilityService->edit($id);
        $fatility->update($request->all());
        $this->facilityService->update($fatility);
        return response()->json($fatility, 202);
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
