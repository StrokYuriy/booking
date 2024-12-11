<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Service\BookingService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        $id = $request->room_id;
        $room = Room::with('bookings')->find($id);
        $booking = $request->all();
        foreach ($room->bookings as $roomBooking) {
            if (($booking['started_at'] >= $roomBooking->started_at && $booking['started_at'] < $roomBooking->finished_at)
                || ($booking['finished_at'] > $roomBooking->started_at && $booking['finished_at'] <= $roomBooking->finished_at)
                || ($booking['started_at'] < $roomBooking->started_at && $booking['finished_at'] > $roomBooking->finished_at)) {

                throw ValidationException::withMessages(['Номер занят, выберите другую дату и нажмите "Загрузить номера"']);
            }
        }

        $seconds = strtotime($request['finished_at']) - strtotime($request['started_at']);
        $booking['days'] = round($seconds / 86400, 1);
        $booking['price'] = $booking['days'] * $request['price'];
        $this->bookingService->create($booking);

        return redirect()->route('bookings.index');
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
