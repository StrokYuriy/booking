<?php

namespace App\Service;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookingService implements AllInterface
{

    public function index()
    {
        return Booking::where('user_id', Auth::id())->get();
    }

    public function create($request)
    {
        return Booking::create($request)->save();
    }

    public function edit($id)
    {
       return Booking::find($id);
    }

    public function update($request)
    {
        Booking::update($request);
    }

    public function destroy($id)
    {
        Booking::destroy($id);
    }
}
