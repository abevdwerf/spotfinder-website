<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        return Location::all();
    }

    public function getLocation ($id) {
        return Location::where('id', $id)->get()[0]->location_name;
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        Location::create($request->all());
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $location_name = $request->input('location_name');

        $location = Location::find($id);
        $location->update($request->all());
    }

    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();
    }
}
