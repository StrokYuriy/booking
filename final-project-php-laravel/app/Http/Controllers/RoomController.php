<?php

namespace App\Http\Controllers;

use App\Service\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private RoomService $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = $this->roomService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = $request->all($request);
        $this->roomService->create($room);
        return response()->json($room, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->roomService->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = $this->roomService->edit($id);
        $room->update($request->all());
        $this->roomService->update($room);
        return response()->json($room, 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roomService->destroy($id);
        return response('the record was deleted from the database', 204);
    }
}
