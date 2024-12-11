<?php

namespace App\Service;

use App\Models\Hotel;

class HotelService implements AllInterface
{
    public function index()
    {
        return Hotel::all();
    }

    public function create($request)
    {
        Hotel::create($request)->save();
    }

    public function edit($id)
    {
        return Hotel::find($id);
    }

    public function update($request)
    {
        Hotel::updated($request);
    }

    public function destroy($id)
    {
        Hotel::destroy($id);
    }
}
