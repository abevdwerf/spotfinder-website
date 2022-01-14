<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desk;
use App\Models\Module;

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
        // Desk::create($request->all());
        $data = $request->input();
        
        foreach($data as $key => $value){
            // dd($value['available_spaces']);
            $desk = new Desk();
            $desk->available_spaces = $value['available_spaces'];
            $desk->room_id = $value['room_id'];
    
            $desk->save();
            
            $module = Module::find($value['module_id']);
            $module->desk_id = $desk->id;
            $module->save();
        }

        return response()->json(array('success' => true, 'last_insert_id' => $desk->id), 200);
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
        $desk = Desk::find($id);
        $desk->update($request->all());
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
