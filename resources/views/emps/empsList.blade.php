@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')


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

				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="col-sm-12 col-md-2">
									<button data-target='#modaldemo8' data-toggle="modal" href="emps/create" class="btn btn-outline-success col-12">موظف جديد 
										<i class="fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover mb-0 text-md-nowrap">
										<thead>
											<tr>
												<th>م</th>
												<th>الاسم</th>
												<th>الوظيفة</th>
												<th>المرتب</th>
												<th>رقم الهاتف</th>
												<th>تارخ الاضافة</th>
											</tr>
										</thead>
										<tbody>

												@php
													$i = 0 ;
												@endphp

											@foreach ($emps as $emp)

												@php
													$i++
												@endphp

											<tr>
												<th scope="row">{{$i}}</th>
												<td>{{$emp->name}}</td>
												<td>{{$emp->postion}}</td>
												<td>-----</td>
												<td>{{$emp->phone_number}}</td>
												<td>{{$emp->created_at}}</td>
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


	<!-- add  -->
		<form action="{{url('emps.create')}}" method="post">
			@csrf
				<div class="modal fade" id="modaldemo8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">اضافه موظفين</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">اسم الموظف</label>
									<input type="text" class="form-control" name="name" id="exampleFormControlInput1" required >
								</div>

								<label class="my-1 mr-2" for="inlineFormCustomSelectPref">الوظيفة</label>
								<select name="postion" id="section_id" class="form-control mb-3" required>
									<option value="" selected disabled> --حدد الوظيفة--</option>
										<option value="موظف مكبس">موظف مكبس</option>
										<option value="مصمم جرافيك">مصمم جرافيك</option>
										<option value="فنيل ">فنيل </option>
										<option value="مشغل مكن طباعه">مشغل مكن طباعه</option>
										<option value="عامل">عامل</option>
								</select>

								<div class="mb-3">
									<label for="exampleFormControlTextarea1" class="form-label">رقم تلفون الموظف</label>
									<input type="text" class="form-control" name="phone_number" id="" required >
								</div>

								{{-- <div class="mb-3">
									<label for="exampleFormControlTextarea1" class="form-label">المرتب</label>
									<input type="text" class="form-control" name="salary" id="" required >
								</div> --}}
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-success" type="submit" >حفظ</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
						</div>
					</div>
				</div>
			</div>
		</form>

			<!-- End add -->
@endsection
@section('js')
@endsection