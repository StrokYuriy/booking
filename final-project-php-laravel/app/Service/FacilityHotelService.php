<?php

namespace App\Service;

use App\Models\FacilityHotel;

class FacilityHotelService implements AllInterface
{

    public function index()
    {
        return FacilityHotel::all();
    }

    public function create($request)
    {
        FacilityHotel::create($request)->save();
    }

    public function edit($id)
    {
        return FacilityHotel::find($id);
    }

    public function update($request)
    {
        FacilityHotel::updated($request);
    }

    public function destroy($id)
    {
        FacilityHotel::destroy($id);
    }
}
