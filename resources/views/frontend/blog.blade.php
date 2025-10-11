@extends('frontend.main')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
@endsection
@section('content')

<style>
    .breadcrumb a {
        transition: color 0.3s ease;
    }

    .breadcrumb a:hover {
        color: #F2B100;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: "/";
        color: #999;
        padding: 0 5px;
    }

.gallery-wrapper {
    display: flex;
    gap: 15px;
}

    .gallery-main {
        position: relative;
        flex: 1;
    }

    .gallery-main img {
        width: 100%;
        height: 100%;
        border-radius: 20px;
        object-fit: cover;
    }

    .see-all-btn {
        position: absolute;
        bottom: 20px;
        right: 20px;
        background: #F2B100;
        border-radius: 10px;
        padding: 8px 15px;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        color: #fff;
        box-shadow: 0px 3px 6px rgba(0,0,0,0.2);
    }

    .gallery-thumbs {
        flex: 1;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 15px;
    }

    .gallery-thumbs img, .gallery-thumbs video {
        width: 100%;
        height: 100%;
        border-radius: 15px;
        object-fit: cover;
    }

	.author-box {
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 15px 16px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }

    .author-box .author-text {
        font-size: 15px;
        color: #333;
    }

	.banner-section-two {
		padding: 0px 0px 120px;
	}
	.gallery-three {
		padding: 50px 0px 10px;
	}
    .social-title {
        font-size: 1.1rem;
        margin-bottom: 12px;
        font-weight: bold;
        text-align: right;
    }

    .social-box {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 12px;
        justify-content: flex-end;
    }

    .social-box li {
        display: inline-block;
    }

    .social-box a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #f1f1f1;
        color: #555;
        font-size: 18px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-box a:hover {
        color: #fff;
        transform: translateY(-4px);
    }

    .gm-style .review-box {
        display: none;
    }

    /* Custom colors per network */
    .social-box a.twitter:hover   { background: #1da1f2; }
    .social-box a.snapchat:hover  { background: #fffc00; color: #000; }
    .social-box a.dribbble:hover  { background: #ea4c89; }

    .section-title {
      font-weight: 700;
      font-size: 1.5rem;
      margin-bottom: 1rem;
      padding-left: 10px;
      text-align: center
    }
    .map-card {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .info-card {
      background: #fff;
      border-radius: 15px;
      padding: 1.5rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .social-icons i {
      font-size: 2.5rem;
      gap: 20px;
      margin: 0 10px;
      color: #000;
      transition: 0.3s;
      cursor: pointer;
    }
    .social-icons i:hover {
      color: #f7c948;
      transform: translateY(-3px);
    }

    .social-icons svg {
      font-size: 2.5rem;
      gap: 20px;
      margin: 0 10px;
      color: #000;
      transition: 0.3s;
      cursor: pointer;
    }
    .social-icons svg:hover {
      color: #f7c948;
      transform: translateY(-3px);
    }

    .contact-icon {
      color: #f7c948;
      margin-left: 8px;
      font-size: 25px;
    }
    .map-link {
      color: #000;
      font-weight: 500;
      text-decoration: none;
    }
    .map-link:hover {
      text-decoration: underline;
    }
</style>

    <!-- Page Title -->
    <section class="banner-section-two" style="background-image:url({{ asset('assets/images/background/saadaty_banner.png') }})">

    </section>
    <!-- End Page Title -->

    <!-- Speakers Three -->
    <section class="gallery-three">
        <div class="auto-container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" dir="rtl" class="mb-3">
                <ol class="breadcrumb" style="background-color: transparent; font-size: 16px;">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-decoration-none text-dark fw-semibold">
                            الرئيسية
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}#categories" class="text-decoration-none text-dark fw-semibold">
                            القاعات
                        </a>
                    </li>
                    <li class="breadcrumb-item active fw-bold" aria-current="page" style="color: #F2B100;">
                        {{ $store['name'] }}
                    </li>
                </ol>
            </nav>
            <div class="sec-title title-anim">
                <h2 class="sec-title_heading">{{ $store['name'] }}</h2>
                <div class="sec-title_title">
                    {{ $store['city'] }}, {{ $store['district'] }}
                    <span style="color: #F2B100"><i class="icon fa fa-map-marker"></i></span>
                </div>
            </div>
            <div class="row clearfix mb-5">
                <div class="gallery-wrapper">
                    <!-- Right Side Small Images -->
                    <div class="gallery-thumbs">
                        @foreach($media as $item)
                            @if(Str::endsWith($item, '.mp4'))
                                <video width="288px" controls>
                                    <source src="{{ $item }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <img src="{{ $item }}" alt="media" />
                            @endif
                        @endforeach
                    </div>

                    <!-- Main Big Image -->
                    <div class="gallery-main">
                        <!-- الصورة الرئيسية تبقى كما هي -->
                        <img id="gallery-trigger" src="{{ $store['main_image'] }}" alt="Main Image"
                            style="cursor:pointer; max-width:100%;">

                        <!-- زر عرض الكل -->
                        <a href="#" id="open-gallery" class="see-all-btn">
                            <i class="fa fa-camera"></i> اعرض كل الصور
                        </a>
                    </div>
                </div>
            </div>
            <hr style="margin-bottom: 40px; width: 80%; margin-left: 10%;">
            <div class="row clearfix">
                <!-- Counter Column -->
                <div class="container mb-3" dir="rtl">
                    <div class="d-flex justify-content-between row-gap-3 flex-md-row flex-lg-nowrap flex-md-wrap flex-column">
                        <div class="text-center">
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <p class="black-color mb-0 fw-bold" style="font-size: 20px; margin-right: 15px;">السعر</p>
                                <div class="feature-block_one-icon">
                                    <i class="flaticon-money-bag"></i>
                                </div>
                            </div>
                            <p class="black-color mb-0 fw-semibold" style="font-size: 20px;">من {{ $store['price_from'] }} إلى {{ $store['price_to'] }}</p>
                        </div>
                        <div class="text-center">
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <p class="black-color mb-0 fw-bold" style="font-size: 20px; margin-right: 15px;">خبرة السنوات</p>
                                <div class="feature-block_one-icon">
                                    <i class="flaticon-digital-learning"></i>
                                </div>
                            </div>
                            <p class="black-color mb-0 fw-semibold" style="font-size: 20px">{{ $store['experience'] }} +</p>
                        </div>
                        <div class="text-center">
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <p class="black-color mb-0 fw-bold" style="font-size: 20px; margin-right: 15px;">العربون</p>
                                <div class="feature-block_one-icon">
                                    <i class="flaticon-policy"></i>
                                </div>
                            </div>
                            <p class="black-color mb-0 fw-semibold" style="font-size: 20px">{{ $store['forward'] }}</p>
                        </div>
                        <div class="text-center">
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <p class="black-color mb-0 fw-bold" style="font-size: 20px; margin-right: 15px;">الفريق</p>
                                <div class="feature-block_one-icon">
                                    <i class="flaticon-conversation-1"></i>
                                </div>
                            </div>
                            <p class="black-color mb-0 fw-semibold" style="font-size: 20px">{{ $store['team_size'] }} +</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row align-items-start g-4">
                <!-- الوصف -->
                <div class="col-lg-6">
                    <h3 class="section-title">الوصف</h3>
                    <p class="lead text-center">
                         {{ $store['description'] }}
                    </p>
                </div>

                <div class="col-lg-1">

                </div>

                <!-- الخريطة -->
                <div class="col-lg-5">
                    <h3 class="section-title">استكشف المنطقة</h3>
                    <div class="map-card mb-3">
                        <iframe src="https://www.google.com/maps?q=Jeddah%20Corniche&output=embed" width="100%" height="250" style="border:0;"></iframe>
                    </div>
                    <div class="text-center border p-3 shadow-sm">
                        <p class="mb-1">{{ $store['city'] }}, {{ $store['district'] }}</p>
                        <a href="#" class="map-link" style="color: #F2B100;"><i class="fa fa-location-dot"></i> عرض على الخريطة</a>
                    </div>
                </div>
            </div>

            <div class="row g-5 mt-5">
                <!-- بيانات الاتصال -->
                <div class="col-md-6 text-center">
                <h4 class="fw-bold mb-3">بيانات الاتصال</h4>
                <p style="font-size: 20px;"> {{ $store['user']['name'] }}<i class="fa fa-user contact-icon"></i></p>
                <p style="font-size: 20px;"> {{ $store['email'] }} <i class="fa fa-envelope contact-icon"></i></p>
                <p style="font-size: 20px;"><span id="mobile-placeholder" style="cursor:pointer; text-decoration:underline;">
                        اضغط هنا
                    </span><i class="fa fa-phone contact-icon"></i>
                </p>
                </div>

                <!-- تابعونا -->
                <div class="col-md-6 text-md-end text-center">
                    <h4 class="fw-bold mb-3">: تابعونا على</h4>
                    <div class="social-icons">
                        <a href="{{ $store['snapchat'] }}" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-snapchat"></i>
                        </a>
                        <a href="{{ $store['twitter'] }}" target="_blank" rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 35px;"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M453.2 112L523.8 112L369.6 288.2L551 528L409 528L297.7 382.6L170.5 528L99.8 528L264.7 339.5L90.8 112L236.4 112L336.9 244.9L453.2 112zM428.4 485.8L467.5 485.8L215.1 152L173.1 152L428.4 485.8z"/></svg>
                        </a>
                        <a href="{{ $store['instagram'] }}" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="margin-bottom: 40px; width: 80%; margin-left: 10%;">
       <div class="container my-5">
            <div class="row g-4">

                <!-- عمود الخدمات -->
                <div class="col-md-6 mb-3">
                    <!-- Section Title -->
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">الخدمات</h3>
                        <p class="text-muted">اكتشف أفضل الخدمات التي نقدمها لك بطريقة احترافية وبسيطة</p>
                    </div>

                    <div class="row g-3">
                        <!-- Services -->
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

                <!-- عمود المرفقات -->
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
            // الجلب الآمن للروابط من الجانب الخادمي
            const mainImage = @json($store['main_image']);
            const mediaUrls = @json($store['media'] ?? []);

            // ضم الصورة الرئيسية إلى قائمة الوسائط إذا لم تكن موجودة
            if (!mediaUrls.includes(mainImage)) {
                mediaUrls.unshift(mainImage);
            }

            // بناء عناصر المعرض مع كشف امتداد الملف لتحديد نوعه
            const items = mediaUrls.map(url => {
                const ext = (url.split('.').pop() || '').split(/#|\?/)[0].toLowerCase();
                const isVideo = ['mp4', 'webm', 'ogg'].includes(ext);
                return {
                    src: url,
                    type: isVideo ? 'video' : 'image'
                };
            });

            // دالة لفتح المعرض برمجياً
            function openGallery(startIndex = 0) {
                if (window.Fancybox && Fancybox.show) {
                    Fancybox.show(items, { startIndex });
                } else {
                    console.warn('Fancybox not loaded. تأكد من إضافة مكتبة Fancybox.');
                }
            }

            // إرفاق حدث للنقر على الصورة الرئيسية وزر "اعرض كل الصور"
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
