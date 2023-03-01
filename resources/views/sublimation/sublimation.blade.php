@extends('layouts.master')
@section('title')
الفواتير
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
				<!-- row opened -->
				<div class="row row-sm">

					<!--/div-->

                    @if(Session::has('success'))
                    {{-- <span id="hideMeAfter5Seconds"  class=" mr-2 text-success">{{Session::get('success')}}</span> --}}

                    <script>
                     window.onload = function not7() {
                       notif({
                            msg: "تم حذف الفتاتورة ",
                            type: "success"
                        });
                    }
                    </script>


                    @endif
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="">
									<a href="sublimation/create" class="btn btn-primary-gradient ">اضافه</a>
									<a href="invoices/create" class="btn btn-primary-gradient ">اضافه</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap " data-page-length="25">
										<thead>
											<tr>
												<th class="border-bottom-0">م</th>
												<th class="border-bottom-0">اسم العميل</th>
												<th class="border-bottom-0">متر</th>
												<th class="border-bottom-0">قطع</th>
												<th class="border-bottom-0">ماكينه</th>
												<th class="border-bottom-0">تاريخ الطباعه</th>
												<th class="border-bottom-0">القائم بالطباعه</th>
												<th class="border-bottom-0">المصمم</th>
												<th class="border-bottom-0">ملاحظات</th>
												<th class="border-bottom-0">الاجمالي</th>
												<th class="border-bottom-0">التصميم</th>
												<th class="border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>اسامه جميل</td>
												<td>55</td>
												<td></td>
												<td>dgi</td>
												<td>1\3\2023</td>
												<td>حبيبة</td>
												<td>مريم</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
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
                <form action="{{url('invoicesDeleted')}}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف الفاتورة ؟</h6>
                        </p>

                        <input type="hidden" name="id_inv" id="id_inv" value="">

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
        var id_inv = button.data('id_inv')
        var modal = $(this)
        modal.find('.modal-body #id_inv').val(id_inv);
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



