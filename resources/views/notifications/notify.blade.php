@if (session()->has('noData'))
    <script>
        window.onload = function() {
            notif({
                msg: "ليس هنالك تسجيل مفتوح لهذا الطالب !!!",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('success'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم حفظ البيانات بنجاح",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('update'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تعديل البيانات بنجاح",
                type: "warning"
            })
        }
    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم حذف البيانات بنجاح",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('payed'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم السداد لهذا الطالب مسبقا !!!",
                type: "warning"
            })
        }
    </script>
@endif

@if (session()->has('payedIn'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم سداد الرسوم بنجاح",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('faild'))
    <script>
        window.onload = function() {
            notif({
                msg: "البيانات غير صحيحة",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('faild2'))
    <script>
        window.onload = function() {
            notif({
                msg: "البيانات المدخلة ناقصة",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('api_error'))
    <script>
        window.onload = function() {
            notif({
                msg: "يوجد مشكلة في الإتصال مع السيرفر",
                type: "error"
            })
        }
    </script>
@endif