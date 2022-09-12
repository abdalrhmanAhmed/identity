@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('asset/css/abdalrhman/print1.css') }}">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الطلاب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إستمارة التسجيل</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-md-12 col-xl-12">
						<div class=" main-content-body-invoice">
							<div class="card card-invoice" id="print-area">
                                <div class="card-body">
                                    <div id="print-erea">
                                        <!-- start file header -->
                                        <div class="invoice-header" style="border-bottom: solid #555 1px; ">
                                            {{-- <h2 class="invoice-title">إيصال التسجيل</h2> --}}
                                            <div class="billed-from test1">
                                                <p class="text-center" style="font-weight: bold;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">The Republic of Sudan</p>
                                                <p class="text-center" style="font-weight: bold;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Elsheikh Abdallah Elbadri University<br>
                                                    Scientific Affairs<br>
                                                    Admission And Registration</p>
                                            </div><!-- billed-from -->
                                            <img class="eaeu" src="{{ URL::asset('assets/img/media/underconstruction23.PNG') }}" alt="" style="height: 90px; width: 90px">
                                            <div class="billed-from test2">
                                                <p class="text-center" style="font-weight: bold">جمهورية السودان</p>
                                                <p class="text-center" style="font-weight: bold">جامعة الشيخ عبدالله البدري<br>
                                                أمانة الشؤون العلمية<br>
                                                القبول و التسجيل</p>
                                
                                            </div><!-- billed-from -->
                                        </div>
                                        <!-- end file header -->

                                        <!-- start paper header -->
                                        <div class="row mg-t-20 top-header">
                                            <div class="col-md">
                                                <label class="tx-gray-600">التاريخ :   {{date('Y/m/d')}}</label>
                                                <div class="billed-to">
                                                    <h6>جامعة الشيخ عبدالله البدري</h6>
                                                    <p>السودان - نهر النيل - بربر - بربر القدواب<br>
                                                    الموقع الإلكتروني : eaeu.edu.sd <br>
                                                    كلية : hjkk <br>
                                                    قسم : hjtuyj
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md img">
                                                <div class="row">
                                                    <div class="col-md imag_label"><p class="tx-gray-600">صورة الطالب : </p></div>
                                                    <div class="col-md">                    @if ($ticket->photo == null)
                                                        <div>
                                                            @if($ticket->SEX == 2)
                                                            <img  alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/default_female.png')}}">
                                                            @else
                                                            <img  alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/default_male.jpg')}}">
                                                            @endif
                                                        </div>
                                                        @else
                                                        <img src="{{URL::asset('assets/img/faces/default_female.png')}}" alt="صورة الطالب" srcset="" width="100" height="100" style="border: dotted # 1px">
                                                        @endif</div>
                                                </div>
                                                
                            
                                            </div>
                                        </div>
                                        <!-- end paper header -->

                                        <!-- start forms  -->

                                        <!-- start form1  -->
                                        <div class="row mg-t-30 top-form">
                                            <div class="col-md start" style="border-left: solid #555 2px;">
                                                <label class="tx-gray-600">بيانات الطالب</label>
                                                <p class="invoice-info-row"><span>الرقم الجامعي : </span> <span>{{$ticket->ticket_id}}</span></p>
                                                <p class="invoice-info-row"><span>إسم الطالب : </span> <span>{{ $ticket->client_name }}</span></p>
                                                <p class="invoice-info-row"><span>سنة القبول : </span> <span>{{$ticket->created_at}}</span></p>
                                                <p class="invoice-info-row"><span>نوع الشهادة : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>نوع القبول : </span> <span></span></p>
                                            </div>
                                            <div class="col-md">
                                                <label class="tx-gray-600">المصروفات الدراسية</label>
                                                <p class="invoice-info-row"><span>رسوم التسجيل : </span> <span>{{$ticket->payed}}</span></p>
                                                <p class="invoice-info-row"><span>الرسوم الدراسية : </span> <span>{{$ticket->STUDY_FEES}}</span></p>
                                                <p class="invoice-info-row"><span>رسوم البطاقات : </span> <span>{{$ticket->payed}}</span></p>
                                                <p class="invoice-info-row"><span>أخرى : </span> <span>{{$ticket->payed
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                .....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................
                                                
                                                ..................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................0000000000000000000000000000000000000000000000000000000000000000000000000000000000
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                }}</span></p>
                                                <p class="invoice-info-row"><span>جملة المصروفات الدراسية : </span> <span>{{ $ticket->payed }}</span></p>
                                            </div>
                                        </div>
                                        <!-- end form1  -->

                                        <!-- start form2  -->
                                        <div class="row mg-t-30 top-form">
                                            <div class="col-md start" style="border-left: solid #555 2px;">
                                                <label class="tx-gray-600">بيانات تملأ بواسطة المشرف الطلابي : </label>
                                                <p class="invoice-info-row"><span>إسم المشرف الطلابي : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>التوقيع : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>التاريخ : </span> <span></span></p>
                                            </div>
                                            <div class="col-md">
                                                <label class="tx-gray-600">بيانات تملأ بواسطة إدارة السكن : </label>
                                                <p class="invoice-info-row"><span>نوع سكن الطالب : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>إسم الداخلية : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>هل تم سداد رسوم السكن ؟ : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>إسم مشرف السكن : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>التوقيع : </span> <span></span></p>
                                            </div>
                                        </div>
                                        <!-- end form2  -->

                                        <!-- start form3  -->
                                        <div class="row mg-t-30 top-form">
                                            <div class="col-md start" style="border-left: solid #555 2px;">
                                                <label class="tx-gray-600">بيانات تملأ بواسطة مشرف المكتبة : </label>
                                                <p class="invoice-info-row"><span>إسم مشرف المكتبة : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>التوقيع : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>الختم : </span> <span></span></p>
                                            </div>
                                            <div class="col-md">
                                                <label class="tx-gray-600">بيانات تملأ بواسطة رئيس القسم : </label>
                                                <p class="invoice-info-row"><span>إسم رئيس القسم : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>التوقيع : </span> <span></span></p>
                                                <p class="invoice-info-row"><span>الختم : </span> <span></span></p> 
                                            </div>
                                        </div>
                                        <!-- end form3  -->

                                        <!-- end forms  -->

                                        <hr class="mg-b-40">           
                                    </div>
                                    <button id="print" class="btn btn-success float-right mt-3 mr-3" style="margin:0 0 10 0">
                                        <i class="mdi mdi-printer ml-1"></i>طباعة الإستمارة
                                    </button>
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
		$('#print-area').printThis();
	});
</script>
@endsection
