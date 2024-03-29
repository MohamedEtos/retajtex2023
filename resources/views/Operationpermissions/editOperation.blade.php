@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

    <!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
تعديل اذن التشغيل
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="#">المصممين</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ url('Operationpermissions') }}">اذونات التشغيل</a> / تعديل </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <input id="cust_name" type="hidden" value="{{$error}}">
        <script>
            window.onload = function not7() {
            notif({
                msg: $('#cust_name').val(),
                type: "error"
            });
        }
        </script>
    @endforeach
@endif


@if(Session::has('success'))
<input id="nofic" type="hidden" value="{{Session::get('success')}}">
<script>
    window.onload = function not7() {
      notif({
           msg: $('#nofic').val(),
           type: "success"
       });
   }
   </script>
@endif


<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{url('Operationpermissions/update')}}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    {{ csrf_field() }}
                    {{-- 1 --}}
                    <input type="hidden" name="id" value="{{$edit->id}}">
                    <div class="row mb-2">
                        <div class="col-md-4 col-sm-6 mt-4">
                            <label for="cust_name" class="control-label">اسم العميل</label>
                            <input list="brow" name="cust_name" value="{{$edit->cust_name}}" class="form-control" placeholder="يرجي التاكد ان اسم العميل موجود بالفعل" type="text">
                            <datalist id="brow">
                                @foreach ($cust_name as $cust_names)
                                <option value="{{$cust_names->cust_name}}">
                                @endforeach
                            </datalist>
                            @error('cust_name')
                            <p class="border-bottom  border-danger mt-2 col-12"></p>
                        @enderror
                        </div>

                        <div class="col-md-4 col-sm-6 mt-4">
                            <label for="ptint_type" class="control-label">عدد القطع او نوع الطباعه</label>
                            <input type="text" value="{{$edit->ptint_type}}" class="form-control" id="print_type" name="ptint_type" placeholder="عدد القطع او نوع الطباعه">
                            @error('ptint_type')
                            <p class="border-bottom  border-danger mt-2 col-12"></p>
                        @enderror
                        </div>


                        <div class="col-md-4 col-sm-6 mt-4">
                            <label for="inputName" class="control-label">الامتار المطلوبه </label>
                            <input type="number" value="{{$edit->total_meter}}" class="form-control" id="total_meter" name="total_meter">
                            @error('total_meter')
                            <p class="border-bottom  border-danger mt-2 col-12"></p>
                        @enderror
                        </div>

                    </div>

                    {{-- 2 --}}

                    <div class="row mb-2">


                            <div class="col-md-4 col-sm-6 mt-4">
                                <label for="printer" class="control-label">ماكينة الطباعة</label>
                                <select name="printer" id="printer" class="form-control" >
                                    <!--placeholder-->
                                    <option value="{{$edit->printer}}" selected>{{$edit->printer}}</option>
                                    <option value="fedar">Fedar</option>
                                    <option value="dgi">DGI</option>
                                    <option value="sky">SKY</option>
                                </select>
                                @error('printer')
                                <p class="border-bottom  border-danger mt-2 col-12"></p>
                            @enderror
                            </div>

                            <div class="col-md-4 col-sm-6 mt-4">
                                <label class="control-label ">تاريخ تاكيد الاوردر</label>
                                <input class="form-control fc-datepicker" name="date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{$edit->date}}" >
                                    @error('date')
                                    <p class="border-bottom  border-danger mt-2 col-12"></p>
                                @enderror
                            </div>
    
                            <div class="col-md-4 col-sm-6 mt-4">
                                <label for="designer" class="control-label">المصمم</label>
                                <input type="text" class="form-control form-control-lg" id="designer" value="{{$edit->designer}}" name="designer" >
                                @error('designer')
                                <p class="border-bottom  border-danger mt-2 col-12"></p>
                            @enderror
                            </div>

                    </div>

                    {{-- 3 --}}

                    <div class="row mb-2">

                        <div class="col-md-4 col-sm-6 mt-4">
                            <label for="phone_number"  class="control-label">رقم تلفون العميل</label>
                            <input type="text" value="{{$edit->phone_number}}" class="form-control form-control-lg" id="phone_number"  name="phone_number" >
                        </div>

                        <div class="col-md-4 col-sm-6 mt-4">
                            <label for="path"  class="control-label">مكان الملف</label>
                            <input type="text" class="form-control form-control-lg" id="path" value="{{$edit->path}}"  name="path" >
                        </div>

                    </div>

                    {{-- 4 --}}


                    {{-- 5 --}}

                    <div class="row mt-4">
                        <div class="col-sm-12 col-md-8 mt-4">
                            <label for="note">ملاحظات</label>
                            <textarea class="form-control" id="note" value="{{$edit->note}}" name="note" rows="5"></textarea>
                        </div>



                        <div class="col-sm-12 col-md-4 mt-4">
                            <label for="">ضع الصورة الجديده اذا اردت تغيرها</label>
                            <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="107" />
                        </div>

                        <div class="col-sm-12 col-md-4 mt-4">
                            <button type="submit" class="btn btn-primary ">حفظ البيانات</button>
                            <a  class="btn btn-outline-danger" href="{{url('Operationpermissions')}}">الغاء</a>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->


</div>
</div>

@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>

    <script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>

    <script>
        $(document).ready(function() {
            $('select[name="Section"]').on('change', function() {
                var SectionId = $(this).val();
                // alert(SectionId);
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('section') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>


    <script>
        function myFunction() {

            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
            var Discount = parseFloat(document.getElementById("Discount").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);

            var Amount_Commission2 = Amount_Commission - Discount;


            if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {

                alert('يرجي ادخال مبلغ العمولة ');

            } else {
                var intResults = Amount_Commission2 * Rate_VAT / 100;

                var intResults2 = parseFloat(intResults + Amount_Commission2);

                sumq = parseFloat(intResults).toFixed(2);

                sumt = parseFloat(intResults2).toFixed(2);

                document.getElementById("Value_VAT").value = sumq;

                document.getElementById("Total").value = sumt;

            }

        }

    </script>





@endsection
