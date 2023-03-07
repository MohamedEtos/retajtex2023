<?php

namespace App\Http\Controllers;

use App\Models\emps;
use App\Models\old_order_sublimations;
use App\Models\sublimation;
use Illuminate\Http\Request;

class SublimationController extends Controller
{

    public function index()
    {
        $sublimation = sublimation::orderBy('id', 'DESC')->get();
        return view('sublimation.sublimation',compact('sublimation'));
        

    }


    public function create()
    {
        $cust_name = sublimation::distinct()->select('cust_name')->get();
        $sublimation = sublimation::limit(3)->orderBy('id', 'DESC')->get();
        $desingers = emps::where('postion','مصمم جرافيك')->get();
        return view('sublimation.add_order',compact('cust_name','desingers','sublimation'));
    }


    public function store(Request $request)
    {



        sublimation::create([
            'cust_name'=>$request->cus_name,
            'copy'=>$request->copy,
            'fileh'=>$request->fileh,
            'total_meter'=>$request->total_meter,
            'printer'=>$request->printer,
            'type_print'=>$request->ptint_type,
            'date'=>$request->date,
            'who_signed_order'=>$request->who_signed_order,
            'designer'=>$request->designer,
            'phone_number'=>$request->phone_number,
            'note'=>$request->note,
        ]);

        if($request->hasFile('pic')){

            $ext = '.'.$request->pic->getClientOriginalExtension();
            $imageName = str_replace($ext, date('d-m-Y-H-i') . $ext, $request->pic->getClientOriginalName());
            $request->pic->move(public_path('Attachments/'.$request->cus_name),$imageName);

            $id = sublimation::latest()->first()->id;
            $customer_id = $request->id;

            sublimation::where('id',$id)->update([
                'images' => $imageName,
            ]);

        }
        return redirect()->back()->with('success','تم تسجيل الاوردر');

    }


    public function show(sublimation $sublimation)
    {
        //
    }


    public function edit($id)
    {
        $sublimation = sublimation::where('id',$id)->first();
        $cust_name = sublimation::distinct()->select('cust_name')->get();
        $desingers = emps::where('postion','مصمم جرافيك')->get();
        $old_data = old_order_sublimations::all();

        return view('sublimation.edit_order',compact('sublimation','desingers','cust_name','old_data'));
    }


    public function update(Request $request, sublimation $sublimation)
    {

        // to make archie old order 
       sublimation::find($request->id)
       ->replicate()
       ->setTable('old_order_sublimations')
       ->save();

        sublimation::where('id',$request->id)->update([
            'cust_name'=>$request->cus_name,
            'copy'=>$request->copy,
            'fileh'=>$request->fileh,
            'total_meter'=>$request->total_meter,
            'printer'=>$request->printer,
            'type_print'=>$request->ptint_type,
            'date'=>$request->date,
            'who_signed_order'=>$request->who_signed_order,
            'designer'=>$request->designer,
            'phone_number'=>$request->phone_number,
            'note'=>$request->note,
        ]);

        if($request->hasFile('pic')){

            $ext = '.'.$request->pic->getClientOriginalExtension();
            $imageName = str_replace($ext, date('d-m-Y-H-i') . $ext, $request->pic->getClientOriginalName());
            $request->pic->move(public_path('Attachments/'.$request->cus_name),$imageName);

            sublimation::where('id',$request->id)->update([
                'images' => $imageName,
            ]);

        }
        return redirect()->back()->with('success','تم تعديل الاوردر');
    }



    public function destroy(Request $request)
    {
        sublimation::where('id',$request->order_id)->delete();
        return redirect()->back()->with('success','تم حذف الاوردر');

    }


    public function openfile($invoices_number,$file_name){

        return response()->file(public_path('Attachments/'.$invoices_number . '/' . $file_name));

    }
}
