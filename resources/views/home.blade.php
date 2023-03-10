@extends('layouts.master')
@section('css')

@section('title')
ريتاج  تكس - الرئيسية
@endsection
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحباً بعودتك <b>{{Auth::User()->name}}</b></h2>
						  <p class="mg-b-0"></p>
						</div>
					</div>
					<div class="main-dashboard-header-right">
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
					</div>
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
										<h2 class="counter mb-0 text-white">2000</h2>
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
										<h5 class="tx-13 tx-white-8 mb-3">Total Sales</h5>
										<h2 class="counter mb-0 text-white">1765</h2>
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
										<h5 class="tx-13 tx-white-8 mb-3">Total Projects</h5>
										<h2 class="counter mb-0 text-white">846</h2>
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
										<h5 class="tx-13 tx-white-8 mb-3">Happy Customers</h5>
										<h2 class="counter mb-0 text-white">7253</h2>
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
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column">
                                            <i class="fa fa-trophy tx-30 text-white mb-2"></i>
                                            <p class="text-white mt-2">المصممين</p>


											<div>1</div>
											<div>1</div>
											<div>1</div>

											<div class="awards text-center row">
												<div class="sec col-1 m-1 ">2</div>
												<span class="sec_num">1260</span>
												<div class="st col-1 m-1">1</div>
												<span class="st_num">1260</span>
												<div class="tre col-1 m-1">3</div>
												<span class="tre_num">1260</span>
											</div>
	

                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="si si-social-google tx-30 text-white mb-2"></i>
                                            <p class="text-white mt-2">24th July</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">60% Off</span><br> on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- Joseph	Vaughan</i>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                           <i class="si si-social-twitter tx-30 text-white mb-2"></i>
                                            <p class="text-white mt-2">9th Aug</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">90% Off</span><br> on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- Alan	Hemmings</i>
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
                                        <div class="carousel-item active flex-column">
                                            <i class="si si-social-facebook tx-30 text-white mb-2"></i>
                                            <p class="text-white mt-2">11th June</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">30% Off</span><br>on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- Alan Hemmings</i>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                           <i class="si si-social-google tx-30 text-white mb-2"></i>
                                            <p class="text-white mt-2">21st July</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">70% Off</span><br> on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- Eric Lee</i>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                           <i class="si si-social-twitter tx-30 text-white mb-2"></i>
                                            <p class="text-white mt-2">12th Aug</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">80% Off</span><br> on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- Eric Lee</i>
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
                                        <div class="carousel-item active flex-column">
                                            <i class="si si-social-facebook tx-30 text-white mb-2"></i>
                                            <p class="text-white mt-2">25th June</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">30% Off</span><br>on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- Eric Lee</i>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="si si-social-google tx-30 text-white mb-2"></i>
                                            <p class="text-white mt-2">6th July</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">70% Off</span><br> on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- Eric Lee</i>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="si si-social-twitter tx-30 text-white mb-2"></i>
                                            <p class="text-white mt-2">7th Aug</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">80% Off</span><br> on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- Eric Lee</i>
                                            </div>
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
									<div class="col-md-12 col-xl-4">
										<div class="card">
											<div class="card-body">
												<div class="d-flex justify-content-between">
													<h4 class="card-title">Active Projects</h4>
													<i class="mdi mdi-dots-vertical"></i>
												</div>
												<p class="card-description mb-1">What're people doing right now</p>
												<div class="list d-flex align-items-center border-bottom py-3">
													<div class="avatar brround d-block cover-image" data-image-src="{{URL::asset('assets/img/faces/5.jpg')}}">
														<span class="avatar-status bg-green"></span>
													</div>
													<div class="wrapper w-100 mr-3">
														<p class="mb-0">
														<b>Lilly </b>posted in Website</p>
														<div class="d-sm-flex justify-content-between align-items-center">
															<div class="d-flex align-items-center">
																<i class="mdi mdi-clock text-muted ml-1"></i>
																<p class="mb-0">Awesome websites!</p>
															</div>
															<small class="text-muted mr-auto">2 hours ago</small>
														</div>
													</div>
												</div>
												<div class="list d-flex align-items-center border-bottom py-3">
													<div class="avatar brround d-block cover-image" data-image-src="{{URL::asset('assets/img/faces/1.jpg')}}">
														<span class="avatar-status bg-green"></span>
													</div>
													<div class="wrapper w-100 mr-3">
														<p class="mb-0">
														<b>Thomos</b>posted in Material</p>
														<div class="d-sm-flex justify-content-between align-items-center">
															<div class="d-flex align-items-center">
																<i class="mdi mdi-clock text-muted ml-1"></i>
																<p class="mb-0">Awesome websites!</p>
															</div>
															<small class="text-muted mr-auto">3 hours ago</small>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
								<!-- /row -->
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
@endsection
