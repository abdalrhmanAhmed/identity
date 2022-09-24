@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الملفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إنشاء بيانات ملف جديد</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
		@include('notifications.notify')
		@include('errors.exceptions')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{$profile->ticket->client_name}}</h5>
												<p class="main-profile-name-text">{{$profile->track_id}}</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 col mb20">
												<h5>الرقم البنكي</h5>
												<h6 class="text-small text-muted mb-0">{{ $clients->bank_number ?? '000' }}</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>رقم المرور</h5>
												<h6 class="text-small text-muted mb-0">{{ $clients->trafic_number ?? '000' }}</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>الرقم الضريبي</h5>
												<h6 class="text-small text-muted mb-0">{{ $clients->dapt_number ?? '000' }}</h6>
											</div>
										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">البيانات الحيوية</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="fa fa-home"></i>
												</div>
												<div class="media-body">
													<p>بيانات الحمض النووي</p> 
													@if($clients != null)
													<form action="{{route('dna')}}" method="POST" enctype="multipart/form-data">
														@csrf
															<div class="form-group col-md-7">
																<input type="file" name="select_file" class="form-control" id="basic-url" aria-describedby="basic-addon3">
															</div>
															<div class="col-md-1 col-sm-3 colxs-12">
																<input type="submit" value="إرسال" class="btn btn-success">
															</div>
													</form>
													@endif
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="fa fa-home"></i>
												</div>
												<div class="media-body">
													<p>بصمات الأصابع</p> 
													@if($clients != null)
													<form action="post" method="" enctype="multipart/form-data">
														@csrf														
														<input type="file" name="finger_print" class="form-control" id="">
														<br>
														<input type="submit"  class="btn btn-warning" value="رفع">
													</form>
													@endif
												</div>
											</div>
										</div>
										<hr class="mg-y-30">
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										@if(!$profileData)
											<li class="active">
												<a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">البيانات الشخصية</span> </a>
											</li>
										@endif
										@if($profile && !$id_information)
											<li class="">
												<a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">بيانات الهوية</span> </a>
											</li>
										@endif
										@if($profile && $id_information && !$disability_information)
											<li class="">
												<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">بيانات الإعاقة</span> </a>
											</li>
										@endif
										<li class="">
											<a href="#wins" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">بيانات الشهود</span> </a>
										</li>
										<li class="">
											<a href="#merid" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">بيانات الزواج</span> </a>
										</li>
									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
									@if(!$profileData)
										@include('admin.record.profiles.personal_information')
									@endif
									@include('admin.record.profiles.id_information')
									@include('admin.record.profiles.disability_information')
									@include('admin.record.profiles.witness_information')
									@include('admin.record.profiles.marry_information')
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

<script>
	$(document).ready(function() {
		$('select[name="witness_number_one"]').on('keyup', function() {
			console.log('hi');
			var witness_one_id = $(this).val();
			if (witness_one_id) {
				$.ajax({
					url: "{{ URL::to('get_witness') }}/" + witness_one_id,
					type: "GET",
					dataType: "json",
					success: function(data) {
						$('select[name="witness_name_one"]').empty();
						$.each(data, function(key, value) {
							$('select[name="witness_name_one"]').append(value);
						});
					},
				});
			} else {
				console.log('AJAX load did not work');
			}
		});
	});

</script>
@endsection