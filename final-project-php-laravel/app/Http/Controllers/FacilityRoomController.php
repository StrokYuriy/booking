<?php

namespace App\Http\Controllers;

use app\Service\FacilityRoomService;
use Illuminate\Http\Request;

class FacilityRoomController extends Controller
{
    private FacilityRoomService $facilityRoomService;

    public function __construct(FacilityRoomService $facilityRoomService)
    {
        $this->facilityRoomService = $facilityRoomService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fatilityRoom = $this->facilityRoomService->index();
        return response()->json($fatilityRoom, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fatilityRoom = $request->all($request);
        $this->facilityRoomService->create($fatilityRoom);
        return response()->json($fatilityRoom, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->facilityRoomService->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fatilityRoom = $this->facilityRoomService->edit($id);
        $fatilityRoom->update($request->all());
        $this->facilityRoomService->update($fatilityRoom);
        return response()->json($fatilityRoom, 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->facilityRoomService->destroy($id);
        return response('the record was deleted from the database', 204);
    }
}
