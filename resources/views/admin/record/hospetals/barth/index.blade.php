@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<!---Internal Owl Carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />



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
							<h4 class="content-title mb-0 my-auto">المستشفى</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الولادة و الوفيات</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				@include('notifications.notify')
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<div class="pull-right">
                                        @can('role-create')
                                            <a class="btn btn-primary btn-sm effect-scale" href="#modaldemo8" data-toggle="modal" data-effect="effect-scale">اضافة</a>
                                        @endcan
                                    </div>
								</div><br>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-5p border-bottom-0  text-center">#</th>
												<th class="wd-10p border-bottom-0 text-center">رقم الشهادة</th>
												<th class="wd-10p border-bottom-0 text-center">نوع الشهادة</th>
												<th class="wd-10p border-bottom-0 text-center">وصف الشهادة</th>
												<th class="wd-10p border-bottom-0 text-center">إسم المركز</th>
												<th class="wd-25p border-bottom-0 text-center">مقدم الطلب</th>
												<th class="wd-25p border-bottom-0 text-center">منشئ الطلب</th>
												<th class="wd-25p border-bottom-0 text-center">المرفق</th>
												<th class="wd-10p border-bottom-0 text-center">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($hospetal as $center)
												<tr>
													<td class="text-center">{{ $loop->index+1 }}</td>
													<td class="text-center">{{ $center->h_no }}</td>
													<td class="text-center {{$center->type == 1 ?  'text-success': 'text-danger'}}">{{ $center->type == 1 ? 'شهادة ميلاد': 'شهادة وفاة' }}</td>
													<td class="text-center">{{ $center->descrption}}</td>
													<td class="text-center">{{ $users->userData->local[0]->local_name}}</td>
													<td class="text-center">احمد الطيب</td>
													<td class="text-center">{{ Auth::user()->name }}</td>
													<td class="text-center"><a class="text-warning" style="cursor: pointer"data-toggle="modal" href="#file{{$center->id}}"><i class="fe fe-file tx-20"></i></a></td>
													<td class="text-center">
														<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true"
																class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
																type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
															<div class="dropdown-menu tx-13">    
                                                                <a class="dropdown-item text-center" data-toggle="modal" href="#edit{{$center->id}}">
                                                                    تعديل
                                                                </a>
                                                                <a class="dropdown-item text-center" data-toggle="modal" href="#delete{{$center->id}}">
                                                                    حذف
                                                                </a>
															</div>
														  
														</div>
													</td>
												</tr>
												<!-- file modal -->
												<div class="modal" id="file{{$center->id}}">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content modal-content-demo">
															<div class="modal-header">
																<h6 class="modal-title"> مستند الشهادة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
															</div>
															<div class="model-body">
																<img src="{{ URL::asset($center->files_route) }}" alt="dfwef" width="500">
															</div>
														</div>
													</div>
												</div>
                                                <!-- edit modal -->
												<div class="modal" id="edit{{$center->id}}">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content modal-content-demo">
															<div class="modal-header">
																<h6 class="modal-title"> تعديل الشهادة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
															</div>
															<form action="{{ route('barthedit') }}" method="post" enctype="multipart/form-data">
																{{ csrf_field() }}
																@method('post')
																<div class="modal-body">
																	<label for="">وصف الحالة</label>
																	<input type="text" name="descrption" class="form-control" value="{{ $center->descrption }}" >
																	<input type="hidden" name="id" value="{{ $center->id }}">
																	<br>
																	<label for="">الرقم الوطني لمقدم الطلب</label>
																	<input type="text" name="id_no" class="form-control" value="{{ $center->id_no }}" >
																	<br>
																	<label for="">إسم مقدم الطلب</label>
																	<input type="text" name="client_name" class="form-control" disabled>
																	<br>
																	<label class="form-label">نوع الشهادة</label>
																	<select name="type" id="select-beast" class="form-control" data-parsley-class-handler="#lnWrapper">
																		<option value="1" {{ $center->type == 1 ? 'selected' : ''}}>شهادة ميلاد</option>
																		<option value="2" {{ $center->type == 2 ? 'selected' : ''}}>شهادة وفاة</option>
																	</select>
																	<br>
																	<div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
																		<label for="">ملف الحالة</label>
																		<input  type="file" name="files" multiple/>
																	</div>
																</div>
																<div class="modal-footer">
																	<button class="btn ripple btn-primary btn-sm" type="submit">حفظ</button>
																	<button class="btn ripple btn-secondary btn-sm" data-dismiss="modal" type="button">إلغاء</button>
																</div>
															</form>
														</div>
													</div>
												</div>
                                                {{-- delete model --}}
                                                <div class="modal" id="delete{{$center->id}}">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content modal-content-demo">
															<div class="modal-header">
																<h6 class="modal-title">حذف  الشهادة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
															</div>
															<form action="{{ route('barthdelete') }}" method="post">
																{{ csrf_field() }}
																@method('post')
																<div class="modal-body">
																	<label for="">هل أنت متأكد من عملية حذف الشهادة بالرقم الآتي ؟</label>
																	<input disabled type="text" name="h_no" value="{{ $center->h_no }}" class="form-control">
																	<input type="hidden" name="id" value="{{ $center->id }}">
																</div>
																<div class="modal-footer">
																	<button class="btn ripple btn-danger btn-sm" type="submit">حذف</button>
																	<button class="btn ripple btn-secondary btn-sm" data-dismiss="modal" type="button">إلغاء</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

                    	<!-- add modal -->
						<div class="modal" id="modaldemo8">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">إضافة  شهادة جديدة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<form action="{{ route('barthcreate') }}" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
										<div class="modal-body">
											<label for="">وصف الحالة</label>
											<input type="text" name="descrption" class="form-control" required>
                                            <br>
											<label for="">الرقم الوطني لمقدم الطلب</label>
											<input type="text" name="id_no" class="form-control" required>
                                            <br>
											<label for="">إسم مقدم الطلب</label>
											<input type="text" name="client_name" class="form-control client_name" readonly>
                                            <br>
											<label class="form-label">نوع الشهادة</label>
											<select name="type" id="select-beast" class="form-control" data-parsley-class-handler="#lnWrapper" required="">
												<option value="1">شهادة ميلاد</option>
												<option value="2">شهادة وفاة</option>
											</select>
											<br>
											<div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
												<label for="">ملف الحالة</label>
												<input class="dropify" type="file" name="files" accept=".pdf,.png,.jpg,.jpeg"/>
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn ripple btn-primary btn-sm" type="submit">إضافة</button>
											<button class="btn ripple btn-secondary btn-sm" data-dismiss="modal" type="button">إلغاء</button>
										</div>
									</form>
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

<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>

<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>


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
        $('input[name="id_no"]').on('change', function() {
            var fatherId = $(this).val();
            if (fatherId) {
                $.ajax({
                    url: "{{ URL::to('record/profile/getFatherName') }}/" + fatherId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('input[name="client_name"]').empty();
                        $('input[name="client_name"]').val(data)
                    },
                });
            } else {
                alert('AJAX load did not work');
            }
        });
    });
  </script>

@endsection