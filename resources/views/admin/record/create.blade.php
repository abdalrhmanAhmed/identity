@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">نظام التسجيل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ نظام تسجيل جديد</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									نظام التسجيل
								</div>
								<p class="mg-b-20">نظام تسجيل جديد</p>
								<div id="wizard1">
									<h3>البيانات الشخصية</h3>
									<section>
										<form action="{{route('admin.record.store')}}" method="POST" >
											@csrf

										<div class="control-group form-group">
											<label class="form-label">الإسم رباعي بالعربي</label>
											<input type="text" class="form-control required" placeholder="الإسم بالعربي">
										</div>
                                        <br>
                                        <div class="control-group form-group">
											<label class="form-label">الإسم رباعي بالإنجليزي</label>
											<input type="text" class="form-control required" placeholder="الإسم بالإنجليزي">
										</div>
                                        <br>
                                        <div class="control-group form-group mb-0">
											<label class="form-label">الجنس</label>
											<select class="form-control required" searchable="Search here..">
                                                <option value="" disabled selected>ذكر</option>
                                                <option value="1">انثى</option>
                                              </select>
                                              <script>
                                              $(document).ready(function() {
                                                $('.form-control').materialSelect();
                                                });
                                              </script>
										</div>
                                        <br>
                                        <div class="control-group form-group">
											<label class="form-label">تاريخ الميلاد</label>
											<input type="date" class="form-control required" >
										</div>
                                        <br>
                                        <div class="control-group form-group mb-0">
											<label class="form-label">دولة الميلاد</label>
											<select class="form-control required" searchable="Search here..">
                                                <option value="" disabled selected>دولة الميلاد</option>
                                                <option value="1">السودان</option>
                                              </select>
                                              <script>
                                              $(document).ready(function() {
                                                $('.form-control').materialSelect();
                                                });
                                              </script>
										</div>
                                        <br>
										<div class="control-group form-group">
											<label class="form-label">الرقم الوطني للأب</label>
											<input type="number" class="form-control required" placeholder="الرقم الوطني للأب">
										</div>
                                        <br>
										<div class="control-group form-group mb-0">
											<label class="form-label">رقم شهادة الميلاد</label>
											<input type="number" class="form-control required" placeholder="رقم شهادة الميلاد">
										</div>
                                        <br>
                                        <div class="control-group form-group mb-0">
											<label class="form-label">فصيلة الدم</label>
											<select class="form-control required" searchable="Search here..">
                                                <option value="" disabled selected>فصيلة الدم</option>
                                                <option value="1">ِA+</option>
                                                <option value="2">A-</option>
                                                <option value="3">B+</option>
                                                <option value="3">B-</option>
                                                <option value="3">O+</option>
                                                <option value="3">O-</option>
                                                <option value="3">AB+</option>
                                                <option value="3">AB-</option>
                                              </select>
                                              <script>
                                              $(document).ready(function() {
                                                $('.form-control').materialSelect();
                                                });
                                              </script>
										</div>
                                        <br>
                                        <div class="control-group form-group mb-0">
											<label class="form-label">الحالة الإجتماعيه</label>
											<select class="form-control required" searchable="Search here..">
                                                <option value="" disabled selected>الحاله الإجتماعيه</option>
                                                <option value="1">متزوج</option>
                                                <option value="2">اعزب</option>
                                                <option value="3">الأرامل</option>
                                                <option value="3">مطلقين</option>
                                              </select>
                                              <script>
                                              $(document).ready(function() {
                                                $('.form-control').materialSelect();
                                                });
                                              </script>
										</div>
                                        <br>
                                        <div class="control-group form-group mb-0">
											<label class="form-label">المهنه</label>
											<select class="form-control required" searchable="Search here..">
                                                <option value="" disabled selected>...</option>
                                                <option value="1">اعمال حره</option>
                                                <option value="2">موظف</option>
                                                <option value="3">عامل</option>
                                              </select>
                                              <script>
                                              $(document).ready(function() {
                                                $('.form-control').materialSelect();
                                                });
                                              </script>
										</div>
                                        <br>
                                        <div class="control-group form-group mb-0">
											<label class="form-label">التصنيف المهني</label>
											<select class="form-control required" searchable="Search here..">
                                                <option value="" disabled selected>غير مصنف</option>
                                                <option value="1">رواد اعمال</option>
                                                <option value="2">موظف تنفيذي</option>
                                              </select>
                                              <script>
                                              $(document).ready(function() {
                                                $('.form-control').materialSelect();
                                                });
                                              </script>
										</div>
                                        <br>
                                        <div class="control-group form-group mb-0">
											<label class="form-label">المؤهل العلمي</label>
											<select class="form-control required" searchable="Search here..">
                                                <option value="" disabled selected>لايوجد</option>
                                                <option value="1">بروف</option>
                                                <option value="2">دكتوراه</option>
                                                <option value="3">ماجستير</option>
                                                <option value="3">بكلاريوس</option>
                                                <option value="3">دبلوم</option>
                                                <option value="3">ثانوي</option>
                                                <option value="3">اساس</option>
                                              </select>
                                              <script>
                                              $(document).ready(function() {
                                                $('.form-control').materialSelect();
                                                });
                                              </script>
										</div>
                                        <br>
                                        <div class="control-group form-group">
											<label class="form-label">رقم الهاتف</label>
											<input type="number" class="form-control required" placeholder="رقم الهاتف">
										</div>
                                        <br>
                                        <div class="control-group form-group">
											<label class="form-label">البريد الإلكتروني</label>
											<input type="email" class="form-control required" placeholder="البريد الإلكتروني">
										</div>
                                        <br>
                                        <div class="control-group form-group">
											<label class="form-label">الرقم الوطني للأم</label>
											<input type="number" class="form-control required" placeholder="الرقم الوطني للأم">
										</div>
                                        <br>
                                        <div class="control-group form-group">
											<label class="form-label">اسم الأم رباعي</label>
                                            <input type="text" class="form-control required" placeholder="اسم الأم رباعي">
										</div>
									</section>
								</form>
									<h3>بيانات الميلاد و الجنسية و العمل</h3>
									<br>
									<section>
										<div class="container form-group">
										{{-- مكاااااااااااااااااااااااااااالميلاااااااااد --}}
											<h5>مكان الميلاد</h5>
											<div class="row">
											  <div class="col">
												<div class="control-group form-group mb-0">
													<label class="form-label">الولاية</label>
													<select class="form-control required" searchable="Search here..">
														<option value="" disabled selected>غير مصنف</option>
														<option value="1">ولاية نهر النيل</option>
														<option value="2">ولاية البحر الأحمر</option>
													</select>
													<script>
													$(document).ready(function() {
													  $('.form-control').materialSelect();
													  });
													</script>
												</div>
												<br>
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
												<br>
											  </div>
											</div>
											{{-- مكاااااااااااااااااااااااااااان العمل --}}
											<h5>مكان العمل</h5>
											<div class="row">
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
												<br>
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
											<div class="control-group form-group">
												<label class="form-label">مكان العمل</label>
												<input type="text" class="form-control required" placeholder="مكان العمل">
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
															<script>
															$(document).ready(function() {
															  $('.form-control').materialSelect();
															  });
															</script>
													  </div>
													  <br>
													  <div class="control-group form-group">
														  <label class="form-label">الديانة</label>
														  <select class="form-control required" searchable="Search here..">
															  <option value="" disabled selected>لايوجد</option>
															  <option value="1">مسلم</option>
															  <option value="1">مسيحي</option>
															</select>
															<script>
															$(document).ready(function() {
															  $('.form-control').materialSelect();
															  });
															</script>
													  </div>
													  <br>
													  <div class="control-group form-group">
														  <label class="form-label">لغة الأم</label>
														  <select class="form-control required" searchable="Search here..">
															  <option value="" disabled selected>لايوجد</option>
															  <option value="1">العربية</option>

															</select>
															<script>
															$(document).ready(function() {
															  $('.form-control').materialSelect();
															  });
															</script>
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
									</section>
									<h3>بيانات الحمض النووي</h3>
									<section>
									<br>
									<section>
										<div class="container form-group">
											<h5>Father</h5>
											<div class="row">
											  <div class="col">
												<div class="control-group form-group mb-0">

													<label class="exampleFormControlInput1">D3S1358</label>
                                                     <input type="text" name="D3S1358" class="form-control">
                                                     	<label class="exampleFormControlInput1">VWA</label>
                                                     <input type="text" name="VWA" class="form-control">
                                                      	<label class="exampleFormControlInput1">FGA</label>
                                                     <input type="text" name="FGA" class="form-control">
                                                      	<label class="exampleFormControlInput1">D8S1179</label>
                                                     <input type="text" name="D8S1179" class="form-control">
                                                      	<label class="exampleFormControlInput1">D21S11</label>
                                                     <input type="text" name="D21S11" class="form-control">
                                                      	<label class="exampleFormControlInput1">D18S51</label>
                                                     <input type="text" name="D18S51" class="form-control">
                                                      	<label class="exampleFormControlInput1">D5S818</label>
                                                     <input type="text" name="D5S818" class="form-control">
                                                      	<label class="exampleFormControlInput1">D31S317</label>
                                                     <input type="text" name="D31S317" class="form-control">
                                                      	<label class="exampleFormControlInput1">D7S820</label>
                                                     <input type="text" name="D7S820" class="form-control">
                                                      	<label class="exampleFormControlInput1">D16S539</label>
                                                     <input type="text" name="D16S539" class="form-control">
                                                      	<label class="exampleFormControlInput1">THO1</label>
                                                     <input type="text" name="THO1" class="form-control">
                                                      	<label class="exampleFormControlInput1">TPOX</label>
                                                     <input type="text" name="TPOX" class="form-control">
                                                      	<label class="exampleFormControlInput1">CSF1PO</label>
                                                     <input type="text" name="CSF1PO" class="form-control">
													<script>
													$(document).ready(function() {
													  $('.form-control').materialSelect();
													  });
													</script>
												</div>
                                                	<div class="control-group form-group mb-0">

												</div>
											  </div>


	                                        <div class="col">
												<div class="control-group form-group">
                                             <h5>Mather</h5>

											<div class="row">

										<label class="exampleFormControlInput1">D3S1358</label>
                                                     <input type="text" name="D3S1358" class="form-control">
                                                     	<label class="exampleFormControlInput1">VWA</label>
                                                     <input type="text" name="VWA" class="form-control">
                                                      	<label class="exampleFormControlInput1">FGA</label>
                                                     <input type="text" name="FGA" class="form-control">
                                                      	<label class="exampleFormControlInput1">D8S1179</label>
                                                     <input type="text" name="D8S1179" class="form-control">
                                                      	<label class="exampleFormControlInput1">D21S11</label>
                                                     <input type="text" name="D21S11" class="form-control">
                                                      	<label class="exampleFormControlInput1">D18S51</label>
                                                     <input type="text" name="D18S51" class="form-control">
                                                      	<label class="exampleFormControlInput1">D5S818</label>
                                                     <input type="text" name="D5S818" class="form-control">
                                                      	<label class="exampleFormControlInput1">D31S317</label>
                                                     <input type="text" name="D31S317" class="form-control">
                                                      	<label class="exampleFormControlInput1">D7S820</label>
                                                     <input type="text" name="D7S820" class="form-control">
                                                      	<label class="exampleFormControlInput1">D16S539</label>
                                                     <input type="text" name="D16S539" class="form-control">
                                                      	<label class="exampleFormControlInput1">THO1</label>
                                                     <input type="text" name="THO1" class="form-control">
                                                      	<label class="exampleFormControlInput1">TPOX</label>
                                                     <input type="text" name="TPOX" class="form-control">
                                                      	<label class="exampleFormControlInput1">CSF1PO</label>
                                                     <input type="text" name="CSF1PO" class="form-control">
													<script>
													$(document).ready(function() {
													  $('.form-control').materialSelect();
													  });
													</script>
												</div>
                                                <br>
                                                 <div  class="form-group">
                                               <button class="btn btn-success" type="submit"> Save </button>
                                               </div>

												<br>
											  </div>
											</div>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- /row -->
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js -->
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>
@endsection
