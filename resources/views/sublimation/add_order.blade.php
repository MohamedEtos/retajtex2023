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
                    <form action="{{url('sublimation/store')}}" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row mb-2">
                            <div class="col-md-3 col-sm-6 mt-4">
                                <label for="cus_name" class="control-label">اسم العميل</label>
                                {{-- <input type="text" class="form-control" id="cus_name" name="cus_name"> --}}
                                <input list="brow" name="cus_name" class="form-control" placeholder="يرجي التاكد ان اسم العميل موجود بالفعل" type="text">
                                <datalist id="brow">
                                    @foreach ($cust_name as $cust_names)
                                    <option value="{{$cust_names->cust_name}}">
                                    @endforeach
                                </datalist>
                            </div>



                            <div class="col-md-3 col-sm-6 mt-4">
                                <label for="inputName" class="control-label">تكرار</label>
                                <input type="number" class="form-control" oninput="calcMeter()"   id="copy" name="copy"
                                     >
                            </div>

                            <div class="col-md-3 col-sm-6 mt-4">
                                <label for="inputName" class="control-label">طول الملف</label>
                                <input type="number" oninput="calcMeter()" class="form-control"  id="fileh" name="fileh"
                                     >
                            </div>

                            <div class="col-md-3 col-sm-6 mt-4">
                                <label for="inputName" class="control-label">اجمالي الامتار</label>
                                <input type="number" class="form-control" id="total_meter" name="total_meter"
                                   readonly >
                            </div>

                        </div>

                        {{-- 2 --}}

                        <div class="row mb-2">

                        <div class="col-md-4 col-sm-6 mt-4">
                            <label for="printer" class="control-label">ماكينة الطباعة</label>
                            <select name="printer" id="printer" class="form-control" >
                                <!--placeholder-->
                                <option value="" selected disabled>حدد ماكينة الطباعه</option>
                                <option value="fedar">Fedar</option>
                                <option value="dgi">DGI</option>
                                <option value="sky">SKY</option>
                            </select>
                        </div>


                            <div class="col-md-4 col-sm-6 mt-4">
                                <label for="ptint_type" class="control-label">نوع الطباعه</label>
                                <input type="text" class="form-control" id="ptint_type" name="ptint_type" placeholder="قطع / اتواب">
                            </div>

                            <div class="col-md-4 col-sm-6 mt-4">
                                <label class="control-label ">تاريخ الطباعة</label>
                                <input class="form-control fc-datepicker" name="date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ date('Y-m-d') }}" >
                            </div>

                        </div>

                        {{-- 3 --}}

                        <div class="row mb-2">

                            <div class="col-md-4 col-sm-6 mt-4">
                                <label for="designer" class="control-label">المصمم</label>
                                <select name="designer" id="designer" class="form-control" >
                                    @foreach ($desingers as $desinger)
                                        <option value="{{$desinger->name}}">{{$desinger->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-6 mt-4">
                                <label for="who_signed_order" class="control-label">القائم بالطباعه</label>
                                <input type="text" class="form-control form-control-lg" id="who_signed_order" value="{{Auth::User()->name}}" name="who_signed_order" >
                            </div>

                            <div class="col-md-4 col-sm-6 mt-4">
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
                                <textarea class="form-control" id="note" name="note" rows="5"></textarea>
                            </div>



                            <div class="col-sm-12 col-md-4 mt-4">
                                <label for="">صورة التصميم</label>
                                <label for="" class="text-warning"> المتاحه Jpg / Png / Pdf / Jpeg </label>
                                <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                    data-height="107" />
                            </div>

                            <div class="col-sm-12 col-md-4 mt-4">
                                <button type="submit" class="btn btn-outline-primary ">حفظ البيانات</button>
                            </div>
                        </div>
                        <br>




                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
        {{-- edit history --}}
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-2">
                        <span class="text-center h4">اخر اوردر مضاف</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th class="pr-1">م</th>
                                        <th class="pr-2">اسم العميل</th>
                                        <th class="pr-2">متر</th>
                                        <th class="pr-2">قطع</th>
                                        <th class="pr-2">ماكينه</th>
                                        <th class="pr-2">تاريخ الطباعه</th>
                                        <th class="pr-2">القائم بالطباعه</th>
                                        <th class="pr-2">المصمم</th>
                                        <th class="pr-2">ملاحظات</th>
                                        <th class="pr-2">التصميم</th>
                                        <th class="pr-2">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0
                                    @endphp
                                    @foreach ($sublimation as $sublimationn)
                                        @php
                                            $i++
                                        @endphp
                                    <tr>
                                        <td class="pr-1">{{$sublimationn->id}}</td>
                                        <td class="pr-1">{{$sublimationn->cust_name}}</td>
                                        {{-- <td>{{$sublimationn->copy}}</td> --}}
                                        {{-- <td>{{$sublimationn->fileh}}</td> --}}
                                        <td class="pr-1">{{$sublimationn->total_meter}}</td>
                                        <td class="pr-1">{{$sublimationn->type_print}}</td>
                                        <td class="pr-1">{{$sublimationn->printer}}</td>
                                        <td class="pr-1">{{$sublimationn->date}}</td>
                                        <td class="pr-1">{{$sublimationn->who_signed_order}}</td>
                                        <td class="pr-1">{{$sublimationn->designer}}</td>
                                        <td class="pr-1">{{$sublimationn->note}}</td>
                                        <td class="pr-1">

                                        {{-- if not fount images  --}}
                                        <?php
                                        if($sublimationn->images == null){
                                            echo "لا توجد صورة";
                                        }else{
                                        ?>
                                        <a href="{{ url('viewfile') }}/{{ $sublimationn->cust_name }}/{{ $sublimationn->images }}" target="_blacnk">
                                            <img src="{{asset('Attachments/'.$sublimationn->cust_name.'/'.$sublimationn->images)}}"
                                                style="width: 50px; height:50px" alt=""></a>
                                        <?php
                                        }
                                        ?>
                                        {{--  end if not fount images  --}}

                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true" class="btn btn-sm ripple btn-primary"
                                                data-toggle="dropdown" id="dropdownMenuButton" type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                <div  class="dropdown-menu tx-13">
                                                    {{-- <a class="dropdown-item" href="">تفاصيل </a> --}}

                                                    <a class="dropdown-item text-info" href="{{url('sublimation/edit_order/'.$sublimationn->id)}}">تعديل </a>

                                                    <button class="dropdown-item text-danger"
                                                    data-toggle="modal"
                                                    data-order_id="{{$sublimationn->id}}"
                                                    data-target="#delete_file"> حذف
                                                </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
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
