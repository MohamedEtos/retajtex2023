<?php

namespace App\Http\Controllers;

use App\Models\Operationpermissions;
use App\Models\sublimation;
use Illuminate\Http\Request;

class OperationpermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cust_name = sublimation::distinct()->select('cust_name')->get();
        return view('Operationpermissions.Operationpermissions',compact('cust_name'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operationpermissions  $operationpermissions
     * @return \Illuminate\Http\Response
     */
    public function show(Operationpermissions $operationpermissions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operationpermissions  $operationpermissions
     * @return \Illuminate\Http\Response
     */
    public function edit(Operationpermissions $operationpermissions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operationpermissions  $operationpermissions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operationpermissions $operationpermissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operationpermissions  $operationpermissions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operationpermissions $operationpermissions)
    {
        //
    }
}
