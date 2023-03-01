<?php

namespace App\Http\Controllers;

use App\Models\sublimation;
use Illuminate\Http\Request;

class SublimationController extends Controller
{

    public function index()
    {
        return view('sublimation.sublimation');


    }


    public function create()
    {
        return view('sublimation.add_order');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(sublimation $sublimation)
    {
        //
    }


    public function edit(sublimation $sublimation)
    {
        //
    }


    public function update(Request $request, sublimation $sublimation)
    {
        //
    }

    public function destroy(sublimation $sublimation)
    {
        //
    }
}
