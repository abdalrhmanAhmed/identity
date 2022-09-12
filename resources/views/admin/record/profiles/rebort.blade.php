@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h5 class="content-title mb-0 my-auto">نظام الدفع الالكتروني</h5>
			<span class="text-muted mt-1 tx-13 mr-2 mb-0">/ البيانات السداد</span>
		</div>
	</div>

</div>
<!-- breadcrumb -->
@endsection
@section('content')
    <div class="row" id="print-erea">
      <div class="col-xl-12">
        <div class="col-md-12">
          <div >
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">حركات السداد علي كل الحسابات </h3>                  
                <div class="card-tools">
                  <div class="input-group" >
                    <input type="text" disabled class="form-control input-sm text-right" value="مجموع المبلغ الكلي">
                    <div class="input-group-btn">
                      <input class="form-control text-primary" readonly value="SDG 100"/>
                    </div>
                  </div>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body table-responsive no-padding">
                {{-- ###########################Abdalrhman################################### --}}
                <form action="" method="GET">
                  @csrf
                  <div class="row">
                    <div class="form-groub col">
                      <label for="" class="col">التاريخ من :
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                </div>
                            </div>
                            <input class="form-control fc-datepicker" name="from" placeholder="MM-DD-YYYY" type="date" >
                        </div>
                    </label>
                      @if ($errors->has('from'))
                      <span class="text-danger">{{ $errors->first('from') }}</span>
                      @endif
                    </div>
        
                    <div class="form-groub col">
                      <label for="" class="col">التاريخ الي : 
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                </div>
                            </div>
                            <input class="form-control fc-datepicker" name="to" placeholder="MM-DD-YYYY" type="date" >
                        </div>
                      </label>
                      @if ($errors->has('to'))
                      <span class="text-danger">{{ $errors->first('to') }}</span>
                      @endif
                    </div>
                    @can('payment_manager')
                      <div class="form-group col">
                        <label for="" class="col">المستخدم</label>
                        <select name="counter" class="form-control" id="">
                          <option value="" selected disabled>--حدد المستخدم--</option>
                          @foreach ($counters as $counter)
                              <option value="{{ $counter->id }}">{{ $counter->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    @endcan

                    <div class="form-groub col">
                      {{-- <input type="text" name="id" value="{{$id}}" hidden> --}}
                      <input type="submit" value="عرض" class="btn btn-primary">
                    </div>
                  </div>
                </form>

                <hr>
                <table id="example1" class="table table-hover">
              <div class="table-responsive">
                  <thead>
                    <tr>
                      <th>التسلسل</th>
                      <th>الرقم الجامعي</th>
                      <th>الاسم</th>
                      <th>الرقم المعاملة</th>
                      <th> تسجيل</th>
                      <th> بطاقات</th>
                      <th>دراسة</th>
                      <th>شهادة</th>
                      <th>إفادة</th>
                      <th>متأخرات</th>
                      <th>أخرى</th>
                      <th>البنك</th>
                      <th>الجملة</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $regSum = 0;
                      $cardSum = 0;
                      $studySum = 0;
                      $certSum = 0;
                      $laterSum = 0;
                      $otherSum = 0;
                      $statmentSum = 0;
                      $i = 1;
                    @endphp
                  {{-- @foreach($payments as $payment)                   
                    <tr class="text-center">
                      <td>{{$i++}}</td>
                      <td>{{$payment->sno}}</td>
                      <td>{{$payment->sname}}</td>
                      <td>{{$payment->uuid}}</td>
                      <td>{{number_format($payment->reg_fees,2)}} </td>
                      @php
                      $regSum += $payment->reg_fees;
                      @endphp
                      <td>{{number_format($payment->card_fees,2)}} </td>
                      @php
                      $cardSum += $payment->card_fees;
                      @endphp
                      <td>{{number_format($payment->study_fees,2)}}</td>
                      @php
                      $studySum += $payment->study_fees;
                      @endphp
                      <td> <span >{{number_format($payment->degree_fees,2)}}</span></td>
                      @php
                      $certSum += $payment->degree_fees;
                      @endphp
                      <td> <span >{{number_format($payment->statment_fees,2)}}</span></td>
                      @php
                      $statmentSum += $payment->statment_fees;
                      @endphp
                      <td><span class="text-danger">{{number_format($payment->latest,2)}}</span></td>
                      @php
                      $laterSum += $payment->latest;
                      @endphp
                      <td>{{number_format($payment->other_fees,2)}}</td>  
                      @php
                      $otherSum += $payment->other_fees;
                      @endphp
                      <td><span class="text-success">{{Auth::user()->name}}</span></td> 
                      <td>{{number_format($payment->total,2)}}</td>  
                    </tr>
                  @endforeach --}}
                </table>
              </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
            <div class="d-flex justify-content-center">
              <div id="printJS-content" class="card card-primary">
                <div class="card-header">
                  <h3>تقرير أورنيك 67 للفترة من {{ 2020 . ' الي ' . 2022}}</h3>
                  <div class="card-tools">
                    <div class="input-group" >
                      <input type="text" disabled class="form-control input-sm text-right" value="البيان / الوصف">
                      <div class="input-group-btn">
                        <input class="form-control text-primary" readonly value="مجموع المبلغ "/>
                      </div>
                    </div>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive no-padding">     
                  <div class="input-group" >
                  <input type="text" disabled class="form-control input-sm text-right" value="مجموع رسوم التسجيل ">
                  <div class="input-group-btn">
                    <input class="form-control text-primary" readonly value="SDG {{number_format($regSum,2)}}"/>
                  </div>
                </div>
                <div class="input-group" >
                  <input type="text" disabled class="form-control input-sm text-right" value="مجموع رسوم البطاقات">
                  <div class="input-group-btn">
                    <input class="form-control text-primary" readonly value="SDG {{number_format($cardSum,2)}}"/>
                  </div>
                </div>
                <div class="input-group" >
                  <input type="text" disabled class="form-control input-sm text-right" value="مجموع رسوم الدراسة">
                  <div class="input-group-btn">
                    <input class="form-control text-primary" readonly value="SDG {{number_format($studySum,2)}}"/>
                  </div>
                </div>
                <div class="input-group" >
                  <input type="text" disabled class="form-control input-sm text-right" value="مجموع رسوم الشهادات">
                  <div class="input-group-btn">
                    <input class="form-control text-primary" readonly value="SDG {{number_format($certSum,2)}}"/>
                  </div>
                </div>
                <div class="input-group" >
                  <input type="text" disabled class="form-control input-sm text-right" value="مجموع رسوم الإفادة">
                  <div class="input-group-btn">
                    <input class="form-control text-primary" readonly value="SDG {{number_format($statmentSum,2)}}"/>
                  </div>
                </div>
                <div class="input-group" >
                  <input type="text" disabled class="form-control input-sm text-right" value="مجموع المتأخرات ">
                  <div class="input-group-btn">
                    <input class="form-control text-danger" readonly value="SDG {{number_format($laterSum,2)}}"/>
                  </div>
                </div>
                <div class="input-group" >
                  <input type="text"  class="form-control input-sm text-right" value="المجموع الكلي">
                  <div class="input-group-btn">
                    <input class="form-control text-primary"  value="SDG 100"/>
                  </div>
                </div>
                <div class="input-group" >
                  <input type="text" disabled class="form-control col-3 input-sm text-right" value="ملاحظات">
                  <input type="text"  class="form-control input-sm text-right" placeholder="ملاحظات">
                  <div class="input-group-btn">
                    <a href="" target="_blank" class="btn btn-main-primary">معاينة قبل الطباعة</a>
                  </div>
                </div>
                </div><!-- /.card-body -->
              </div>  <!-- /.card -->
            </div>
          </div>

        </div>
      </div>
 
    </div>
            </div>
          </div>
@endsection
@section('js')
<script src="{{ asset('assets/js/printThis.js') }}"></script>
<script>
	$('#print').on('click', function(){
		$('#print-erea').printThis();
	});
</script>
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
@endsection