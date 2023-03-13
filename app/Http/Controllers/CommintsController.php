<?php

namespace App\Http\Controllers;

use App\Models\commints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommintsController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'commints'=>'string',
        ]);

        commints::create([
            'user_id'=>Auth::user()->id,
            'commint'=>$request->commints
        ]);
        
        return redirect()->back();

    }

    public static function view(){
        $commints = commints::limit(3)->orderBy('id','DESC')->get();
        return $commints;
    }

}
