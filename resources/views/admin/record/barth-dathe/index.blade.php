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
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">السجل المدني</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/   سجل المواليد </span>
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
									<h4 class="card-title mg-b-0">قائمة الملفات</h4>
									@can('role-create')
									<a class="btn btn-success btn-sm effect-scale" data-target="#modaldemo6" data-toggle="modal" href="" data-effect="effect-scale">التذاكر</a>
								@endcan
								</div><br>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-5p border-bottom-0">#</th>
												<th class="wd-10p border-bottom-0">رقم الملف</th>
												<th class="wd-25p border-bottom-0">مقدم الطلب</th>
												<th class="wd-25p border-bottom-0">والدة مقدم الطلب</th>
												<th class="wd-15p border-bottom-0">الولاية</th>
												<th class="wd-10p border-bottom-0">المحلية</th>
												<th class="wd-15p border-bottom-0">المركز</th>
												<th class="wd-15p border-bottom-0">تاريخ إستخراج الملف</th>
												<th class="wd-15p border-bottom-0">حالة الملف</th>
												<th class="wd-10p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($Profiles as $profile)
												<tr>
													<td>{{ $loop->index+1 }}</td>
													<td>{{ $profile->pro_id }}</td>
													<td>{{ $profile->ticket->client_name}}</td>
													<td>{{ $profile->mother_name}}</td>
													<td>{{$profile->user->userData->states[0]->state_name}}</td>
													<td>{{$profile->user->userData->local[0]->local_name}}</td>
													<td>{{$profile->user->userData->centers[0]->center_name}}</td>
													<td class="text-center">
													
														@if (isset($profile->created_at	))
															@php
																$date = strtotime( $profile->created_at	)
															@endphp
															{{date('d/m/Y', $date)}}
														@else
															-
														@endif
													</td>
													<td>
														@if ($profile->status == 0)
														<div class="text-ticket">
															<label for="" class="badge badge-warning">تحت الإنشاء</label>
														</div>
														@endif
														@if ($profile->status == 1)
														<div class="text-ticket">
															<label for="" class="badge badge-success">مكتمل</label>
														</div>
														@endif
														@if ($profile->status == 2)
														<div class="text-ticket">
															<label for="" class="badge badge-danger">محظور</label>
														</div>
														@endif
														
														
													</td>
													<td>
														<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true"
																class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
																type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
															<div class="dropdown-menu tx-13">    
																@if($profile->pro_data_id == null)
																<a class="dropdown-item" href="{{route('profileData',$profile->pro_id)}}">
																	<i class=" text-info fas fa-file"></i>&nbsp;&nbsp;
																	أنشاء بيانات الملف
																</a>
																@endif
																@if($profile->pro_data_id !== null)
																<a class="dropdown-item" href="">
																	<i class=" text-warning fas fa-edit"></i>&nbsp;&nbsp;
																	تعديل بيانات الملف
																</a>
																@endif
																@if($profile->pro_data_id !== null)
																<a class="dropdown-item" href="">
																	<i class=" text-warning fas fa-edit"></i>&nbsp;&nbsp;
																	تحديث
																</a>
																@endif
															</div>
														  
														</div>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
		<!-- Grid modal -->
		<div class="modal" id="modaldemo6">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">التذاكر</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12 col-md-12">
						<div class="row row-sm">
							<!-- col -->
							<div class="col-lg-12">
								<div class="card mg-b-20">
									<div class="card-body d-flex p-3">
										<div class="main-content-label mb-0 mg-t-8">قائمة التذاكر</div>
										<div class="mr-auto"><a  data-placement="top"  title="Add New User" class="d-block tx-20 modal-effect" data-effect="effect-flip-horizontal" data-toggle="modal" href="#modaldemo8"><i class="si si-plus text-muted"></i></a></div>
									</div>
								</div>
							</div>
							<!-- /col -->
							@foreach($tickets as $ticket)
							<!-- col -->
							<div class="col-xl-4 col-md-6">
								<div class="card mg-b-20">
									<div class="card-body p-0">
										<div class="todo-widget-header d-flex pb-2 pd-20">
											<div class="mr-auto">
												<div class="">
													<a href="#" data-placement="top" data-toggle="tooltip" title="أرشفة التذكرة" class="p-2 text-muted"><i class="fas fa-envelope-open-text"></i></a>
													<a  href="#" data-placement="top" data-toggle="tooltip" title="عرض التذكرة" class="p-2 text-muted"><i class="fas fa-exclamation-circle"></i></a>
													<a class="p-2 text-muted" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></a>
													<div class="dropdown-menu tx-13 dropleft">
														<a class="dropdown-iteme "  href="{{ route('profile.show', $ticket->id) }}">بيانات الملف</a>
													</div>
												</div>
											</div>
										</div>
										<div class="p-4">
											<span class="tx-12 text-muted mr-auto float-left">{{$ticket->tiket_id}}</span><span class="badge bg-primary-transparent text-primary ">رقم التذكرة</span>
											<br>
											<span class="tx-12 text-muted mr-auto float-left">{{$ticket->client_name}}</span><span class="badge bg-primary-transparent text-primary ">مالك التذكرة</span>
											<br>
											<span class="tx-12 text-muted mr-auto float-left">{{$ticket->user[0]->name}}</span><span class="badge bg-primary-transparent text-primary ">منشئ التذكرة</span>
											<br>
											@php
											$date = strtotime( $ticket->created_at)
											@endphp
											<span class="tx-12 text-muted mr-auto float-left">{{date('d/m/Y', $date)}}</span><span class="badge bg-primary-transparent text-primary ">تاريخ إنشاء التذكرة</span>
											<br>
											@php
											$time = strtotime( $ticket->created_at)
											@endphp
											<span class="tx-12 text-muted mr-auto float-left">{{date('h:m:s', $time)}}</span><span class="badge bg-primary-transparent text-primary ">ساعة إنشاء التذكرة</span>
											<br>
											<span style="color:#555;" class="badge bg-{{$ticket->payed == 1 ? 'success' : 'danger' }}-transparent  mr-auto float-left">{{$ticket->payed == 1 ? 'تم سداد الرسوم' :( $ticket->payed == 2 ? 'تم حذف الدفعية' :  'لم يتم السداد') }}</span><span class="badge bg-primary-transparent text-primary ">حالة التذكرة</span>
										</div>
									</div>
									<div class="card-footer ">
										@if ($ticket->payed == 1)
										<a class="btn btn-primary" data-toggle="modal" href="#file{{$ticket->id}}">إنشاء ملف برقم التذكرة</a>
										@else
										<a class="btn btn-warning" data-toggle="modal" href="#edit{{$ticket->id}}" > سداد الرسوم</a>
										@endif
									</div>
								</div>
							</div>

							<!-- edit modal -->
							<div class="modal" id="edit{{$ticket->id}}">
							<div class="modal-dialog modal-dialog-ticketed" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">سداد الرسوم</h6>
									</div>
									<form action="{{ route('tiket.edit', $ticket->id) }}" method="PUT">
										{{ csrf_field() }}
										@method('PUT')
										<div class="modal-body">
											<label for="">مالك التذكرة</label>
											<input disabled type="text" name="client_name" value="{{ $ticket->client_name }}" class="form-control">
											<input type="hidden" name="payed" value="1">
										</div>
										<div class="modal-footer">
											<button class="btn ripple btn-success btn-sm" type="submit">سداد</button>
										</div>
									</form>
								</div>
							</div>
						</div>
							<!-- /col -->
						<!-- edit modal -->
						<div class="modal" id="file{{$ticket->id}}">
							<div class="modal-dialog modal-dialog-ticketed" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">إنشاء ملف برقم التذكرة</h6>
									</div>
									<div class="modal-body">
										<form action="{{ route('profile.store')}}" method="POST">
											{{ csrf_field() }}
											@method('POST')
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">إسم العميل</span>
											</div>
											<input disabled  class="form-control" placeholder="{{$ticket->client_name}}" type="text" required>
											<input type="hidden" name="ticket_id" value="{{$ticket->tiket_id}}">
										</div><!-- input-group -->
										
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">إسم الوالدة</span>
											</div>
											<input name="mother_name" aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="إسم الوالدة" type="text" required>
											
										</div>
									</div>
									<div class="modal-footer">
										<button class="btn ripple btn-success"type="submit">إنشاء الملف</button>
									</div>
								</form>
				
								</div>
							</div>
						</div>
						<!-- /col -->
							@endforeach

						</div>
							</div>
							<!-- /col -->
					<!-- col -->



							<!-- Modal effects -->
		<div class="modal" id="modaldemo8">
			<div class="modal-dialog modal-dialog-ticketed" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">سحب تذكرة جديدة</h6>
					</div>
					<div class="modal-body">
						<form action="{{ route('tiket.store')}}" method="POST">
							{{ csrf_field() }}
							@method('POST')
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">الرقم الوطني</span>
							</div><input name="client_id" aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="الرقم الوطني إن وجد" type="text">
						</div><!-- input-group -->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">الإسم</span>
							</div><input name="client_name" aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="إسم العميل" type="text" required>
						</div><!-- input-group -->
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									الهاتف:
								</div>
							</div><!-- input-group-prepend -->
							<input name="client_phone" class="form-control"  placeholder="000-0000-0000" type="text" required>
						</div><!-- input-group -->
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="ckbox"><input name="payed" type="checkbox"><span>هل تم دفع مستحق التذكرة المالي</span></label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-success"type="submit">سحب التذكرة</button>
					</div>
				</form>

				</div>
			</div>
		</div>
		<!-- End Modal effects-->
				</div>
				<!-- row closed -->

					</div>
				</div>
			</div>
		</div>
		<!--End Grid modal -->


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
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
@endsection