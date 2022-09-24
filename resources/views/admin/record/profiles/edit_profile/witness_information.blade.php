
<div class="tab-pane" id="wins">
    <form action="" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col">
                <label class="form-label">رقم الشاهد الأول الوطني</label>
                <input type="number" name="witness_number_one" class="form-control" id="">
            </div>
            <div class="control-group form-group col">
                <label class="form-label">إسم الشاهد الأول</label>
                <input type="text" name="witness_name_one" id="" class="form-control" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label class="form-label">رقم الشاهد الثاني الوطني</label>
                <input type="number" name="witness_number_tow" class="form-control" id="">
            </div>
            <div class="control-group form-group col">
                <label class="form-label">إسم الشاهد الثاني</label>
                <input type="text" name="witness_name_tow" id="" class="form-control" readonly>
            </div>
        </div>
        <!-- row -->
        <div class="d-flex justify-content-center">
            <input type="submit" name="witness_information" class="btn btn-main-primary pd-x-20" value="حفظ">
        </div>
    <!-- row closed -->
    </form>
    
</div>