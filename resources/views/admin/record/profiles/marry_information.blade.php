<div class="tab-pane" id="merid">
    <form action="" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <label for="">رقم الزوج</label>
                <input type="text" name="husband_id" class="form-control" id="">
            </div>
            <div class="col">
                <label for="">إسم الزوج</label>
                <input type="text" name="husband_name" class="form-control" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="">رقم الزوجة</label>
                <input type="text" name="wife_id" class="form-control" id="">
            </div>
            <div class="col">
                <label for="">إسم الزوجة</label>
                <input type="text" name="wife_name" class="form-control" readonly>
            </div>
        </div><br>
        <label for="" class="col-md-12 text-center">المرفقات</label>
        <div class="row ">
            <input class="dropify" type="file" name="marry_files" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <input type="submit" name="marry_information" class="btn btn-main-primary pd-x-20" value="حفظ">
        </div>
    </form>

</div>

@section('js')
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<script>
    $(document).ready(function() {
        $('input[name="husband_id"]').on('keyup', function() {
            alert("hi");
            var husband_id = $(this).val();
            if (husband_id) {
                // $.ajax({
                //     url: "{{ URL::to('husbandName') }}/" + husband_id,
                //     type: "GET",
                //     dataType: "json",
                //     success: function(data) {
                //         $('select[name="dept"]').empty();
                //         $('select[name="dept"]').append('<option selected disabled>إختر من القائمة</option>')
                //         $.each(data, function(key, value) {
                //             $('select[name="dept"]').append('<option value="' +
                //                 key + '">' + value + '</option>');
                //                 console.log(data);
                //         });
                //     },
                // }
                alert("hi");
                );
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
  </script>
@endsection