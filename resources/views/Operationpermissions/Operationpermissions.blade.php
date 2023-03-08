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
                <h4 class="content-title mb-0 my-auto"><a href="#">المصممين</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     اذونات التشغيل</span>
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

<h4 class="text-center">توزيع الشغل علي المكن </h4>

<br>

{{-- printers rows --}}
<div class="row row-sm">



{{-- fedar  --}}
<div class="col-xl-4">
<div class="card">
    <div class="card-header text-center pb-2">
                <a href="{{url('Operationpermissions/addOperation/Fedar')}}" type="button" class="text-center h4" data-toggle="tooltip" data-placement="top" title="اضافه اوردر فيدار">
            فيدار
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0 text-md-nowrap">
                <thead>
                    <tr>
                        <th class="pr-1">م</th>
                        <th class="pr-2">اسم العميل</th>
                        <th class="pr-2">امتار</th>
                        <th class="pr-2">قطع</th>
                        <th class="pr-2">تاريخ الاوردر</th>
                        <th class="pr-2">المصمم</th>
                        <th class="pr-2">صورة</th>
                        <th class="pr-2">تفاصيل</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($fedar as $fedarp)
                        @php
                            $i++;
                        @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$fedarp->cust_name}}</td>
                        <td>{{$fedarp->total_meter}}</td>
                        <td>{{$fedarp->ptint_type}}</td>
                        <td>{{$fedarp->date}}</td>
                        <td>{{$fedarp->designer}}</td>
                        <td>صورة</td>
                        <td><button>btn</button></td>
                    </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
{{-- fedar  --}}


{{-- DGI  --}}
<div class="col-xl-4">
    <div class="card">
        <div class="card-header text-center pb-2">
            <a href="{{url('Operationpermissions/addOperation/dgi')}}" type="button" class="text-center h4" data-toggle="tooltip" data-placement="top" title="اضافه اوردر دي جي اي">
        دي جي اي
    </a>
</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0 text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="pr-1">م</th>
                            <th class="pr-2">اسم العميل</th>
                            <th class="pr-2">امتار</th>
                            <th class="pr-2">قطع</th>
                            <th class="pr-2">تاريخ الاوردر</th>
                            <th class="pr-2">المصمم</th>
                            <th class="pr-2">صورة</th>
                            <th class="pr-2">تفاصيل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($dgi as $dgip)
                            @php
                                $i++;
                            @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$dgip->cust_name}}</td>
                            <td>{{$dgip->total_meter}}</td>
                            <td>{{$dgip->ptint_type}}</td>
                            <td>{{$dgip->date}}</td>
                            <td>{{$dgip->designer}}</td>
                            <td>صورة</td>
                            <td><button>btn</button></td>
                        </tr>
    
    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    {{-- DGI  --}}






    {{-- sky  --}}
<div class="col-xl-4">
    <div class="card">
        <div class="card-header text-center pb-2">
            <a href="{{url('Operationpermissions/addOperation/sky')}}" type="button" class="text-center h4" data-toggle="tooltip" data-placement="top" title="اضافه اوردر سكاي">
        سكاي
    </a>
</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0 text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="pr-1">م</th>
                            <th class="pr-2">اسم العميل</th>
                            <th class="pr-2">امتار</th>
                            <th class="pr-2">قطع</th>
                            <th class="pr-2">تاريخ الاوردر</th>
                            <th class="pr-2">المصمم</th>
                            <th class="pr-2">صورة</th>
                            <th class="pr-2">تفاصيل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($sky as $skyp)
                            @php
                                $i++;
                            @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$skyp->cust_name}}</td>
                            <td>{{$skyp->total_meter}}</td>
                            <td>{{$skyp->ptint_type}}</td>
                            <td>{{$skyp->date}}</td>
                            <td>{{$skyp->designer}}</td>
                            <td>صورة</td>
                            <td><button>btn</button></td>
                        </tr>
    
    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    {{-- sky  --}}

</div>
</div>
</div>
{{-- printers rows --}}


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
