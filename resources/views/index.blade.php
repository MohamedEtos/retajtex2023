@extends('layouts.master')
@section('css')

@section('title')
ريتاج  تكس - الرئيسية
@endsection
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<style>
    .ttt{
            overflow: hidden;
    display: -webkit-box;
   -webkit-line-clamp: 5; /* Limit to 3 lines */
   -webkit-box-orient: vertical;
    }
</style>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mb-4 mg-b-1 mg-b-lg-1">مرحباً بعودتك <b>{{Auth::User()->name}}</b></h2>
						  <p class="mg-b-0"></p>
						</div>
					</div>
					{{-- <div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">Customer Ratings</label>
							<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
							</div>
						</div>
						<div>
							<label class="tx-13">Online Sales</label>
							<h5>563,275</h5>
						</div>
						<div>
							<label class="tx-13">Offline Sales</label>
							<h5>783,675</h5>
						</div>
					</div> --}}
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-primary-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon">
										<i class="icon icon-people"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">العملاء</h5>
										<h2 class="counter mb-0 text-white text-left">{{$cust_counter}}</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-danger-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon text-warning">
										<i class="icon icon-rocket"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">اجمالي الامتار المطبوعه</h5>
									<h2 class="counter ttt mb-0 text-white text-left">{{$total_printed}}</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-success-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon text-primary">
										<i class="icon icon-docs"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">الامتار اليومية</h5>
										<h2 class="counter mb-0 text-white text-left">{{$printed_today}}</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card  bg-warning-gradient">
							<div class="card-body">
								<div class="counter-status d-flex md-mb-0">
									<div class="counter-icon text-success">
										<i class="icon icon-emotsmile"></i>
									</div>
									<div class="mr-auto">
										<h5 class="tx-13 tx-white-8 mb-3">اذونات التشغيل المتاحه</h5>
										<h2 class="counter mb-0 text-white text-left">{{$permossionPrinted}}</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->


				<!-- row -->
				<div class="row">
                    <!-- col -->
                    <div class="col-lg-4 col-md-4">
                        <div class="card bg-primary-gradient">
                            <div class="card-body">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner carousel_height carousel_height">
                                        <div class="carousel-item active flex-column">
                                            {{-- <i class="fa fa-trophy tx-30 text-white mb-2"></i> --}}
                                            <p class="text-white mt-2 h4">المصممين</p>
												<div class="card-body">
													<div class="row text-light">
														<div class="col text-center">
															<label class="tx-12">محمد محروس</label>
															<p class="font-weight-bold tx-20">{{$mohamed_meter}}</p>
														</div><!-- col -->
														<div class="col border-right text-center">
															<label class="tx-12">مريم محمد</label>
															<p class="font-weight-bold tx-20">{{$mariam_meter}}</p>
														</div><!-- col -->
														<div class="col border-right text-center">
															<label class="tx-12">ايه ايمن</label>
															<p class="font-weight-bold tx-20">{{$aya_meter}}</p>
														</div><!-- col -->
													</div><!-- row -->

												</div>
	

                                        </div>
                                        <div class="carousel-item flex-column carousel_height ">
                                            <p class="text-white mt-2 h4">العملاء لكل مصمم</p>
												<div class="card-body">
													<div class="row text-light">
														<div class="col text-center">
															<label class="tx-12"> محروس</label>
															<p class="font-weight-bold tx-20">{{$mohamed_cust}}</p>
														</div><!-- col -->
														<div class="col border-right text-center">
															<label class="tx-12">مريم محمد</label>
															<p class="font-weight-bold tx-20">{{$mariam_cust}}</p>
														</div><!-- col -->
														<div class="col border-right text-center">
															<label class="tx-12">ايه ايمن</label>
															<p class="font-weight-bold tx-20">{{$aya_cust}}</p>
														</div><!-- col -->
													</div><!-- row -->

												</div>
                                        </div>
                                        <div class="carousel-item flex-column carousel_height">
                                            <p class="text-white mt-2 h4">التصميمات</p>
												<div class="card-body">
													<div class="row text-light">
														<div class="col text-center">
															<label class="tx-12">محمد محروس</label>
															<p class="font-weight-bold tx-20">{{$mohamed_des}}</p>
														</div><!-- col -->
														<div class="col border-right text-center">
															<label class="tx-12">مريم محمد</label>
															<p class="font-weight-bold tx-20">{{$mariam_des}}</p>
														</div><!-- col -->
														<div class="col border-right text-center">
															<label class="tx-12">ايه ايمن</label>
															<p class="font-weight-bold tx-20">{{$aya_des}}</p>
														</div><!-- col -->
													</div><!-- row -->

												</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- col -->
                    <div class="col-lg-4 col-md-4">
                        <div class="card bg-danger-gradient">
                            <div class="card-body">
                                <div id="myCarousel0" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column carousel_height">
											<div class="row">
												<div class="col-8">
													<p class="text-white mt-2 h5">اذونات التشغيل المتاحه</p>
												</div>
												<div class="col-4 text-left">
													<img class="col-12" src="{{asset('assets/img/printers/fedar-w.png')}}" alt="">
												</div>
											</div>

											{{-- Get fedar data  --}}

											@forelse ($fedar_order as $fedar_orders)

												<div class="row text-light mt-2">
													<div class="col-4">{{$fedar_orders->cust_name}}</div>
													<div class="col-4">{{$fedar_orders->total_meter}} <span>م</span></div>
													<div class="col-4">{{{$fedar_orders->designer}}}</div>
												</div>

											@empty

												<div class="row text-light mt-5 text-center">
													<div class="col-12 h5">لا يوجد اذونات لماكينه الفيدار</div>
												</div>

											@endforelse



											{{-- Get fedar data closed  --}}

                                        </div>
                                        <div class="carousel-item flex-column carousel_height">
											<div class="row">
												<div class="col-8">
													<p class="text-white mt-2 h5">اذونات التشغيل المتاحه</p>
												</div>
												<div class="col-4 text-left">
													<img class="col-7" src="{{asset('assets/img/printers/dgi-w.png')}}" alt="">
												</div>
											</div>

											{{-- Get dgi data   --}}

											@forelse ($dgi_order as $dgi_orders)
											<div class="row text-light mt-2">
												<div class="col-4">{{$dgi_orders->cust_name}}</div>
												<div class="col-4">{{$dgi_orders->total_meter}} <span>م</span></div>
												<div class="col-4">{{{$dgi_orders->designer}}}</div>
											</div>
											@empty
											<div class="row text-light mt-5 text-center">
												<div class="col-12 h5">لا يوجد اذونات لماكينه دي جي اي</div>
											</div>
											@endforelse


											{{-- Get dgi data closed  --}}

											
                                        </div>
                                        <div class="carousel-item flex-column carousel_height">
                                            <div class="text-white m-t-20">
												<div class="row">
													<div class="col-8">
														<p class="text-white mt-2 h5">اذونات التشغيل المتاحه</p>
													</div>
													<div class="col-4 text-left">
														<img class="col-12" src="{{asset('assets/img/printers/sky-w.png')}}" alt="">
													</div>
												</div>

												{{-- Get fedar data  --}}

												@forelse ($sky_order as $sky_order)

													<div class="row text-light mt-2">
														<div class="col-4">{{$sky_order->cust_name}}</div>
														<div class="col-4">{{$sky_order->total_meter}} <span>م</span></div>
														<div class="col-4">{{{$sky_order->designer}}}</div>
													</div>

												@empty

													<div class="row text-light mt-5 text-center">
														<div class="col-12 h5">لا يوجد اذونات لماكينه سكاي</div>
													</div>

												@endforelse
	
												{{-- Get fedar data closed  --}}
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- col -->
                    <div class="col-lg-4 col-md-4">
                        <div class="card bg-purple-gradient">
                            <div class="card-body">
                                <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column carousel_height">
                                            <p class="text-white mt-2 mb-3 h5">صورة اخر اوردر</p>
											<div class=" last_orders_div mt-2 col-12 height-30 position-relative overflow-hidden">

												@isset($last_order)
												<a href="{{ url('viewfile') }}/{{ $last_order->cust_name  }}/{{ $last_order->images  }}" target="_blacnk">
													<img src="{{asset('Attachments/'.$last_order->cust_name.'/'.$last_order->images)}}"
													alt="صورة">
												</a>											
												@endisset
												
												@if($last_order->images == 'updated')
												<div class="row text-light mt-4 text-center">
													<div class="col-12 h3">لا يوجد صورة</div>
												</div>
												@endempty

											</div>
                                        </div>

                                        <div class="carousel-item flex-column carousel_height">
											<p class="text-white mt-2 mb-3 h5">بيانات اخر اوردر</p>
                                            <p class="text-white mt-2">{{$last_order->cust_name ?? ''}}</p>
                                            <h3 class="text-white font-light">عدد الامتار : <span class="font-bold">{{$last_order->total_meter ?? ''}}</span><br>  </h3>
                                            <div class="text-white m-t-20">
											<i>
												@if ($last_order->printer == 'fedar')
													 {{'فيدار'}}
													 <img style="width: 90px" class="mr-3" src="{{asset('assets/img/printers/fedar-w.png')}}" alt="صورة">

													 {{-- <a href="{{ url('viewfile') }}/{{ $sublimationn->cust_name }}/{{ $sublimationn->images }}" target="_blacnk">
														<img src="{{asset('Attachments/'.$sublimationn->cust_name.'/'.$sublimationn->images)}}"
															style="width: 50px; height:50px" alt=""></a> --}}
												@endif
												@if ($last_order->printer == 'dgi')
													 {{'دي جي اي'}}
													 <img style="width: 45px" class="mr-3" src="{{asset('assets/img/printers/dgi-w.png')}}" alt="صورة">

												@endif
												@if ($last_order->printer == 'sky')
													سكاي
													 <img style="width: 110px" class="mr-3" src="{{asset('assets/img/printers/sky-w.png')}}" alt="صورة">

												@endif
														
											</i>
                                            </div>
                                        </div>

                                        <div class="carousel-item flex-column carousel_height">
                                            <p class="text-white mt-2 h4"> اجمالي امتار <b>  : {{$last_order->cust_name ?? ""}}</b></p>
                                            <h2 class="text-white font-light h1 mt-4"> م <span class="font-bold">{{$last_customer_meter }}</span><br></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				<!-- row closed -->


				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-4 col-xl-4">
						<div class="card">
							<div class="card-body">
								<div class="d-flex justify-content-between">
									<h4 class="card-title">التعليقات </h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<p class="card-description mb-1"></p>

								<form action="{{url('commints.store')}}" method="post">
									@csrf
									<div class="input-group mb-3">
										<button class="btn btn-outline-success" type="submit">حفظ</button>
										<input type="text" name="commints" class="form-control" placeholder="اترك تعليقك هنا " aria-label="" aria-describedby="basic-addon1">
									</div>
								</form>



									@forelse ($commints as $commint)
									<div class="list d-flex align-items-center border-bottom py-3">
										<div class="avatar brround d-block cover-image" data-image-src="{{URL::asset('avatars')}}/{{$commint->users_ship->avatar}}">
											<span class="avatar-status bg-green"></span>
										</div>
										<div class="wrapper w-100 mr-3">
										<p class="mb-0"><b></b>{{$commint->users_ship->name}}</p>
										<div class="d-sm-flex justify-content-between align-items-center">
											<div class="d-flex align-items-center">
												<i class="mdi mdi-clock text-muted ml-1"></i>
												<p class="mb-0">{{$commint->commint}}</p>
											</div>
											<small class="text-muted mr-auto">{{$commint->created_at}}</small>
										</div>
									</div>
								</div>
									@empty
										<h4 class="text-center mt-3">لا يوجد تعليقات</h4>
									@endforelse

							</div>
						</div>
					</div>
					<div class="col-lg-8 col-md-8">
						<div class="card custom-card">
							<div class="card-body ht-100p">
								<div>
									<h3 class=" mb-4 h2">اخر الاعمال</h3>
								</div>
								<div id="basicSlider">
									<div class="MS-content mt-1">

										@forelse ($all_images as $images)

											<div class="item">
												<a href="{{ url('viewfile') }}/{{ $images->cust_name  }}/{{ $images->images  }}" target="_blank"> <img  style="height: 190px; width: 290px" src="{{URL::asset('Attachments')}}/{{$images->cust_name}}/{{$images->images}}" alt="" /> </a>
											</div>

										@empty

											<div class="item">
												<a href="#" target="_blank"> <img src="{{URL::asset('assets/img/photos/4.jpg')}}" alt="" /> </a>
											</div>
											<div class="item">
												<a href="#" target="_blank"> <img src="{{URL::asset('assets/img/photos/4.jpg')}}" alt="" /> </a>
											</div>
											<div class="item">
												<a href="#" target="_blank"> <img src="{{URL::asset('assets/img/photos/4.jpg')}}" alt="" /> </a>
											</div>
											<div class="item">
												<a href="#" target="_blank"> <img src="{{URL::asset('assets/img/photos/4.jpg')}}" alt="" /> </a>
											</div>
											<div class="item">
												<a href="#" target="_blank"> <img src="{{URL::asset('assets/img/photos/4.jpg')}}" alt="" /> </a>
											</div>
											<div class="item">
												<a href="#" target="_blank"> <img src="{{URL::asset('assets/img/photos/4.jpg')}}" alt="" /> </a>
											</div>
											<div class="item">
												<a href="#" target="_blank"> <img src="{{URL::asset('assets/img/photos/4.jpg')}}" alt="" /> </a>
											</div>

										@endforelse

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row closed -->

				<!-- row -->

				<!-- /row  closed-->






			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>

<!--Internal Counters -->
<script src="{{URL::asset('assets/plugins/counters/waypoints.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/counters/counterup.min.js')}}"></script>
<!--Internal Time Counter -->
<script src="{{URL::asset('assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
<script src="{{URL::asset('assets/plugins/counters/counter.js')}}"></script>
<!-- Internal Owl Carousel js-->
<script src="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.js')}}"></script>
<!---Internal  Multislider js-->
<script src="{{URL::asset('assets/plugins/multislider/multislider.js')}}"></script>
<script src="{{URL::asset('assets/js/carousel.js')}}"></script>
@endsection
