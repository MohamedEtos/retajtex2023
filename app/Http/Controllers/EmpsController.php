<?php

namespace App\Http\Controllers;

use App\Models\emps;
use Illuminate\Http\Request;

class EmpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emps = emps::all();
        return view('emps.empsList',compact('emps'))->with('success','تمت الاضافة');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        emps::create([
            'name'=>$request->name,
            'postion'=>$request->postion,
            'phone_number'=>$request->phone_number,
        ]);
        
        return redirect()->back();
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
     * @param  \App\Models\emps  $emps
     * @return \Illuminate\Http\Response
     */
    public function show(emps $emps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\emps  $emps
     * @return \Illuminate\Http\Response
     */
    public function edit(emps $emps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\emps  $emps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, emps $emps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\emps  $emps
     * @return \Illuminate\Http\Response
     */
    public function destroy(emps $emps)
    {
        //
    }
}
