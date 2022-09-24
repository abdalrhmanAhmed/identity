@extends('layouts.master')
@section('css')
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">السجل المدني</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  تفاصيل الشهادة </span>
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
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4>تفاصيل الشهادة</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('dathinvoice') }}" method="get">
										{{ csrf_field() }}
										<div class="row">
											<div class="form-group col">
												<label for="sno">الرقم الوطني لمقدم الطلب</label>
												<input type="text" class="form-control" name="sno" value="" readonly>
											</div>
											<div class="form-group col">
												<label for="sname">إسم مقدم الطلب</label>
												<input type="text" class="form-control" name="sname" value="" readonly>
											</div>
											<div class="form-group col">
												<label for="facs">الولاية</label>
												<input type="text" class="form-control" name="fac" value="" readonly>
											</div>
											<div class="form-group col">
												<label for="sdept">المحلية</label>
												<input type="text" class="form-control" name="fac" value="" readonly>
											</div>
											<div class="form-group col">
												<label for="sdept">الرقم الوطني للمتوفى</label>
												<input type="text" class="form-control" name="class_no" value="" >
											</div>
										</div>
										<div class="row">
											<div class="form-group col">
												<label for="cardFees">إسم المتوفى</label>
												<input type="text" class="form-control" value="" name="card_fees" readonly>
											</div>
											<div class="form-group col">
												<label for="cardFees">الولاية</label>
												<input type="text" class="form-control" value="" name="reg_fees" readonly>
											</div>
											<div class="form-group col">
												<label for="cardFees">المحلية</label>
												<input type="text" class="form-control" value="" name="study_fees" readonly>
											</div>
											<div class="form-group col">
												<label for="cardFees">تاريخ الوفاة</label>
												<input type="text" class="form-control" value="" name="other_fees" readonly>
											</div>
											<div class="form-group col">
												<label for="cardFees">تاريخ تحرير الوفاة</label>
												<input type="text" class="form-control" name="fine_fees" value="" readonly>
											</div>
										</div>
										<br>
										<div class="d-flex justify-content-center">
											<button type="submit" class="btn btn-primary" >إستخراج الشهادة</button>
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
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection