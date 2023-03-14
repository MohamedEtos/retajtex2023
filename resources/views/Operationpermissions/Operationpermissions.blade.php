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
    اضافه اذونات تشغيل
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
        <img style="width: 100px" class=" position-absolute printer_img_postiom " src="{{asset('assets/img/printers/fedar.png')}}" alt="">

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0 text-md-nowrap small-font">
                <thead>
                    <tr>
                        <th class="pr-1">م</th>
                        <th class="pr-2">اسم العميل</th>
                        <th class="pr-2">امتار</th>
                        <th class="pr-2">قطع</th>
                        <th class="pr-2">تاريخ الاوردر</th>
                        <th class="pr-2">المصمم</th>
                        <th class="pr-2">صورة</th>
                        <th class="pr-2">عمليات</th>
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
                    <tr  @php if (! $fedarp->order_status == 0) {echo' style="background-color: rgba(197, 243, 255, 0.556)"';}@endphp>
                        <td>{{$i}}</td>
                        <td>{{$fedarp->cust_name}}</td>
                        <td>{{$fedarp->total_meter}}</td>
                        <td>{{$fedarp->ptint_type}}</td>
                        <td>{{$fedarp->date}}</td>
                        <td>{{$fedarp->designer}}</td>

                        <td>
                            <a href="{{ url('viewfile') }}/{{ $fedarp->cust_name }}/{{ $fedarp->pic }}" target="_blacnk">
                            <img src="{{asset('Attachments/'.$fedarp->cust_name.'/'.$fedarp->pic)}}"
                            style="width: 50px; height:50px" alt=""></a>                        
                        </td>
                        
                        <td>
                            <div class="dropdown">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info btn-sm p-1 m-1 small-font-btn"
                                data-toggle="dropdown" type="button">خيارات<i class="fas fa-caret-down ml-1"></i></button>
                                <div class="dropdown-menu tx-13">
                                    <a class="dropdown-item   text-success small-font-btn  p-1 m-1"<?php if(!$fedarp->order_status == 1) {echo 'href';}?> ="{{url('Operationpermissions/print/'.$fedarp->id)}}">
                                        @php
                                            if($fedarp->order_status == 1){
                                                echo 'جاري الطباعه';
                                            }else {
                                                echo 'بدء الطباعه';
                                            }
                                        @endphp
                                    </a>
                                    <form action="{{url('Operationpermissions/destroy')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id"  value="{{$fedarp->id}}">
                                        <input class="text-success dropdown-item small-font-btn p-1 m-1" type="submit" value="تم الانتهاء">
                                    </form>
                                    <a class="dropdown-item text-info small-font-btn p-1 m-1" href="{{url('Operationpermissions/edit/'.$fedarp->id)}}">تعديل</a>

                                    <button class="dropdown-item text-danger small-font-btn"
                                    data-toggle="modal"
                                    data-order_id="{{$fedarp->id}}"
                                    data-target="#delete_file"> حذف 
                                    </button>                             
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
{{-- fedar  --}}


{{-- DGI  --}}
<div class="col-xl-4 ">
    <div class="card">
        <div class="card-header text-center  position-relative">
            <a href="{{url('Operationpermissions/addOperation/dgi')}}" type="button" class="text-center h4" data-toggle="tooltip" data-placement="top" title="اضافه اوردر دي جي اي">
                دي جي اي
            </a>
                <img style="width: 60px" class=" position-absolute printer_img_postiom " src="{{asset('assets/img/printers/dgi.png')}}" alt="">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0 text-md-nowrap small-font">
                    <thead>
                        <tr>
                            <th class="pr-1">م</th>
                            <th class="pr-2">اسم العميل</th>
                            <th class="pr-2">امتار</th>
                            <th class="pr-2">قطع</th>
                            <th class="pr-2">تاريخ الاوردر</th>
                            <th class="pr-2">المصمم</th>
                            <th class="pr-2">صورة</th>
                            <th class="pr-2">عمليات</th>
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
                        <tr  @php if (! $dgip->order_status == 0) {echo' style="background-color: rgba(197, 243, 255, 0.556)"';}@endphp>
                            <td>{{$i}}</td>
                            <td>{{$dgip->cust_name}}</td>
                            <td>{{$dgip->total_meter}}</td>
                            <td>{{$dgip->ptint_type}}</td>
                            <td>{{$dgip->date}}</td>
                            <td>{{$dgip->designer}}</td>
                            <td>
                                <a href="{{ url('viewfile') }}/{{ $dgip->cust_name }}/{{ $dgip->pic }}" target="_blacnk">
                                <img src="{{asset('Attachments/'.$dgip->cust_name.'/'.$dgip->pic)}}"
                                style="width: 50px; height:50px" alt=""></a>                        
                                </td>
                            <td>
                            
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info btn-sm p-1 m-1 small-font-btn"
                                    data-toggle="dropdown" type="button">خيارات<i class="fas fa-caret-down ml-1"></i></button>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item   text-success small-font-btn  p-1 m-1"<?php if(!$dgip->order_status == 1) {echo 'href';}?> ="{{url('Operationpermissions/print/'.$dgip->id)}}">
                                                @php
                                                if($dgip->order_status == 1){
                                                    echo 'جاري الطباعه';
                                                }else {
                                                    echo 'بدء الطباعه';
                                                }
                                            @endphp
                                        </a>
                                        <form action="{{url('Operationpermissions/destroy')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id"  value="{{$dgip->id}}">
                                            <input class="text-success dropdown-item small-font-btn p-1 m-1" type="submit" value="تم الانتهاء">
                                        </form>
                                        <a class="dropdown-item text-info small-font-btn p-1 m-1" href="{{url('Operationpermissions/edit/'.$dgip->id)}}">تعديل</a>

                                        <button class="dropdown-item text-danger small-font-btn"
                                        data-toggle="modal"
                                        data-order_id="{{$dgip->id}}"
                                        data-target="#delete_file"> حذف 
                                        </button>                             
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
    {{-- DGI  --}}






    {{-- sky  --}}
<div class="col-xl-4">
    <div class="card">
        <div class="card-header text-center     ">
            <a href="{{url('Operationpermissions/addOperation/sky')}}" type="button" class="text-center h4" data-toggle="tooltip" data-placement="top" title="اضافه اوردر سكاي">
        سكاي
    </a>
    <img style="width: 110px" class=" position-absolute printer_img_postiom " src="{{asset('assets/img/printers/sky.png')}}" alt="">
</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0 text-md-nowrap small-font">
                    <thead>
                        <tr>
                            <th class="pr-1">م</th>
                            <th class="pr-2">اسم العميل</th>
                            <th class="pr-2">امتار</th>
                            <th class="pr-2">قطع</th>
                            <th class="pr-2">تاريخ الاوردر</th>
                            <th class="pr-2">المصمم</th>
                            <th class="pr-2">صورة</th>
                            <th class="pr-2">عمليات</th>
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
                        <tr  @php if (! $skyp->order_status == 0) {echo' style="background-color: rgba(197, 243, 255, 0.556)"';}@endphp>
                            <td>{{$i}}</td>
                            <td>{{$skyp->cust_name}}</td>
                            <td>{{$skyp->total_meter}}</td>
                            <td>{{$skyp->ptint_type}}</td>
                            <td>{{$skyp->date}}</td>
                            <td>{{$skyp->designer}}</td>
                            <td>
                                <a href="{{ url('viewfile') }}/{{ $skyp->cust_name }}/{{ $skyp->pic }}" target="_blacnk">
                                    <img src="{{asset('Attachments/'.$skyp->cust_name.'/'.$skyp->pic)}}"
                                    style="width: 50px; height:50px" alt="">
                                </a>                     
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info btn-sm p-1 m-1 small-font-btn"
                                    data-toggle="dropdown" type="button">خيارات<i class="fas fa-caret-down ml-1"></i></button>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item   text-success small-font-btn  p-1 m-1"<?php if(!$skyp->order_status == 1) {echo 'href';}?> ="{{url('Operationpermissions/print/'.$skyp->id)}}">
                                            @php
                                                if($skyp->order_status == 1){
                                                    echo 'جاري الطباعه';
                                                }else {
                                                    echo 'بدء الطباعه';
                                                }
                                            @endphp
                                        </a>
                                        <form action="{{url('Operationpermissions/destroy')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id"  value="{{$skyp->id}}">
                                            <input class="text-success dropdown-item small-font-btn p-1 m-1" type="submit" value="تم الانتهاء">
                                        </form>
                                        <a class="dropdown-item text-info small-font-btn p-1 m-1" href="{{url('Operationpermissions/edit/'.$skyp->id)}}">تعديل</a>

                                        <button class="dropdown-item text-danger small-font-btn"
                                        data-toggle="modal"
                                        data-order_id="{{$skyp->id}}"
                                        data-target="#delete_file"> حذف 
                                        </button>                             
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
    {{-- sky  --}}

</div>
</div>
</div>
{{-- printers rows --}}




    {{-- delete modal --}}

    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('Operationpermissions/destroy')}}" method="post">

                {{ csrf_field() }}
                <div class="modal-body">
                    <p class="text-center">
                    <h6 style="color:red"> هل انت متاكد من عملية الحذف  ؟</h6>
                    </p>

                    <input type="hidden" name="id" id="order_id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

    {{-- delete modal --}}


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
    $('#delete_file').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var order_id = button.data('order_id')
        var modal = $(this)
        modal.find('.modal-body #order_id').val(order_id);
    })
</script>





@endsection
