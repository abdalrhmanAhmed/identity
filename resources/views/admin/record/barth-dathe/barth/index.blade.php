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
							<h4 class="content-title mb-0 my-auto"> السجل المدني </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  سجل المواليد </span>
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
									<h4 class="card-title mg-b-0">قائمة سجل المواليد و الوفيات</h4>
									
								</div><br>
								<div class="col-sm-12 col-md-12 col-xl-12">
									<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> رقم الشهادة</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-5p border-bottom-0">#</th>
												<th class="wd-10p border-bottom-0">رقم الشهادة</th>
												<th class="wd-25p border-bottom-0">إسم مقدم الطلب</th>
												<th class="wd-15p border-bottom-0">الولاية</th>
												<th class="wd-10p border-bottom-0">المحلية</th>
												<th class="wd-15p border-bottom-0">نوع المعاملة</th>
												<th class="wd-15p border-bottom-0">تاريخ المعاملة</th>
												<th class="wd-10p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											{{-- @foreach ($student as $stud)
												<tr>
													<td>{{ $loop->index+1 }}</td>
													<td>{{ $stud->sno }}</td>
													<td>{{ $stud->sname }}</td>
													<td>{{ $stud->facs->fac_name ?? '' }}</td>
													<td>{{ $stud->depts->name ?? '' }}</td>
													<td>{{ $stud->amount }}</td>
													<td class="text-center">
													
														@if (isset($stud->payments->collect_date))
															@php
																$date = strtotime( $stud->payments->collect_date)
															@endphp
															{{date('d/m/Y', $date)}}
														@else
															-
														@endif
													</td>
													<td>
														@if ($stud->status == 1)
															<div class="text-center">
																<label for="" class="badge badge-success">تم السداد</label>
															</div>
														@else
															<div class="text-center">
																<label for="" class="badge badge-danger">لم يم السداد</label>
															</div>
														@endif
													</td>
													<td>
														<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true"
																class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
																type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
															<div class="dropdown-menu tx-13">
																	@if ($stud->status == 1)
																		<a class="dropdown-item" href="{{route('payment.payIn.invoice', $stud->sno)}}">
																			<i class=" text-success fas fa-money-bill"></i>&nbsp;&nbsp;
																				عرض الإيصال المالي
																		</a>
																	@endif
																	
																	@if ($stud->status == 0)
																		<form action="{{ route('payment.payIn.create') }}" method="GET">
																			{{ csrf_field() }}
																			<input type="hidden" name="sno" value="{{$stud->sno}}" id="">
																			<button type="button" class="dropdown-item" onclick="this.form.submit()">
																				<i class="si si-check text-success"></i>
																				سداد رسوم
																			</button>
																		</form>
																		
																	@endif
															</div>
														  
														</div>
													</td>
												</tr>
											@endforeach --}}
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal effects -->
					<div class="modal" id="modaldemo8">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">رقم الشهادة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<form action="{{ route('barthdetale') }}" method="get">
									{{ csrf_field() }}
									<div class="modal-body">
										<h6 class="text-center">أدخل رقم الشهادة</h6>
										<input type="text" name="sno" class="form-control" id="">
									</div>
									<div class="modal-footer">
										<button class="btn ripple btn-primary" type="submit">بحث</button>
										<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
									</div>
								</form>
								
							</div>
						</div>
					</div>
					<!-- End Modal effects-->
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
@endsection