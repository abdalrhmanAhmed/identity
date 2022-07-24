@if (Auth::user()->hasRole('Admin'))	
@extends('layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="left-content">
		<div>
      <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحباً بك السيد / <span class="text-primary">{{Auth::user()->name}}</span></h2>
      <p class="mg-b-0">نظام التسجيل الإلكتروني | نظام التحكم الشامل  </p>
    </div>
</div>
<div class="main-dashboard-header-right">
	<div>
		<label class="tx-13">التقييم العام</label>
		<div class="main-star">
			<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
		</div>
    </div>
    <div>
		<label class="tx-13">عدد المستخدمين</label>
		<h5>{{$users->count()}}</h5>
    </div>
</div>
</div>
<!-- /breadcrumb -->
@endsection
@section('content')
<!-- row -->
<!-- row closed -->
<div class="container">
	<div class="row row-sm">
		<div class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
			<div class="card text-center">
				<div class="card-body ">
					<div class="feature widget-2 text-center mt-0 mb-3">
						<i class="ti-bar-chart project bg-primary-transparent mx-auto text-primary "></i>
					</div>
					<h6 class="mb-1 text-muted">المستخدمين </h6>
					<h2 class="counter mb-0 text-black">{{$users->count()}}</h2>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
			<div class="card text-center">
				<div class="card-body ">
				<div class="feature widget-2 text-center mt-0 mb-3">
					<i class="ti-pie-chart project bg-pink-transparent mx-auto text-pink "></i>
				</div>
				<h6 class="mb-1 text-muted">عدد الكليات</h6>
				<h2 class="counter mb-0 text-black">{{$facs->count()}}</h2>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
		<div class="card text-center">
			<div class="card-body">
				<div class="feature widget-2 text-center mt-0 mb-3">
					<i class="ti-pulse  project bg-teal-transparent mx-auto text-teal "></i>
				</div>
				<h6 class="mb-1 text-muted">عدد الأقسام</h6>
				<h2 class="counter mb-0 text-black">{{$depts->count()}}</h2>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
		<div class="card text-center">
			<div class="card-body ">
				<div class="feature widget-2 text-center mt-0 mb-3">
					<i class="ti-stats-up project bg-success-transparent mx-auto text-success "></i>
				</div>
				<h6 class="mb-1 text-muted">عدد الصلاحيات</h6>
				<h2 class="counter mb-0 text-black">{{$roles->count()}}</h2>
			</div>
		</div>
	</div>
</div>
<!-- row opened -->
<div class="row row-sm">
	<div class="col-md-12 col-lg-12 col-xl-12">
		<div class="card card-primary">
			<div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
				<div class="d-flex justify-content-between">
					<h4 class="card-title mb-0">متابعة و مراقبة النظام</h4>
					<i class="mdi mdi-dots-horizontal text-gray"></i>
				</div>
				<p class="tx-12 text-muted mb-0">الوصول السريع لي بعض خصائص التحكم </p>
			</div>
			<div class="card-body">
				<div class="card card-table-two">
					<div class="d-flex justify-content-between">
						<h4 class="card-title mb-1">مراقبة حركات مستخدمين النظام</h4>
						<i class="mdi mdi-dots-horizontal text-gray"></i>
					</div>
					<span class="tx-12 tx-muted mb-3 ">آخر العمليات علي النظام </span>
					<div class="table-responsive country-table">
						<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
							<thead>
								<tr>
									<th class="wd-lg-25p">المستخدم</th>
									<th class="wd-lg-25p tx-right">نوع العملية</th>
									<th class="wd-lg-25p tx-right">التعليق / التوضيح</th>
									<th class="wd-lg-25p tx-right">التاريخ</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($events as $event)
								<tr>
									<td class="tx-right tx-medium tx-inverse">{{ $event->user->name }}</td>
									<td class="tx-right tx-medium tx-inverse">{{ $event->event }}</td>
									<td class="tx-right tx-medium tx-inverse">{{ $event->tags }}</td>
									<td class="tx-right tx-medium tx-inverse">{{ $event->created_at }}</td>
									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
	</div>
</div>
<!-- row closed -->
<!-- Container closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
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
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Counters -->
<script src="{{URL::asset('assets/plugins/counters/waypoints.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/counters/counterup.min.js')}}"></script>
<!--Internal Time Counter -->
<script src="{{URL::asset('assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
<script src="{{URL::asset('assets/plugins/counters/counter.js')}}"></script>
@endsection
@endif