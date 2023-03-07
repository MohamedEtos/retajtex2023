@extends('layouts.master')
@section('title')
سبلميشن
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

<style>
.table thead tr th{
    padding-right: 0px;
    font-size:15px
}
.table tbody tr td{
    padding: 1px
}
</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">سبلميشن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ </span>
						</div>
					</div>
                </div>
@endsection

@section('content')

{{-- Notify --}}

@if(Session::has('success'))
<input type="hidden" name="" id="massege" value="{{Session::get('success')}}">
<script>
 window.onload = function not7() {
   notif({
        msg: $('#massege').val(),
        type: "success"
    });
}
</script>
@endif

{{-- end Notify --}}

				<!-- row opened -->
				<div class="row row-sm">

					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="col-sm-12 col-md-2">
									<a href="sublimation/create" class="btn btn-primary-gradient col-12">اضافه</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap padding-0" data-page-length="25">
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
												<td class="pr-1">{{$i}}</td>
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
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->

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
                <form action="{{url('sublimation/delete')}}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية الحذف  ؟</h6>
                        </p>

                        <input type="hidden" name="order_id" id="order_id" value="">

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

        <!-- payment status -->
        <div class="modal fade" id="edit_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل حاله الدفع</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('updatePayments')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title">رقم الفاتورة</label>

                            <input type="hidden" class="form-control" name="id_inv" id="id_inv" value="">

                            <input type="text" disabled class="form-control" name="invoices_number" id="invoices_number">
                        </div>


                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">حاله الدفع</label>
                        <select name="invoices_status" id="invoices_status" class="custom-select my-1 mr-sm-2" required>
                                <option value="0" >مدفعوه كلياً</option>
                                <option value="1" >مدفوعه جزئيا</option>
                        </select>


                        <div class="form-group">
                            <label for="title">المبلغ المدفوع</label>

                            <input type="text" class="form-control" name="payment_value" id="payment_value">
                        </div>
                        <div class="form-group">
                            <label for="title">ملاحظات</label>
                            <input type="text" class="form-control" name="note_payments" id="note_payments">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تعديل الحاله</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        {{-- end payment status --}}

@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

<script>
    $('#delete_file').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var order_id = button.data('order_id')
        var modal = $(this)
        modal.find('.modal-body #order_id').val(order_id);
    })
</script>

<script>
    $('#edit_payment').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var invoices_number = button.data('invoices_number')
        var id_inv = button.data('id_inv')
        var modal = $(this)
        modal.find('.modal-body #invoices_number').val(invoices_number);
        modal.find('.modal-body #id_inv').val(id_inv);
    })
</script>
@endsection



