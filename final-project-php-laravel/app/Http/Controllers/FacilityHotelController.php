<?php

namespace App\Http\Controllers;

use app\Service\FacilityHotelService;
use Illuminate\Http\Request;

class FacilityHotelController extends Controller
{
    private FacilityHotelService $facilityHotelService;

    public function __construct(FacilityHotelService $facilityHotelService)
    {
        $this->facilityHotelService = $facilityHotelService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fatilityHotel = $this->facilityHotelService->index();
        return response()->json($fatilityHotel, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fatilityHotel = $request->all($request);
        $this->facilityHotelService->create($fatilityHotel);
        return response()->json($fatilityHotel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->facilityHotelService->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fatilityHotel = $this->facilityHotelService->edit($id);
        $fatilityHotel->update($request->all());
        $this->facilityHotelService->update($fatilityHotel);
        return response()->json($fatilityHotel, 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->facilityHotelService->destroy($id);
        return response('the record was deleted from the database', 204);
    }
}
