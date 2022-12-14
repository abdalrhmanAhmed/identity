@php
    if($profile && !$id_information){
        $active = 'active';
    }else{
        $active = '';
    }
@endphp
<div class="tab-pane {{ $active }}" id="profile">
    <h3>بيانات الميلاد و الجنسية و العمل</h3>
    <br>
<section>
    <form action="{{route('Client.store')}}" method="POST" >
        {{ csrf_field() }}
        <input type="hidden" name="pro_id" value="{{$profile->pro_id}}">
        <div class="container form-group">
        <h5>مكان الميلاد</h5>
        <div class="row">
            <div class="col">
                <div class="control-group form-group mb-0">
                    <label class="form-label">الولاية</label>
                    <select class="form-control required" searchable="Search here.." name="state">
                        <option value="" disabled selected>غير مصنف</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{$state->state_name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="control-group form-group">
                    <label class="form-label">الوحدة الإداريه</label>
                    <select class="form-control required" searchable="Search here.." name="admin_unit">
                        <option value="" disabled selected>لايوجد</option>
                        @foreach ($adminstratives as $adminstrative)
                            <option value="{{ $adminstrative->id }}">{{ $adminstrative->adminis_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="control-group form-group">
                    <label class="form-label">المحليه</label>
                    <select class="form-control required" searchable="Search here.." name="locale">
                        <option value="" disabled selected>لايوجد</option>
                        @foreach ($locals as $local)
                            <option value="{{$local->id}}">{{ $local->local_name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <br> --}}
                <div class="control-group form-group">
                    <label class="form-label">الإدارة الشعبيه</label>
                    <select class="form-control required" searchable="Search here.." name="pepuler_unit">
                        <option value="" disabled selected>لايوجد</option>
                        @foreach ($popular_administrations as $popular_administration)
                            <option value="{{ $popular_administration->id }}">{{ $popular_administration->popular_name }}</option>
                        @endforeach
                    </select>
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
                    <select class="form-control required" searchable="Search here.." name="worck_state">
                        <option value="" disabled selected>لايوجد</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{$state->state_name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="control-group form-group">
                    <label class="form-label">الوحدة الإداريه</label>
                    <select class="form-control required" searchable="Search here.." name="worck_admin_unite">
                        <option value="" disabled selected>لايوجد</option>
                        @foreach ($adminstratives as $adminstrative)
                            <option value="{{ $adminstrative->id }}">{{ $adminstrative->adminis_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="control-group form-group">
                    <label class="form-label">المحليه</label>
                    <select class="form-control required" searchable="Search here.." name="worck_state_unit">
                        <option value="" disabled selected>لايوجد</option>
                        @foreach ($locals as $local)
                            <option value="{{$local->id}}">{{ $local->local_name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="control-group form-group">
                    <label class="form-label">الإدارة الشعبيه</label>
                    <select class="form-control required" searchable="Search here.." name="worck_pepuler_ubit">
                        <option value="" disabled selected>لايوجد</option>
                        @foreach ($popular_administrations as $popular_administration)
                            <option value="{{ $popular_administration->id }}">{{ $popular_administration->popular_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="control-group form-group">
            <label class="form-label">مكان العمل</label>
            <input type="text" class="form-control required" placeholder="مكان العمل" name="worck_place">
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
                        <select class="form-control required" name="nationality_type" searchable="Search here..">
                            <option value="" disabled selected>لايوجد</option>
                            <option value="1">بالميلاد</option>
                            <option value="3">بالتجنس</option>
                        </select>
                    </div>
                    <br>
                    <div class="control-group form-group">
                        <label class="form-label">الديانة</label>
                        <select class="form-control required" name="religion" searchable="Search here..">
                            <option value="" disabled selected>لايوجد</option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}">{{ $religion->religion_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="control-group form-group">
                        <label class="form-label">لغة الأم</label>
                        <select class="form-control required" name="mother_lang" searchable="Search here..">
                            <option value="" disabled selected>لايوجد</option>
                            <option value="1">العربية</option>
                        </select>
                    <br>
                    </div>
                    <div class="control-group form-group">
                    <label class="form-label">اسم الأم قبل التجنس</label>
                    <input type="text" name="mother_name_brfore_naturalization" class="form-control required" placeholder="اسم الأم ">
                    </div>                
                </div>
                <div class="col">
                    <div class="control-group form-group">
                    <label class="form-label">رقم التجنس</label>
                    <input type="number" name="nationality_number" class="form-control required" placeholder="رقم التجنس ">

                    </div>
                    <br>
                    <div class="control-group form-group">
                    <label class="form-label">رقم الجنسية القديم</label>
                    <input type="number" name="old_nationality_number" class="form-control required" placeholder="رقم الجنسية القديم">
                    </div>
                    <br>
                    <div class="control-group form-group">
                    <label class="form-label">الاسم قبل التجنس</label>
                    <input type="text" name="name_before_naturalization" class="form-control required" placeholder="الأسم قبل التجنس">
                    </div>
                    <br>
                    <div class="control-group form-group">
                    <label class="form-label">الاسم الأب قبل التجنس</label>
                    <input  type="text" name="father_name_before_naturalization" class="form-control required" placeholder="اسم الأب">
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-rhgit">
            <input type="submit" name="id_information" class="btn btn-main-primary pd-x-20" value="حفظ">
        </div>
    </form>
</section>
</div>
@section('js')
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<script>
    $(document).ready(function(){
        // $("input[name='nationality_type']").val(totalPoints);
        $("select[name='nationality_type']").on('change',function(){
            if($("select[name='nationality_type']").val() == ('1')){
                $("select[name='mother_lang']").hide();
            } 
        });
    });
</script>

@endsection