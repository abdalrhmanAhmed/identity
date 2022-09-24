@extends('layouts.master')
@section('css')
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('asset/css/abdalrhman/print2.css') }}" rel="stylesheet" />


@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">السجل المدني</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  شهادة وفاة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				@include('notifications.notify')
				<!-- row -->
				<div class="row">
					<div class="col-md-12 col-xl-12">
						<div class=" main-content-body-invoice">
							<div class="card card-invoice">
								<div id="print-erea">
								<div class="card-body">
									<div class="invoice-header">
										<h2 class="invoice-title">شهادة وفاة</h2>
										<img src="{{ URL::asset('assets/img/brand/main-logo.png') }}" alt="" style="height: 90px; width: 90px">
										<div class="billed-from">
											<h6>محمد سيف</h6>
											<p>الرقم الجامعي : 202020220<br>
											تاريخ السداد : {{ date('Y, M d') }}<br>
											تاريخ البنك : {{ date('Y, M d') }}</p>
										</div><!-- billed-from -->
									</div><!-- invoice-header -->
									<div class="row mg-t-20">
										<div class="col-md">
											<label class="tx-gray-600">المستلم</label>
											<div class="billed-to">
												<h6>جامعة الشيخ عبدالله البدري</h6>
												<p>السودان - نهر النيل - بربر - بربر القدواب<br>
												الموقع الإلكتروني : eaeu.edu.sd
												</p>
											</div>
										</div>
										<div class="col-md">
											<label class="tx-gray-600">بيانات الإيصال</label>
											<p class="invoice-info-row"><span>رقم الإيصال</span> <span>6541981</span></p>
											<p class="invoice-info-row"><span>الرقم الجامعي</span> <span>5466666668</span></p>
											<p class="invoice-info-row"><span>تاريخ الإصدار</span> <span>{{date('Y, M d')}}</span></p>
											<p class="invoice-info-row"><span>تاريخ السداد</span> <span>{{date('Y, M d')}}</span></p>
										</div>
									</div>
									<div class="table-responsive mg-t-40">
										<table class="table table-invoice border text-md-nowrap mb-0">
											<thead>
												<tr>
													<th class="wd-20p">نوع الرسوم</th>
													<th class="wd-40p">التفاصيل</th>
													<th class="tx-center">القيمة</th>
													
												</tr>
											</thead>
											<tbody>
										        <tr>
													<td>رسوم بطاقة</td>
													<td class="tx-12">رسوم بطاقة تعريفية جامعية</td>
													<td class="tx-center">200</td>
													
												</tr>
												<tr>
													<td>رسوم تسجيل</td>
													<td class="tx-12">رسوم تسجيل للفصل الدراسي</td>
													<td class="tx-center">215</td>
													
												</tr>
												<tr>
													<td>رسوم دراسية</td>
													<td class="tx-12">رسوم الدراسة للفصل الدراسي</td>
													<td class="tx-center">65494</td>
													
												</tr>
												
												<tr>
													<td class="valign-middle" colspan="2" rowspan="4">
														<div class="invoice-notes">
															<label class="main-content-label tx-13">الإجمالي</label>
															<p></p>
														</div><!-- invoice-notes -->
													</td>
													
												</tr>
												<tr>
													<td class="tx-center" colspan="2">
														<h4 class="tx-primary tx-bold">4559895 
															<span style="font-size: 14px; color: #666">جنيه سوداني</span>
														</h4>
												
													</td>
												</tr>
											</tbody>
										</table>

										{!! QrCode::size(300)->encoding('utf-8')->generate("محمد سيف") !!}
									</div>
									<hr class="mg-b-40">
									<a href="" id="close" class="btn btn-primary float-left mt-3" style="margin-right: 8px">
										<i class="fa fa-close ml-1"></i>إغلاق الإيصال
									</a>

									<button id="print" class="btn btn-success	 float-left mt-3 mr-3">
										<i class="mdi mdi-printer ml-1"></i>طباعة الإيصال
									</button>
						
								</div>
							</div>
							</div>
						</div>
					</div><!-- COL-END -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{ asset('assets/js/printThis.js') }}"></script>
<script>
	$('#print').on('click', function(){
		$('#print-erea').printThis();
	});
</script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection