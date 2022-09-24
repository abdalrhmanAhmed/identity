
<div class="tab-pane" id="settings">
										
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>رفع ملفات إثبات الإعاقة</h2>
                </div>
                <form action="{{route('Client.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="pro_id" value="{{$profile->pro_id}}">
                    {{-- <input id="demo" type="file" name="files[]" class="form-control" multiple> --}}
                    <input type="file" name="files[]" class="form-control" accept=".pdf,.png,.jpg,.jpeg" id="dropify" multiple>
                    <br>
                    <div class="d-flex justify-content-center">
                        <input type="submit" name="disability_information" class="btn btn-main-primary pd-x-20" value="حفظ">
                    </div><br>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- row closed -->
</div>