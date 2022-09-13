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