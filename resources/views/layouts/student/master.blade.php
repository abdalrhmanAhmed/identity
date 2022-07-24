<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		@include('layouts.head')
		<!--- Internal Sweet-Alert css-->
		<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>

	<body class="main-body app sidebar-mini">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		@include('layouts.student.main-sidebar')		
		<!-- main-content -->
		<div class="main-content app-content">
			@include('layouts.student.main-header')			
			<!-- container -->
			<div class="container-fluid">
				@yield('page-header')
				@if(Session::has('success_message'))
				<div class="alert alert-success" role="alert">
					<button aria-label="Close" class="close" data-dismiss="alert" type="button">
						<span aria-hidden="true">×</span>
					</button>
					<strong>مرحباً!</strong> {{session('success_message')}}
				</div>
				@endif
				@if(Session::has('error_message'))
				<div class="alert alert-error" role="alert">
					<button aria-label="Close" class="close" data-dismiss="alert" type="button">
						<span aria-hidden="true">×</span>
					</button>
					<strong>مرحباً!</strong> {{session('error_message')}}
				</div>
				@endif
				@if(Session::has('info_message'))
				<div class="alert alert-info" role="alert">
					<button aria-label="Close" class="close" data-dismiss="alert" type="button">
						<span aria-hidden="true">×</span>
					</button>
					<strong>مرحباً!</strong> {{session('info_message')}}
				</div>
				@endif
				@if(Session::has('warning_message'))
				<div class="alert alert-warning" role="alert">
					<button aria-label="Close" class="close" data-dismiss="alert" type="button">
						<span aria-hidden="true">×</span>
					</button>
					<strong>مرحباً!</strong> {{session('warning_message')}}
				</div>
				@endif
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<button aria-label="Close" class="close" data-dismiss="alert" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong>خطأ :</strong>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				@yield('content')
				@include('layouts.sidebar')
				@include('layouts.models')
            	@include('layouts.footer')
				@include('layouts.footer-scripts')
		</div>
		<!--Internal  Sweet-Alert js-->
		<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
		<!-- Sweet-alert js  -->
		<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>
		@include('sweetalert::alert')
		<!--Internal Counters -->
		<script src="{{URL::asset('assets/plugins/counters/waypoints.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/counters/counterup.min.js')}}"></script>
		<!--Internal Time Counter -->
		<script src="{{URL::asset('assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/counters/counter.js')}}"></script>
	</body>
</html>