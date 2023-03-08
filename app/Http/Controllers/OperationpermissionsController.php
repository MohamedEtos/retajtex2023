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
        $fedar = Operationpermissions::where('printer','Fedar')->get();
        $sky = Operationpermissions::where('printer','sky')->get();
        $dgi = Operationpermissions::where('printer','dgi')->get();
        $cust_name = sublimation::distinct()->select('cust_name')->get();
        return view('Operationpermissions.Operationpermissions',compact('cust_name','fedar','sky','dgi'));
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
        Operationpermissions::create([
            'cust_name'=>$request->cust_name,
            'ptint_type'=>$request->ptint_type,
            'total_meter'=>$request->total_meter,
            'printer'=>$request->printer,
            'date'=>$request->date,
            'designer'=>$request->designer,
            'phone_number'=>$request->phone_number,
            'path'=>$request->path,
            'note'=>$request->note,
            'pic'=>$request->pic,
        ]);

        return redirect()->back()->with('success','تم اضافه اذن التشغيل');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operationpermissions  $operationpermissions
     * @return \Illuminate\Http\Response
     */
    public function show($printer)
    {
        $cust_name = sublimation::distinct()->select('cust_name')->get();
        $printer_name = $printer; 
        return view('Operationpermissions.addOperation',compact('cust_name','printer_name'));
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
