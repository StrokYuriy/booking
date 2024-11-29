<?php

namespace App\Service;

use App\Models\Facility;

class FacilityService implements AllInterface
{
    public function index()
    {
        return Facility::all();
    }

    public function create($request)
    {
        Facility::create($request)->save();
    }

    public function edit($id)
    {
        return Facility::find($id);
    }

    public function update($request)
    {
        Facility::updated($request);
    }

    public function destroy($id)
    {
        Facility::destroy($id);
    }
}
