@extends('frontend.main')
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-blog.css') }}" />
@endsection
@section('content')
    <!-- Page Title -->
    <section class="banner-section-two" style="background-image:url({{ asset('assets/images/background/saadaty_banner.png') }})">
    </section>
    <!-- End Page Title -->

    <!-- Speakers Three -->
    <section class="gallery-three" dir="rtl">
        <div class="auto-container">
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb" style="background-color: transparent; font-size: 16px;">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-decoration-none text-dark fw-semibold">
                            الرئيسية
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/stores/{{ $store['category_id'] }}" class="text-decoration-none text-dark fw-semibold">
                            {{ $store['category'] }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active fw-bold" aria-current="page" style="color: #F2B100;">
                        {{ $store['name'] }}
                    </li>
                </ol>
            </nav>
            <div class="sec-title title-anim" style="text-align:right;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    @if($store['logo'] == null)
                        <img src="{{ asset('assets/none2.jpg') }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                    @else
                        <img src="{{ $store['logo'] }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                    @endif
                <div>
                <h2 class="sec-title_heading" style="margin: 0;">{{ $store['name'] }}</h2>
                <div class="sec-title_title">
                    جدة, {{ $store['district'] }}
                    <span style="color: #F2B100"><i class="icon fa fa-map-marker"></i></span>
                </div>
            </div>
        </div><BR />
        <div class="row clearfix mb-5">
            <div class="gallery-wrapper">
                <!-- Main Big Image -->
                <div class="gallery-main">
                    <!-- الصورة الرئيسية تبقى كما هي -->
                    <img id="gallery-trigger" src="{{ $store['main_image'] }}" alt="Main Image"
                        style="cursor:pointer; max-width:100%;max-height:500px;min-width:700px;">

                    <!-- زر عرض الكل -->
                    <a href="#" id="open-gallery" class="see-all-btn">
                        <i class="fa fa-camera"></i> اعرض كل الصور
                    </a>
                </div>
                <!-- Right Side Small Images -->
                <div class="gallery-thumbs">
                    @foreach($media as $item)
                        @if(Str::endsWith($item, '.mp4'))
                            <video width="288px" controls>
                                <source src="{{ $item }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ $item }}" alt="media" style="min-width:300px;/>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <hr style="width: 100%;">
        <div class="row clearfix">
            <!-- Counter Column -->
            <div class="container mb-3" dir="rtl">
                <div class="row justify-content-center">
                    <!-- Price -->
                    <div class="col-xl-3 col-lg-6 col-6 mb-4 d-flex flex-column align-items-center">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <img src="{{ asset('assets/icons/price.png') }}" style="width:30px;">
                            <p class="black-color fw-bold mb-0" style="font-size: 20px;margin-right:10px;">السعر</p>
                        </div>
                        <p class="black-color fw-semibold mb-0 text-center" style="font-size: 17px;">
                            من {{ number_format($store['price_from'], 0) }} إلى {{ number_format($store['price_to'], 0) }}
                        </p>
                    </div>

                    <!-- Experience -->
                    <div class="col-xl-3 col-lg-6 col-6 mb-4 d-flex flex-column align-items-center">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <img src="{{ asset('assets/icons/experience.png') }}" alt="خبرة السنوات" style="width:30px;">
                            <p class="black-color fw-bold mb-0" style="font-size: 20px;margin-right:10px;">خبرة السنوات</p>
                        </div>
                        <p class="black-color fw-semibold mb-0 text-center" style="font-size: 17px;">
                        {{ $store['experience'] }}
                        </p>
                    </div>

                    <!-- Downpayment -->
                    <div class="col-xl-3 col-lg-6 col-6 mb-4 d-flex flex-column align-items-center">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <img src="{{ asset('assets/icons/downpayment.png') }}" alt="العربون" style="width:30px;">
                            <p class="black-color fw-bold mb-0" style="font-size: 20px;margin-right:10px;">العربون</p>
                        </div>
                        <p class="black-color fw-semibold mb-0 text-center" style="font-size: 17px;">
                            @if($store['forward'] == 'no')لا@endif
                            @if($store['forward'] == 'yes')نعم@endif
                        </p>
                    </div>

                    <!-- Team -->
                    <div class="col-xl-3 col-lg-6 col-6 mb-4 d-flex flex-column align-items-center">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <img src="{{ asset('assets/icons/team.png') }}" alt="الفريق" style="width:30px;">
                            <p class="black-color fw-bold mb-0" style="font-size: 20px;margin-right:10px;">الفريق</p>
                        </div>
                        <p class="black-color fw-semibold mb-0 text-center" style="font-size: 17px;">
                            {{ $store['team_size'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-start">
                <hr style="width: 100%;">
                <!-- الوصف -->
                <div class="col-lg-6">
                    <h3 class="section-title">الوصف</h3>
                    <p class="lead" style="text-align:justify;">
                        {{ $store['description'] }}
                    </p>
                </div>

                <div class="col-lg-1"></div>

                <!-- الخريطة -->
                <div class="col-lg-5">
                    <h3 class="section-title">موقعنا الجغرافي</h3>
                    <div class="map-card mb-3">
                        <iframe src="https://www.google.com/maps?q={{$store['location']}}&output=embed" width="100%" height="250" style="border:0;"></iframe>
                    </div>
                    <div class="text-center border p-3 shadow-sm">
                        <p class="mb-1">جدة , {{ $store['district'] }}</p>
                        <a href="https://www.google.com/maps?q={{$store['location']}}" class="map-link" style="color: #F2B100;" target="_blank"><i class="fa fa-location-dot"></i> عرض على الخريطة</a>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt-5">
                <hr style="width: 100%;">
                <div class="col-md-6 mb-4 text-center">
                    <h4 class="fw-bold mb-3">بيانات الاتصال</h4>
                    <p style="font-size: 20px;">
                        <i class="fa fa-user contact-icon me-2"></i>
                        {{ $store['user']['name'] }}
                    </p>
                    @if($store['email'] != null)
                    <p style="font-size: 20px;">
                        <i class="fa fa-envelope contact-icon me-2"></i>
                        {{ $store['email'] }}
                    </p>
                    @endif
                    <p style="font-size: 20px;">
                        <span id="mobile-placeholder" style="cursor:pointer; text-decoration:underline;">
                            <i class="fa fa-phone contact-icon me-2"></i>
                            اضغط هنا
                        </span>
                    </p>
                </div>
                <div class="col-md-6 mb-4  text-center">
                    <h4 class="fw-bold mb-3">تابعونا على:</h4>
                    <div class="social-icons d-flex justify-content-center  gap-3">
                        <a href="{{ Str::startsWith($store['snapchat'], ['http://', 'https://']) ? $store['snapchat'] : 'https://' . $store['snapchat'] }}" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-snapchat"></i>
                        </a>
                        <a href="{{ Str::startsWith($store['twitter'], ['http://', 'https://']) ? $store['twitter'] : 'https://' . $store['twitter'] }}" target="_blank" rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 35px;">
                                <path d="M453.2 112L523.8 112L369.6 288.2L551 528L409 528L297.7 382.6L170.5 528L99.8 528L264.7 339.5L90.8 112L236.4 112L336.9 244.9L453.2 112zM428.4 485.8L467.5 485.8L215.1 152L173.1 152L428.4 485.8z"/>
                            </svg>
                        </a>
                        <a href="{{ Str::startsWith($store['instagram'], ['http://', 'https://']) ? $store['instagram'] : 'https://' . $store['instagram'] }}" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="{{ Str::startsWith($store['instagram'], ['http://', 'https://']) ? $store['instagram'] : 'https://' . $store['instagram'] }}" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="margin-bottom: 40px; width: 80%; margin-left: 10%;">
        <div class="container my-5">
            <div class="row g-4">
                <div class="col-md-6 mb-3">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">الخدمات</h3>
                        <p class="text-muted">اكتشف أفضل الخدمات التي نقدمها لك بطريقة احترافية وبسيطة</p>
                    </div>
                    <div class="row g-3">
                        @foreach ($store['services'] as $Service )
                            <div class="col-12 ">
                                <div class="card shadow-sm h-100 border-0">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="fa-solid fa-star text-warning ms-3" style="font-size: 20px;"></i>
                                        <p class="card-text mb-0 fw-semibold" style="margin-right: 20px;">{{ $Service }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">المرفقات</h3>
                        <p class="text-muted">حمّل الملفات والمرفقات المتعلقة بخدماتنا بسهولة</p>
                    </div>
                    <div class="row g-3">
                        @foreach($store['attachments'] as $file)
                            @php
                                $extension = pathinfo($file, PATHINFO_EXTENSION);
                                $icon = 'fa-solid fa-file text-warning';
                                $color = '#f7c948';
                                switch(strtolower($extension)) {
                                    case 'pdf':
                                        $icon = 'fa-solid fa-file-pdf';
                                        $color = '#f7c948';
                                    break;
                                    case 'xls':
                                    case 'xlsx':
                                        $icon = 'fa-solid fa-file-excel';
                                        $color = '#f7c948';
                                    break;
                                    case 'doc':
                                    case 'docx':
                                        $icon = 'fa-solid fa-file-word';
                                        $color = '#f7c948';
                                    break;
                                }
                            @endphp
                            <div class="col-12">
                                <div class="card shadow-sm border-0 rounded-4">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="{{ $icon }} ms-3" style="font-size: 24px; color: {{ $color }};"></i>
                                        <a href="{{ $file }}" target="_blank" class="fw-semibold text-decoration-none text-dark" style="margin-right: 15px;">
                                            انقر هنا للعرض
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mainImage = @json($store['main_image']);
            const mediaUrls = @json($store['media'] ?? []);
            if (!mediaUrls.includes(mainImage)) {
                mediaUrls.unshift(mainImage);
            }
            const items = mediaUrls.map(url => {
                const ext = (url.split('.').pop() || '').split(/#|\?/)[0].toLowerCase();
                const isVideo = ['mp4', 'webm', 'ogg'].includes(ext);
                return {
                    src: url,
                    type: isVideo ? 'video' : 'image'
                };
            });
            function openGallery(startIndex = 0) {
                if (window.Fancybox && Fancybox.show) {
                    Fancybox.show(items, { startIndex });
                } else {
                    console.warn('Fancybox not loaded. تأكد من إضافة مكتبة Fancybox.');
                }
            }
            const trigger = document.getElementById('gallery-trigger');
            const openBtn = document.getElementById('open-gallery');

            if (trigger) {
                trigger.addEventListener('click', () => openGallery(0));
            }
            if (openBtn) {
                openBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openGallery(0);
                });
            }
        });
    </script>

    <script>
        document.getElementById("mobile-placeholder").addEventListener("click", function () {
            let placeholder = this;
            let userId = {{ $store['user']['id'] }};
            let url = `https://admin.saadatyapp.com/api/getMobile?user_id=${userId}`;

            placeholder.textContent = "جاري التحميل...";

            fetch(url, {
                method: "GET",
                headers: {
                    "X-API-KEY": "8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0",
                    "Accept": "application/json"
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("HTTP error " + response.status);
                }
                return response.json();
            })
            .then(data => {
                let mobile = null;

                // احتمال يرجع Array أو Object
                if (Array.isArray(data) && data.length > 0 && data[0].mobile) {
                    mobile = data[0].mobile;
                } else if (data.mobile) {
                    mobile = data.mobile;
                }

                if (mobile) {
                    placeholder.textContent = mobile;
                    placeholder.style.color = "#000";
                    placeholder.style.cursor = "default";
                    placeholder.style.textDecoration = "none";
                } else {
                    placeholder.textContent = "لم يتم العثور على الرقم";
                }
            })
            .catch(error => {
                console.error("Fetch error:", error);
                placeholder.textContent = "خطأ في تحميل الرقم";
            });
        });
    </script>
@endsection
