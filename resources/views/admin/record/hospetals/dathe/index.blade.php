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
							<h4 class="content-title mb-0 my-auto">المستشفى</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الوفاة</span>
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
												<th class="wd-10p border-bottom-0 text-center">إسم المركز</th>
												<th class="wd-25p border-bottom-0 text-center">مقدم الطلب</th>
												<th class="wd-25p border-bottom-0 text-center">المرفق</th>
												<th class="wd-10p border-bottom-0 text-center">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($hospetal as $center)
												<tr>
													<td class="text-center">{{ $loop->index+1 }}</td>
													<td class="text-center">{{ $center->center_name}}</td>
													<td class="text-center">{{ $center->local[0]->local_name }}</td>
													<td class="text-center">{{ $center->local[0]->local_name }}</td>
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
                                                                     												<!-- edit modal -->
												<div class="modal" id="edit{{$center->id}}">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content modal-content-demo">
															<div class="modal-header">
																<h6 class="modal-title">تعديل  شهادة الوفاة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
															</div>
															<form action="{{ route('center.edit', $center->id) }}" method="PUT">
																{{ csrf_field() }}
																@method('PUT')
																<div class="modal-body">
																	<label for="">إسم المركز </label>
																	<input type="text" name="center_name" value="{{ $center->center_name }}" class="form-control">
																	<label class="form-label">اسم المحلية</label>
																	<select name="local_id" id="select-beast" class="form-control" data-parsley-class-handler="#lnWrapper" required="">
																		<option selected value="{{$center->local[0]->id}}">{{$center->local[0]->local_name}}</option>
																		@foreach ($locales as $item)
																			<option value="{{$item->id}}">{{$item->local_name}}</option>
																		@endforeach
																	</select>
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
																<h6 class="modal-title">حذف شهادة الوفاة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
															</div>
																<div class="modal-body">
																	<label for="">هل أنت متأكد من عملية حذف المركز ؟</label>
																	<input disabled type="text" name="center_name" value="{{ $center->center_name }}" class="form-control">
																</div>
																<div class="modal-footer">
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['center.destroy',
                                                                    $center->id], 'style' => 'display:inline']) !!}
                                                                    {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                                                                    {!! Form::close() !!}																	<button class="btn ripple btn-secondary btn-sm" data-dismiss="modal" type="button">إلغاء</button>
																</div>
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
										<h6 class="modal-title">إضافة  شهادة وفاة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<form action="{{ route('center.store') }}" method="POST">
										{{ csrf_field() }}
										<div class="modal-body">
											<label for="">وصف الحالة</label>
											<input type="text" name="descrption" class="form-control" required>
                                            <br>
                                            <div>
                                                <label for="">ملف الحلة</label>
                                                <input id="demo" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
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
@endsection