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
												<h6 class="text-small text-muted mb-0">0000</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>رقم المرور</h5>
												<h6 class="text-small text-muted mb-0">0000</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>الرقم الضريبي</h5>
												<h6 class="text-small text-muted mb-0">0000</h6>
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
													<span>بيانات الحمض النووي</span> 
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="fa fa-home"></i>
												</div>
												<div class="media-body">
													<span>بصمات الأصابع</span> 
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
										<li class="active">
											<a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">البيانات الشخصية</span> </a>
										</li>
										<li class="">
											<a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">بيانات الهوية</span> </a>
										</li>
										<li class="">
											<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">بيانات الإعاقة</span> </a>
										</li>
										<li class="">
											<a href="#wins" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">بيانات الشهود</span> </a>
										</li>
										<li class="">
											<a href="#merid" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">بيانات الزواج</span> </a>
										</li>
									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
									<div class="tab-pane active" id="home">
										<h3>البيانات الشخصية</h3>
										<br>
										<section>
											<form action="{{route('Client.store')}}" method="POST" >
												{{ csrf_field() }}
												<h5>الإسم رباعي بالعربي</h5>
												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label> الإسم الأول: <span class="tx-danger">*</span></label>
														<input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
															name="fname_ar" required="" type="text">
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label>   الإسم الثاني: <span class="tx-danger">*</span></label>
														<input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
															name="sname_ar" required="" type="text">
													</div>
												</div>
												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label> الإسم الثالث: <span class="tx-danger">*</span></label>
														<input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
															name="tname_ar" required="" type="text">
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label>   الإسم الرابع: <span class="tx-danger">*</span></label>
														<input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
															name="forthname_ar" required="" type="text">
													</div>
												</div>
												<h5>الإسم رباعي بالإنجليزي</h5>
												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label> الإسم الأول: <span class="tx-danger">*</span></label>
														<input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
															name="fname_en" required="" type="text">
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label>   الإسم الثاني: <span class="tx-danger">*</span></label>
														<input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
															name="sname_en" required="" type="text">
													</div>
												</div>
												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label> الإسم الثالث: <span class="tx-danger">*</span></label>
														<input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
															name="tname_en" required="" type="text">
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label>   الإسم الرابع: <span class="tx-danger">*</span></label>
														<input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
															name="forthname_en" required="" type="text">
													</div>
												</div>


												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">الجنس</label>
														<select name="gender" class="form-control required" searchable="Search here..">
															<option value="" disabled selected>ذكر</option>
															<option value="1">انثى</option>
														</select>
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">تاريخ الميلاد</label>
														<input name=parth_date type="date" class="form-control required" >
													</div>
												</div>

												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">دولة الميلاد</label>
														<select name="contry_parth" class="form-control required" searchable="Search here..">
															<option value="" disabled selected>دولة الميلاد</option>
															@foreach($parthPalces as $value)
																<option value="{{ $value->id }}">{{ $value->c_name }}</option>
															@endforeach
														</select>
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label name="fathr_id" class="form-label">الرقم الوطني للأب</label>
														<input type="number" class="form-control required" placeholder="الرقم الوطني للأب">
													</div>
												</div>

												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">رقم شهادة الميلاد</label>
														<input name=barth_id type="number" class="form-control required" placeholder="رقم شهادة الميلاد">
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">فصيلة الدم</label>
														<select name="blood_type" class="form-control required" searchable="Search here..">
															<option value="" disabled selected>فصيلة الدم</option>
															@foreach ($bloodTypes as $bloodType)
																<option value="{{$bloodType->id}}">{{$bloodType->name}}</option>
															@endforeach
														</select>
													</div>
												</div>


												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">الحالة الإجتماعيه</label>
														<select naem="setuation_type"class="form-control required" searchable="Search here..">
															<option value="" disabled selected>الحاله الإجتماعيه</option>
															@foreach ($socialSituations as $socialSituation)
															<option value="{{$socialSituation->id}}">{{$socialSituation->s_name}}</option>
														@endforeach
														</select>
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">المهنه</label>
														<select name="profistional" class="form-control required" searchable="Search here..">
															<option value="" disabled selected>...</option>
															@foreach ($professionss as $professions)
															<option value="{{$professions->id}}">{{$professions->name}}</option>
														@endforeach
														</select>
													</div>
												</div>


												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">التصنيف المهني</label>
														<select name="fild_job" class="form-control required" searchable="Search here..">
															<option value="" disabled selected>غير مصنف</option>
															@foreach ($failedjobs as $failedjob)
															<option value="{{$failedjob->id}}">{{$failedjob->name}}</option>
														@endforeach
														</select>
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">المؤهل العلمي</label>
														<select name="education" class="form-control required" searchable="Search here..">
															<option value="" disabled selected>لايوجد</option>
															@foreach ($educations as $education)
															<option value="{{$education->id}}">{{$education->name}}</option>
															@endforeach
														</select>
													</div>
												</div>


												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">رقم الهاتف</label>
														<input name="phone" type="number" class="form-control required" placeholder="رقم الهاتف">
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">البريد الإلكتروني</label>
														<input name="email" type="email" class="form-control required" placeholder="البريد الإلكتروني">
													</div>
												</div>


												<div class="row mg-b-20">
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">الرقم الوطني للأم</label>
														<input name="mather_id" type="number" class="form-control required" placeholder="الرقم الوطني للأم">
													</div>
							
													<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
														<label class="form-label">اسم الأم رباعي</label>
														<input  name="mother_name" type="text" class="form-control required" placeholder="اسم الأم رباعي">
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 text-rhgit">
													<button class="btn btn-main-primary pd-x-20" type="submit">حفظ</button>
												</div>
											</form>
										</section>
									</div>
									<div class="tab-pane" id="profile">
										<h3>بيانات الميلاد و الجنسية و العمل</h3>
										<br>
									<section>
											<form action="{{route('Client.store')}}" method="POST" >
												{{ csrf_field() }}
												<div class="container form-group">
												<h5>مكان الميلاد</h5>
												<div class="row">
												  <div class="col">
													<div class="control-group form-group mb-0">
														<label class="form-label">الولاية</label>
														<select class="form-control required" searchable="Search here.." name="state">
															<option value="" disabled selected>غير مصنف</option>
															<option value="1">ولاية نهر النيل</option>
															<option value="2">ولاية البحر الأحمر</option>
														</select>
													</div>
													<br>
													<div class="control-group form-group">
														<label class="form-label">الوحدة الإداريه</label>
														<select class="form-control required" searchable="Search here.." name="admin_unit">
															<option value="" disabled selected>لايوجد</option>
															<option value="1">وحدة إداريه شمال</option>
															<option value="1">وحدة إداريه وسط</option>
															<option value="1">وحدة إداريه جنوب</option>
														  </select>
													</div>
												  </div>
												  <div class="col">
													<div class="control-group form-group">
														<label class="form-label">المحليه</label>
														<select class="form-control required" searchable="Search here.." name="locale">
															<option value="" disabled selected>لايوجد</option>
															<option value="1">محلية عطبرة</option>
															<option value="1">محلية الخرطوم</option>
															<option value="1">محلية الدامر</option>
															<option value="1">محلية شندي</option>
														  </select>
													</div>
													<br>
													<div class="control-group form-group">
														<label class="form-label">الإدارة الشعبيه</label>
														<select class="form-control required" searchable="Search here.." name="pepuler_unit">
															<option value="" disabled selected>لايوجد</option>
															<option value="1">المزاد شمال</option>
															<option value="1">المزاد جنوب</option>
															<option value="1">الشمالي</option>
															<option value="1">الدخله</option>
														  </select>
													</div>
													<br>
												  </div>
												</div>
												{{-- مكاااااااااااااااااااااااااااان العمل --}}
												<h5>مكان العمل</h5>
												<div class="row">
												  <div class="col">
													<div class="control-group form-group">
														<label class="form-label">الولاية</label>
														<select class="form-control required" searchable="Search here.." name="worck_state">
															<option value="" disabled selected>لايوجد</option>
															<option value="1">ولاية نهر النيل</option>
															<option value="2">ولاية الخرطوم</option>
															<option value="3">ولاية النيل الأزرق</option>
														  </select>
													</div>
													<br>
													<div class="control-group form-group">
														<label class="form-label">الوحدة الإداريه</label>
														<select class="form-control required" searchable="Search here.." name="worck_admin_unite">
															<option value="" disabled selected>لايوجد</option>
															<option value="1">وحدة إداريه شمال</option>
															<option value="1">وحدة إداريه وسط</option>
															<option value="1">وحدة إداريه جنوب</option>
														  </select>
													</div>
												  </div>
												  <div class="col">
													<div class="control-group form-group">
														<label class="form-label">المحليه</label>
														<select class="form-control required" searchable="Search here.." name="worck_state_unit">
															<option value="" disabled selected>لايوجد</option>
															<option value="1">محلية عطبرة</option>
															<option value="1">محلية الخرطوم</option>
															<option value="1">محلية الدامر</option>
															<option value="1">محلية شندي</option>
														  </select>
													</div>
													<br>
													<div class="control-group form-group">
														<label class="form-label">الإدارة الشعبيه</label>
														<select class="form-control required" searchable="Search here.." name="worck_pepuler_ubit">
															<option value="" disabled selected>لايوجد</option>
															<option value="1">المزاد شمال</option>
															<option value="1">المزاد جنوب</option>
															<option value="1">الشمالي</option>
															<option value="1">الدخله</option>
														  </select>
													</div>
												  </div>
												</div>
												<div class="control-group form-group">
													<label class="form-label">مكان العمل</label>
													<input type="text" class="form-control required" placeholder="مكان العمل" name="worck_place">
												</div>
												{{-- بيانااااااااااااااااااااااااااااات الجنسيييييييييييييية --}}
												<br>
													  <h5>بيانات الجنسية</h5>
												<div class="row">
												  <div class="col">
													<div class="control-group form-group">
													  <div class="row">
														<div class="col">
														  <div class="control-group form-group">
															  <label class="form-label">نوع الجنسية</label>
															  <select class="form-control required" searchable="Search here..">
																  <option value="" disabled selected>لايوجد</option>
																  <option value="1">بالميلاد</option>
																  <option value="3">بالتجنس</option>
																</select>
														  </div>
														  <br>
														  <div class="control-group form-group">
															  <label class="form-label">الديانة</label>
															  <select class="form-control required" searchable="Search here..">
																  <option value="" disabled selected>لايوجد</option>
																  <option value="1">مسلم</option>
																  <option value="1">مسيحي</option>
																</select>
														  </div>
														  <br>
														  <div class="control-group form-group">
															  <label class="form-label">لغة الأم</label>
															  <select class="form-control required" searchable="Search here..">
																  <option value="" disabled selected>لايوجد</option>
																  <option value="1">العربية</option>
																</select>
														  <br>
														  </div>
														  <div class="control-group form-group">
															<label class="form-label">اسم الأم قبل التجنس</label>
															<input type="text" class="form-control required" placeholder="اسم الأم ">
														</div>
	
														</div>
														<div class="col">
														  <div class="control-group form-group">
															<label class="form-label">رقم التجنس</label>
															<input type="number" class="form-control required" placeholder="رقم التجنس ">
	
														</div>
														  <br>
														  <div class="control-group form-group">
															<label class="form-label">رقم الجنسية القديم</label>
															<input type="number" class="form-control required" placeholder="رقم الجنسية القديم">
														</div>
														<br>
														<div class="control-group form-group">
															<label class="form-label">الاسم قبل التجنس</label>
															<input type="text" class="form-control required" placeholder="الأسم قبل التجنس">
														</div>
														<br>
														<div class="control-group form-group">
															<label class="form-label">الاسم الأب قبل التجنس</label>
															<input type="text" class="form-control required" placeholder="اسم الأب">
														</div>
														<div class="control-group form-group">
													<label class="form-label">مكان العمل</label>
													<input type="text" class="form-control required" placeholder="مكان العمل">
												</div>
														<br>
	
													</div>
												  </div>
	
											  </div>
											  <div class="col-xs-12 col-sm-12 col-md-12 text-rhgit">
												<button class="btn btn-main-primary pd-x-20" type="submit">حفظ</button>
											  </div>
											</form>
										</section>
									</div>
									<div class="tab-pane" id="settings">
										
										<!-- row -->
										<div class="row">
											<div class="col-lg-12 col-md-12">
												<div class="card">
													<div class="card-body">
														<h2>رفع ملفات إثبات الإعاقة</h2>
													</div>
													<form action="{{route('Client.store')}}" method="POST" >
														{{ csrf_field() }}
														<input id="demo" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
													</form>
												</div>
											</div>
										</div>
										<!-- row closed -->
									</div>

									<div class="tab-pane" id="wins">
										<div class="row">
											<div class="col-lg-12 col-md-12">
												<label class="form-label">رقم الشاهد الوطني</label>
												<input type="number" name="" id="">
											</div>
										</div>
										<!-- row -->
										<div class="row">
											<div class="col">
												<div class="control-group form-group">
													<label class="form-label">إسم الشاهد</label>
													<input type="text" name="" id="" class="control-group form-group">
												</div>
												<div class="control-group form-group">
													<label class="form-label">عنوان الشاهد</label>
													<input type="text" name="" id="" class="control-group form-group">
												</div>
											</div>
											<div class="col">
											  <div class="control-group form-group">
												  <label class="form-label">الولاية</label>
												  <select class="form-control required" searchable="Search here..">
													  <option value="" disabled selected>لايوجد</option>
													  <option value="1">ولاية نهر النيل</option>
													  <option value="2">ولاية الخرطوم</option>
													  <option value="3">ولاية النيل الأزرق</option>
													</select>
													<script>
													$(document).ready(function() {
													  $('.form-control').materialSelect();
													  });
													</script>
											  </div>
											  <div class="control-group form-group">
												  <label class="form-label">الوحدة الإداريه</label>
												  <select class="form-control required" searchable="Search here..">
													  <option value="" disabled selected>لايوجد</option>
													  <option value="1">وحدة إداريه شمال</option>
													  <option value="1">وحدة إداريه وسط</option>
													  <option value="1">وحدة إداريه جنوب</option>
													</select>
													<script>
													$(document).ready(function() {
													  $('.form-control').materialSelect();
													  });
													</script>
											  </div>
											</div>
											<div class="col">
											  <div class="control-group form-group">
												  <label class="form-label">المحليه</label>
												  <select class="form-control required" searchable="Search here..">
													  <option value="" disabled selected>لايوجد</option>
													  <option value="1">محلية عطبرة</option>
													  <option value="1">محلية الخرطوم</option>
													  <option value="1">محلية الدامر</option>
													  <option value="1">محلية شندي</option>
													</select>
													<script>
													$(document).ready(function() {
													  $('.form-control').materialSelect();
													  });
													</script>
											  </div>
											  <br>
											  <div class="control-group form-group">
												  <label class="form-label">الإدارة الشعبيه</label>
												  <select class="form-control required" searchable="Search here..">
													  <option value="" disabled selected>لايوجد</option>
													  <option value="1">المزاد شمال</option>
													  <option value="1">المزاد جنوب</option>
													  <option value="1">الشمالي</option>
													  <option value="1">الدخله</option>
													</select>
													<script>
													$(document).ready(function() {
													  $('.form-control').materialSelect();
													  });
													</script>
											  </div>
											</div>
										  </div>
										<!-- row closed -->
									</div>



									<div class="tab-pane" id="merid">
									</div>




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
@endsection