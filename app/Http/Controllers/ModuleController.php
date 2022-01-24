<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Sensor;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Module::all();
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
        $module = Module::create($request->all());
        $amount = $module->Desk->available_spaces;

        if ($amount != null)
        {
            for ($i=0; $i < $amount; $i++)
            {
                Sensor::create(['module_id' => $module->id]);
            }
        }

        return $module->id;
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
        $module = Module::find($id);
        $module->update($request->all());

        $sensors = Sensor::where('module_id', '=', $module->id)->get();
        $countSensors = count($sensors);

        if ($countSensors > 0)
        {
            if ($module->Desk->available_spaces != $countSensors)
            {
                Sensor::where('module_id', '=', $module->id)->delete();

                for ($i=0; $i < $module->Desk->available_spaces; $i++)
                {
                    Sensor::create(['module_id' => $module->id]);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        $module->delete();
    }
}
