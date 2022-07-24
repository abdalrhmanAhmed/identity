<section class="navbar-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('asset/images/444.png')}}" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item active"><a class="page-scroll" href="#home">الرئيسية</a></li>
                            <li class="nav-item"><a class="page-scroll" href="#services">الخدمات</a></li>
                            <li class="nav-item"><a class="page-scroll" href="#portfolio">عن الكليات</a></li>
                            <li class="nav-item"><a class="page-scroll" href="#about">بما نتميز</a></li>
                            {{-- <li class="nav-item"><a class="page-scroll" href="#team">فريق لعمل</a></li> --}}
                            <li class="nav-item"><a class="page-scroll" href="#contact">اتصل بنا</a></li>
                        </ul>
                    </div>
                    
                    <div class="navbar-btn d-none d-sm-inline-block">
                        <ul>
                            <li><a class="solid" href="{{ route('login') }}">تسجيل الدخول</a></li>
                        </ul>
                    </div>
                </nav> <!-- navbar -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>