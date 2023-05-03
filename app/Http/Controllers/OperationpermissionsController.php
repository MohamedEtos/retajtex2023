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

        $request->validate([
            'cust_name'=>'required|string',
            'ptint_type'=>'nullable|string',
            'total_meter'=>'nullable|integer',
            'printer'=>'required|string',
            'date'=>'required|date',
            'designer'=>'required|string',
            'phone_number'=>'nullable|integer',
            'path'=>'nullable|string',
            'note'=>'nullable|string',
            'pic'=>'required|mimes:jpeg,png,jpg,gif|max:3072',
        ],[
            'cust_name.required' => 'املاء حقل الاسم اولا',
            'printer.required'=> 'لا يمكن ترك الماكيمه فارغه',
            'date.required'=> 'لا يمكن ترك التاريخ فارغه',
            'designer.required'=> 'برجاء تحديد المصمم ',
            'pic.required'=>'رجاء رفع صورة اولا ',
            'pic.mimes'=>'ندعم فقط (jpeg,png,jpg,gif)',
            'pic.max'=>'لا يزيد حجم الصورة عن (2MB)',
        ]);

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

        if($request->hasFile('pic')){

            $ext = '.'.$request->pic->getClientOriginalExtension();
            $imageName = str_replace($ext, date('d-m-Y-H-i') . $ext, $request->pic->getClientOriginalName());
            $request->pic->move(public_path('Attachments/'.$request->cust_name),$imageName);

            $id = Operationpermissions::latest()->first()->id;

            Operationpermissions::where('id',$id)->update([
                'pic' => $imageName,
            ]);

        }
        
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
    public function edit($id)
    {
        $cust_name = sublimation::distinct()->select('cust_name')->get();
        $edit = Operationpermissions::where('id',$id)->first();
        return view('Operationpermissions.editOperation',compact('edit','cust_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operationpermissions  $operationpermissions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'cust_name'=>'required|string',
            'ptint_type'=>'nullable|string',
            'total_meter'=>'nullable|integer',
            'printer'=>'required|string',
            'date'=>'required|date',
            'designer'=>'required|string',
            'phone_number'=>'nullable|integer',
            'path'=>'nullable|string',
            'note'=>'nullable|string',
            // 'pic'=>'mimes:jpeg,png,jpg,gif|max:2048'|nullable,
        ],[
            'cust_name.required' => 'املاء حقل الاسم اولا',
            'printer.required'=> 'لا يمكن ترك الماكيمه فارغه',
            'date.required'=> 'لا يمكن ترك التاريخ فارغه',
            'designer.required'=> 'برجاء تحديد المصمم ',
            // 'pic.required'=>'رجاء رفع صورة اولا ',
            'pic.mimes'=>'ندعم فقط (jpeg,png,jpg,gif)',
            'pic.max'=>'لا يزيد حجم الصورة عن (3MB)',
        ]);


        Operationpermissions::where('id',$request->id)->update([
            'cust_name'=>$request->cust_name,
            'ptint_type'=>$request->ptint_type,
            'total_meter'=>$request->total_meter,
            'printer'=>$request->printer,
            'date'=>$request->date,
            'designer'=>$request->designer,
            'phone_number'=>$request->phone_number,
            'path'=>$request->path,
            'note'=>$request->note,
        ]);

        if($request->hasFile('pic')){

            $ext = '.'.$request->pic->getClientOriginalExtension();
            $imageName = str_replace($ext, date('d-m-Y-H-i') . $ext, $request->pic->getClientOriginalName());
            $request->pic->move(public_path('Attachments/'.$request->cust_name),$imageName);


            Operationpermissions::where('id',$request->id)->update([
                'pic' => $imageName,
            ]);

        }
        
        return redirect('/Operationpermissions')->with('success','تم تعديل اذن التشغيل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operationpermissions  $operationpermissions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // return $request;
        Operationpermissions::where('id',$request->id)->delete();
        // File::delete(public_path('Attachments/'.$request->cust_name . '/' . $request->file_name));
        return redirect()->back()->with('success','تم الحذف');  
    }


}
