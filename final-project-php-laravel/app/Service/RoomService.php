<?php

namespace App\Service;

use App\Models\Room;

class RoomService implements AllInterface
{
    public function index()
    {
        return Room::all();
    }

    public function create($request)
    {
        Room::create($request)->save();
    }

    public function edit($id)
    {
        return Room::find($id);
    }

    public function update($request)
    {
        Room::updated($request);
    }

    public function destroy($id)
    {
        Room::destroy($id);
    }
}
