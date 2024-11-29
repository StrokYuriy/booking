<?php

namespace App\Service;

use Illuminate\Http\Request;

interface AllInterface
{
    public function index();
    public function create($request);
    public function edit($id);
    public function update($request);
    public function destroy($id);
}
