<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desk;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Desk::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room_id = $request->input('room_id');
        $available_spaces = $request->input('available_spaces');
        $wall_outlet = $request->input('wall_outlet');
        $x = $request->input('x');
        $y = $request->input('y');

        $desk = new Desk();
        $desk->room_id = $room_id;
        $desk->available_spaces = $available_spaces;
        $desk->wall_outlet = $wall_outlet;
        $desk->x = $x;
        $desk->y = $y;
        $desk->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room_id = $request->input('room_id');
        $available_spaces = $request->input('available_spaces');
        $wall_outlet = $request->input('wall_outlet');
        $x = $request->input('x');
        $y = $request->input('y');

        $desk = Desk::find($id);
        $desk->room_id = $room_id;
        $desk->available_spaces = $available_spaces;
        $desk->wall_outlet = $wall_outlet;
        $desk->x = $x;
        $desk->y = $y;
        $desk->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desk = Desk::find($id);
        $desk->delete();
    }
}
