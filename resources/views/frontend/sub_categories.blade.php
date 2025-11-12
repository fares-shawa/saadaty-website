@extends('frontend.main')

@section('content')
<section class="banner-section-two">
    <div class="auto-container">
        <div class="text-center mb-5">
            <h2 style="color: white; margin-top: 50px">
                كل لحظة في زفافك… نُهديها لمسة من الجمال والرقي
            </h2>
        </div>
    </div>
</section>

<section class="news-two" id="blog">
    <div class="auto-container">
        <div class="row">
            <div class="default-form contact-form">
                <form id="contact-form" novalidate="novalidate">
                    @csrf
                    <div class="row clearfix mt-5 mb-5">
                        <div class="col-lg-4 mt-3 select-wrapper">
                            <select class="form-control-custom" id="city" name="city" required>
                                <option value="jeddah" selected>جدة</option>
                            </select>
                        </div>

                        <div class="col-lg-4 mt-3 select-wrapper">
                            <select class="form-control-custom" name="district" required>
                                @foreach ($districts as $district)
                                    <option value="{{ $district }}">{{ $district }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4 mt-3 search-wrapper">
                            <input class="form-control-custom" type="text" name="search" placeholder="ابحث باسم القاعة">
                        </div>

                        <div class="col-lg-4 mt-3 select-wrapper">
                            <select class="form-control-custom" id="leatest" name="price" required>
                                <option value="highest" selected>من الأعلى إلى الأدنى</option>
                                <option value="lowest">من الأدنى إلى الأعلى</option>
                            </select>
                        </div>

                        <div class="col-lg-4 mt-3 select-wrapper">
                            <select class="form-control-custom" id="new" name="new" required>
                                <option value="new" selected>الأحدث</option>
                                <option value="old">الأقدم</option>
                            </select>
                        </div>

                        <div class="col-lg-4 mt-3 d-flex justify-content-center">
                            <button type="submit" class="theme-btn btn-one">
                                <span class="btn-wrap">
                                    <span class="text-one">تطبيــق</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- initial stores from Laravel -->
            <div id="results" class="row">
                @foreach ($stores as $store)
                    <div class="news-block_two col-lg-4 col-md-6 col-sm-12 mt-3">
                        <div class="news-block_two-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="news-block_two-image">
                                <a href="{{ route('store', ['id' => $store['id']]) }}">
                                    <img src="{{ asset($store['main_image_url']) }}" alt="{{ $store['name'] }}" />
                                </a>
                            </div>
                            <div class="news-block_two-content text-center">
                                <h4 class="news-block_two-title">
                                    <a href="{{ route('store', ['id' => $store['id']]) }}">{{ $store['name'] }}</a>
                                </h4>
                                <h6 class="news-block_two-title" style="font-size:13px;">
                                    جدة - {{ $store['district'] }}
                                </h6>
                                <a href="{{ route('store', ['id' => $store['id']]) }}"
                                   style="display:inline-block; background-color:#F2B100; color:#fff; padding:10px 25px; border-radius:25px; text-decoration:none; margin-top:15px; font-weight:600;">
                                   عــرض التفــاصيل
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const results = document.getElementById('results');
    const apiUrl = 'https://admin.saadatyapp.com/api/search';
    const apiKey = '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0'; // 🟡 Replace this with your actual key

    // Initialize select2
    $('.select2').select2({ placeholder: "اختر" });

    // Fetch results dynamically
    async function fetchResults() {
        const formData = new FormData(form);
        const params = new URLSearchParams(formData).toString();

        try {
            results.innerHTML = '<p class="text-center mt-5">جاري التحميل...</p>';

            const response = await axios.get(`${apiUrl}?${params}`, {
                headers: {
                    'X-API-KEY': '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0',
                    'Accept': 'application/json'
                }
            });

            const data = response.data.data || response.data;
            renderResults(data);

        } catch (error) {
            console.error(error);
            results.innerHTML = '<p class="text-center text-danger mt-5">حدث خطأ أثناء الاتصال بالخادم</p>';
        }
    }

    // Render API results dynamically
    function renderResults(stores) {
        if (!stores || stores.length === 0) {
            results.innerHTML = '<p class="text-center mt-5">لا توجد نتائج مطابقة للبحث</p>';
            return;
        }

        let html = '';
        stores.forEach(store => {
            html += `
                <div class="news-block_two col-lg-4 col-md-6 col-sm-12 mt-3">
                    <div class="news-block_two-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="news-block_two-image">
                            <a href="/store/${store.id}">
                                <img src="${store.main_image_url}" alt="${store.name}" />
                            </a>
                        </div>
                        <div class="news-block_two-content text-center">
                            <h4 class="news-block_two-title">
                                <a href="/store/${store.id}">${store.name}</a>
                            </h4>
                            <h6 class="news-block_two-title" style="font-size:13px;">
                                جدة - ${store.district || ''}
                            </h6>
                            <a href="/store/${store.id}"
                               style="display:inline-block; background-color:#F2B100; color:#fff; padding:10px 25px; border-radius:25px; text-decoration:none; margin-top:15px; font-weight:600;">
                               عــرض التفــاصيل
                            </a>
                        </div>
                    </div>
                </div>
            `;
        });
        results.innerHTML = html;
    }

    // Handle form submit
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        fetchResults();
    });

    // Optional live updates
    form.querySelectorAll('select').forEach(select => {
        select.addEventListener('change', fetchResults);
    });

    let typingTimer;
    const searchInput = form.querySelector('input[name="search"]');
    searchInput.addEventListener('keyup', () => {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(fetchResults, 600);
    });
});
</script>
@endsection
