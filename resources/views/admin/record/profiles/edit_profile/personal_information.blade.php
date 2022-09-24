<div class="tab-pane active" id="home">
    <h3>البيانات الشخصية</h3>
    <br>
    <section>
        <form action="{{route('Client.store')}}" method="POST" >
            {{ csrf_field() }}
            <input type="hidden" name="pro_id" value="{{$profile->pro_id}}">
            <h5>الإسم رباعي بالعربي</h5>
            <div class="row mg-b-20">
                <div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <input class="form-control form-control mg-b-20" data-parsley-class-handler="#lnWrapper"
                        name="fname_ar"  value="{{ $profileData->full_name_ar }}" type="text">
                </div>
            </div>
            <h5>الإسم رباعي بالإنجليزي</h5>
            <div class="row mg-b-20">
                <div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <input class="form-control form-control mg-b-20" data-parsley-class-handler="#lnWrapper"
                        name="fname_en"  value="{{ $profileData->full_name_en }}" type="text">
                </div>
            </div>


            <div class="row mg-b-20">
                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">الجنس</label>
                    <select name="gender" class="form-control required" searchable="Search here..">
                        <option value="1">ذكر</option>
                        <option value="2" {{$profileData->gender == 2 ?'selected' : ''}}>انثى</option>
                    </select>
                </div>

                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">تاريخ الميلاد</label>
                    <input name=parth_date type="date" value="{{ $profileData->brith_day }}" class="form-control required" >
                </div>
            </div>

            <div class="row mg-b-20">
                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">دولة الميلاد</label>
                    <select name="contry_parth" class="form-control required" searchable="Search here..">
                        <option value="" disabled >دولة الميلاد</option>
                        @foreach($parthPalces as $value)
                            <option value="{{ $value->id }}" {{$value->id == $profileData->contry_place_id ? 'selected' : ''}}>{{ $value->c_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label  class="form-label">الرقم الوطني للأب</label>
                    <input type="number" name="father_id" class="form-control required" value="{{ $profileData->father_national_number }}">
                </div>
            </div>

            <div class="row mg-b-20">
                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">رقم شهادة الميلاد</label>
                    <input name=barth_id type="number" class="form-control required" value="{{ $profileData->brith_certificat_number }}">
                </div>

                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">فصيلة الدم</label>
                    <select name="blood_type" class="form-control required" searchable="Search here..">
                        <option value="" disabled selected>فصيلة الدم</option>
                        @foreach ($bloodTypes as $bloodType)
                            <option value="{{$bloodType->id}}" {{$bloodType->id == $profileData->blood_type_id ? 'selected' : ''}}>{{$bloodType->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="row mg-b-20">
                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">الحالة الإجتماعيه</label>
                    <select name="setuation_type"class="form-control required" searchable="Search here..">
                        <option value="" disabled selected>الحاله الإجتماعيه</option>
                        @foreach ($socialSituations as $socialSituation)
                        <option value="{{$socialSituation->id}}" {{$socialSituation->id == $profileData->social_situation ? 'selected' : ''}}>{{$socialSituation->s_name}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">المهنه</label>
                    <select name="profistional" class="form-control required" searchable="Search here..">
                        <option value="" disabled selected>...</option>
                        @foreach ($professionss as $professions)
                        <option value="{{$professions->id}}" {{$professions->id == $profileData->job_id ? 'selected' : ''}}>{{$professions->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>


            <div class="row mg-b-20">
                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">التصنيف المهني</label>
                    <select name="fild_job" class="form-control required" searchable="Search here..">
                        <option value="" disabled selected>غير مصنف</option>
                        @foreach ($failedjobs as $failedjob)
                        <option value="{{$failedjob->id}}" {{$failedjob->id == $profileData->occupational_classification ? 'selected' : ''}}>{{$failedjob->name}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">المؤهل العلمي</label>
                    <select name="education" class="form-control required" searchable="Search here..">
                        <option value="" disabled selected>لايوجد</option>
                        @foreach ($educations as $education)
                        <option value="{{$education->id}}" {{$education->id == $profileData->qualification ? 'selected' : ''}}>{{$education->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="row mg-b-20">
                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">رقم الهاتف</label>
                    <input name="phone" type="number" class="form-control required" value="{{ $profileData->phone_number }}">
                </div>

                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input name="email" type="email" class="form-control required" value="{{ $profileData->email }}">
                </div>
            </div>


            <div class="row mg-b-20">
                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">الرقم الوطني للأم</label>
                    <input name="mather_id" type="number" class="form-control required" value="{{ $profileData->mother_national_number }}">
                </div>

                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label class="form-label">اسم الأم رباعي</label>
                    <input  name="mother_name" type="text" class="form-control required" value="{{ $profileData->mother_name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-rhgit">
                {{-- <button class="btn btn-main-primary pd-x-20" type="submit">حفظ</button> --}}
                <input type="submit" name="personal_infromation" class="btn btn-main-primary pd-x-20" value="حفظ">
            </div>
        </form>
    </section>
</div>