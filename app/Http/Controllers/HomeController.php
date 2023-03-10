<?php

namespace App\Http\Controllers;

use App\Models\Operationpermissions;
use App\Models\sublimation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cust_counter = sublimation::distinct('cust_name')->count('cust_name');
        $total_printed = sublimation::sum('total_meter');
        $printed_today = sublimation::whereDate('created_at', '=',now())->sum('total_meter');
        $permossionPrinted = Operationpermissions::count();
        $fedar_order = Operationpermissions::where('printer','Fedar')->limit(3)->orderBy('id','DESC')->get();
        $dgi_order   = Operationpermissions::where('printer','dgi')->limit(3)->orderBy('id','DESC')->get();
        $sky_order   = Operationpermissions::where('printer','sky')->limit(3)->orderBy('id','DESC')->get();
        $designer_info = Operationpermissions::distinct()->select('designer')->get();
        $last_order = sublimation::all()->last();
        $last_customer_meter = sublimation::where('cust_name',$last_order->cust_name)->sum('total_meter');

        
        $mohamed_meter = Operationpermissions::where('designer','محمد محروس')->sum('total_meter');
        $mariam_meter = Operationpermissions::where('designer','مريم محمد')->sum('total_meter');
        $aya_meter = Operationpermissions::where('designer','ايه ايمن')->sum('total_meter');

        $mohamed_cust = Operationpermissions::where('designer','محمد محروس')->distinct('cust_name')->count('cust_name');
        $mariam_cust = Operationpermissions::where('designer','مريم محمد')->distinct('cust_name')->count('cust_name');
        $aya_cust = Operationpermissions::where('designer','ايه ايمن')->distinct('cust_name')->count('cust_name');

        $mohamed_des = Operationpermissions::where('designer','محمد محروس')->count();
        $mariam_des = Operationpermissions::where('designer','مريم محمد')->count();
        $aya_des = Operationpermissions::where('designer','ايه ايمن')->count();

        return view('home',compact(
            'cust_counter',
            'total_printed',
            'printed_today',
            'permossionPrinted',
            'designer_info',
            'fedar_order',
            'dgi_order',
            'sky_order',
            'last_order',
            'last_customer_meter',

            'mohamed_meter',
            'mariam_meter',
            'aya_meter',

            'mohamed_cust',
            'mariam_cust',
            'aya_cust',

            'mohamed_des',
            'mariam_des',
            'aya_des',

        ));
    }

    public static function info ($table,$eqal,$sum)
    {
      return  $getmeter = Operationpermissions::where($table,$eqal)->sum($sum);
    }

}

