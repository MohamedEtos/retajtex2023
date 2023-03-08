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
    اضافة فاتورة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="/sublimation">سبلميشن</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     اضافه اوردر طباعه</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

@error('description')
<input id="description" type="hidden" value="{{$message}}">
<script>
    window.onload = function not7() {
      notif({
           msg: $('#description').val(),
           type: "error"
       });
   }
   </script>
@enderror


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


    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header pb-2">
                        <span class="text-center h4">البيانات الحالية</span>
                    </div>
                    <form action="{{url('sublimation/update')}}" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row mb-2">
                            <div class="col-md-3 col-sm-6 mt-4">
                                <label for="cus_name" class="control-label">اسم العميل</label>
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$sublimation->id}}">
                                <input list="brow" value="{{$sublimation->cust_name}}" name="cus_name" class="form-control" placeholder="يرجي التاكد ان اسم العميل موجود بالفعل" type="text">
                                <datalist id="brow">
                                    @foreach ($cust_name as $cust_names)
                                    <option value="{{$cust_names->cust_name}}">
                                    @endforeach
                                </datalist>
                            </div>



                            <div class="col-md-3 col-6 mt-4">
                                <label for="inputName" class="control-label">تكرار</label>
                                <input type="number" value="{{$sublimation->copy}}" class="form-control" oninput="calcMeter()"   id="copy" name="copy"
                                     >
                            </div>

                            <div class="col-md-3 col-6 mt-4">
                                <label for="inputName" class="control-label">طول الملف</label>
                                <input type="number" value="{{$sublimation->fileh}}" oninput="calcMeter()" class="form-control"  id="fileh" name="fileh"
                                     >
                            </div>

                            <div class="col-md-3 col-sm-6 mt-4">
                                <label for="inputName" class="control-label">اجمالي الامتار</label>
                                <input type="number" value="{{$sublimation->total_meter}}" class="form-control" id="total_meter" name="total_meter"
                                   readonly >
                            </div>

                        </div>

                        {{-- 2 --}}

                        <div class="row mb-2">

                        <div class="col-md-4 col-6 mt-4">
                            <label for="printer" class="control-label">ماكينة الطباعة</label>
                            <select name="printer" id="printer" class="form-control" >
                                <!--placeholder-->
                                <option value="{{$sublimation->printer}}" selected >{{$sublimation->printer}}</option>
                                <option value="Fedar">Fedar</option>
                                <option value="DGI">DGI</option>
                                <option value="Sky">SKY</option>
                            </select>
                        </div>


                            <div class="col-md-4 col-6 mt-4">
                                <label for="ptint_type" class="control-label">نوع الطباعه</label>
                                <input type="text" value="{{$sublimation->type_print}}" class="form-control" id="ptint_type" name="ptint_type" placeholder="قطع / اتواب">
                            </div>

                            <div class="col-md-4 col-sm-6 mt-4">
                                <label class="control-label ">تاريخ الطباعة</label>
                                <input class="form-control fc-datepicker" name="date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{$sublimation->date}}" >
                            </div>

                        </div>

                        {{-- 3 --}}

                        <div class="row mb-2">

                            <div class="col-md-4 col-6 mt-4">
                                <label for="designer" class="control-label">المصمم</label>
                                <select name="designer" id="designer" class="form-control" >
                                    <option selected value="{{$sublimation->designer}}">{{$sublimation->designer}}</option>
                                    @foreach ($desingers as $desinger)
                                        <option value="{{$desinger->name}}">{{$desinger->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 col-6 mt-4">
                                <label for="who_signed_order" class="control-label">القائم بالطباعه</label>
                                <input type="text" class="form-control form-control-lg" id="who_signed_order" value="{{$sublimation->who_signed_order}}" name="who_signed_order" >
                            </div>

                            <div class="col-md-4 col-12 mt-4">
                                <label for="phone_number"  class="control-label">رقم تلفون العميل</label>
                                <input type="text" readonly class="form-control form-control-lg" id="phone_number"  name="phone_number" >
                            </div>

                        </div>

                        {{-- 4 --}}
{{--
                        <div class="row mb-2">
                            <div class="col-md-6 col-sm-6">
                                <label for="inputName" class="control-label">قيمة ضريبة القيمة المضافة</label>
                                <input type="text" class="form-control" id="Value_VAT" name="Value_VAT" readonly>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="inputName" class="control-label">الاجمالي شامل الضريبة</label>
                                <input type="text" class="form-control" id="Total" name="Total" readonly>
                            </div>
                        </div> --}}

                        {{-- 5 --}}
                        <div class="row mt-4">
                            <div class="col-sm-12 col-md-8 mt-4">
                                <label for="note">ملاحظات</label>
                                <textarea class="form-control" id="note" value='{{$desinger->note}}' name="note" rows="5"></textarea>
                            </div>



                            <div class="col-sm-12 col-md-4 mt-4">
                                <label for="">صورة التصميم</label>
                                <label for="" class="text-warning"> المتاحه Jpg / Png / Pdf / Jpeg </label>
                                <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                    data-height="107" />
                            </div>

                            <div class="col-sm-12 col-md-4 mt-4">
                                <button type="submit" class="btn btn-primary ">حفظ التعديلات</button>
                                <a href="/sublimation"  type="submit" class="btn btn-outline-danger col-4 ">إلغاء</a>
                            </div>
                        </div>
                        <br>




                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


        <!--/div-->
            {{-- edit history --}}

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-2">
                    <span class="text-center h4">سجل تعديلات الاوردر</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="pr-1">م</th>
                                    <th class="pr-2">متر</th>
                                    <th class="pr-2">قطع</th>
                                    <th class="pr-2">ماكينه</th>
                                    <th class="pr-2">تاريخ الطباعه</th>
                                    <th class="pr-2">القائم بالطباعه</th>
                                    <th class="pr-2">المصمم</th>
                                    <th class="pr-2">ملاحظات</th>
                                    <th class="pr-2">التصميم</th>
                                    <th>تاريخ التعديل</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp

                                @foreach ($old_data as $old_datas)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$old_datas->total_meter}}</td>
                                    <td>{{$old_datas->type_print}}</td>
                                    <td>{{$old_datas->printer}}</td>
                                    <td>{{$old_datas->date}}</td>
                                    <td>{{$old_datas->who_signed_order}}</td>
                                    <td>{{$old_datas->designer}}</td>
                                    <td>{{$old_datas->note}}</td>
                                    <td>
                                        <a href="{{ url('viewfile') }}/{{ $old_datas->cust_name }}/{{ $old_datas->images }}" target="_blacnk">
                                        <img src="{{asset('Attachments/'.$old_datas->cust_name.'/'.$old_datas->images)}}"
                                        style="width: 50px; height:50px" alt=""></a>
                                    </td>
                                    <td>{{$old_datas->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- edit history --}}
    
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
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



    {{-- calc meters --}}


    <script>
        function calcMeter(){
            let copy = $('#copy').val();
            let fileh = $('#fileh').val();
            let total_meter = $('#total_meter');
            total_meter.val(parseInt(copy) * parseInt(fileh) / 100)  ;

        }
    </script>


@endsection
