<?php

namespace App\Http\Controllers;

use App\Models\commints;
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
        $this->middleware('auth'); 
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
        $all_images = sublimation::where('images', '!=', 'updated')->limit(10)->orderBy('id','DESC')->get();
        $commints = commints::limit(3)->orderBy('id','DESC')->get();
        
        $mohamed_meter = sublimation::where('designer','محمد محروس')->sum('total_meter');
        $mariam_meter = sublimation::where('designer','مريم محمد')->sum('total_meter');
        $aya_meter = sublimation::where('designer','ايه ايمن')->sum('total_meter');

        $mohamed_cust = sublimation::where('designer','محمد محروس')->distinct('cust_name')->count('cust_name');
        $mariam_cust = sublimation::where('designer','مريم محمد')->distinct('cust_name')->count('cust_name');
        $aya_cust = sublimation::where('designer','ايه ايمن')->distinct('cust_name')->count('cust_name');

        $mohamed_des = sublimation::where('designer','محمد محروس')->count();
        $mariam_des = sublimation::where('designer','مريم محمد')->count();
        $aya_des = sublimation::where('designer','ايه ايمن')->count();

        return view('index',compact(
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
            'all_images',
            'commints',

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

