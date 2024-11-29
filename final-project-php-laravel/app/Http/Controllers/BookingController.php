<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\BookingService;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BookingService $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = $this->bookingService->index();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $booking = $request->all();
        $this->bookingService->create($booking);
        return back()->with('status', 'Booking successfully created', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $booking = $this->bookingService->edit($id);
        return view('bookings.show', compact('booking'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $booking = $this->bookingService->edit($id);
        $booking->update($request->all());
        $this->bookingService->update($booking);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->bookingService->destroy($id);
        return redirect('bookings')->with('the record was deleted from the database', 204);
    }
}
