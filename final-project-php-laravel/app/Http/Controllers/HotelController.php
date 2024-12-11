<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Service\HotelService;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    private HotelService $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = $this->hotelService->index();
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hotel = $this->hotelService->edit($id);

        return view('hotels.show', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->hotelService->destroy($id);
        return response('the record was deleted from the database', 204);
    }
}
