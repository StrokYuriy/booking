<?php

namespace App\Service;

use App\Models\FacilityRoom;

class FacilityRoomService implements AllInterface
{

    public function index()
    {
        return FacilityRoom::all()->toArray();
    }

    public function create($request)
    {
        FacilityRoom::create($request)->save();
    }

    public function edit($id)
    {
        return FacilityRoom::find($id);
    }

    public function update($request)
    {
        FacilityRoom::updated($request);
    }

    public function destroy($id)
    {
        FacilityRoom::destroy($id);
    }
}
