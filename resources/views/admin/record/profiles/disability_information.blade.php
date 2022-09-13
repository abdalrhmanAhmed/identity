<div class="tab-pane" id="settings">
										
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>رفع ملفات إثبات الإعاقة</h2>
                </div>
                <form action="{{route('Client.store')}}" method="POST" >
                    {{ csrf_field() }}
                    <input id="demo" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
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