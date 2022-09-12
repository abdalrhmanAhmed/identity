@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    اضافة مستخدم    
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                مستخدم</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('notifications.notify')

<!-- row -->
<div class="row">


    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>خطا</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.users.index') }}">رجوع</a>
                    </div>
                </div><br>
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('admin.users.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="">

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label>الإسم : <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                            </div>
                        </div>

                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>كلمة المرور: <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="password" required="" type="password">
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="confirm-password" required="" type="password">
                        </div>
                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label class="form-label">حالة المستخدم <span class="tx-danger">*</span></label>
                            <select name="status" id="select-beast" class="form-control  nice-select  custom-select" data-parsley-class-handler="#lnWrapper" required="">
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            </select>
                        </div>
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label class="form-label">الولاية<span class="tx-danger">*</span></label>
                            <select name="state" id="select-beast" class="form-control  nice-select  custom-select" data-parsley-class-handler="#lnWrapper" required="">
                                @foreach($state as $name => $id)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label class="form-label">المحلية<span class="tx-danger">*</span></label>
                            <select name="loacale" class="form-control">
                                <option selected value="404" readonly>-- المحلية --</option>
                            </select>
                        </div>
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label class="form-label">المركز<span class="tx-danger">*</span></label>
                            <select name="center" class="form-control">
                                <option selected value="404" readonly>-- المركز --</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>  الرقم الوطني : <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20"
                                data-parsley-class-handler="#lnWrapper" name="id_no" required="" type="text">
                        </div>
                    </div>
                    <div class="row mg-b-20">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label"> صلاحية المستخدم</label>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!--  Container closed -->
</div>
<!-- main-content closed -->
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('select[name="state"]').on('change', function() {
            console.log("test");
            var satate = $(this).val();
            if (satate) {
                $.ajax({
                    url: "{{ URL::to('record/getLocal') }}/" + satate,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="loacale"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="loacale"]').append('<option value="' +
                                key + '">' + value + '</option>');
                                console.log(data);
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

    $(document).ready(function() {
        $('select[name="loacale"]').on('click', function() {
            console.log("test");
            var local = $(this).val();
            if (local) {
                $.ajax({
                    url: "{{ URL::to('record/getCenter') }}/" + local,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="center"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="center"]').append('<option value="' +
                                key + '">' + value + '</option>');
                                console.log(data);
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
  </script>
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection