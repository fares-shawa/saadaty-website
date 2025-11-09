@extends('frontend.main')
@section('content')
	<section class="banner-section-two">
		<div class="auto-container">
			<div class="text-center mb-5">
			    <h2 style="color: white; margin-top: 50px">كل لحظة في زفافك… نُهديها لمسة من الجمال والرقي</h2>
			</div>
		</div>
	</section>
	<!-- End Page Title -->

	<!-- Sidebar Page Container -->
	<section class="news-two" id="blog">
		<div class="auto-container">
			<div class="row">
				<div class="default-form contact-form">
                   <!-- Search Form -->
<form id="contact-form" novalidate="novalidate">
    <div class="row clearfix mt-5 mb-5">
        <!-- City -->
        <div class="col-lg-4 mt-3 select-wrapper">
            <select class="form-control-custom" id="city" name="city" required>
                <option value="jeddah" selected>جدة</option>
            </select>
        </div>

        <!-- District -->
        <div class="col-lg-4 mt-3 select-wrapper">
            <select class="form-control-custom" name="district" required>
                @foreach ($districts as $district)
                    <option value="{{ $district }}">{{ $district }}</option>
                @endforeach
            </select>
        </div>

        <!-- Search -->
        <div class="col-lg-4 mt-3 search-wrapper">
            <input class="form-control-custom" type="text" name="search" placeholder="ابحث باسم القاعة" required>
        </div>

        <!-- Price -->
        <div class="col-lg-4 mt-3 select-wrapper">
            <select class="form-control-custom" name="price" required>
                <option value="highest" selected>من الأعلى إلى الأدنى</option>
                <option value="lowest">من الأدنى إلى الأعلى</option>
            </select>
        </div>

        <!-- New/Old -->
        <div class="col-lg-4 mt-3 select-wrapper">
            <select class="form-control-custom" name="new" required>
                <option value="new" selected>الأحدث</option>
                <option value="old">الأقدم</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="col-lg-4 mt-3 d-flex justify-content-center">
            <button class="theme-btn btn-one">
                <span class="btn-wrap">
                    <span class="text-one">تطبيــق</span>
                </span>
            </button>
        </div>
    </div>
</form>

                </div>

                <!-- Results Container -->
<div id="results" class="row clearfix"></div>


			</div>
		</div>
	</section>

    <div id="results"></div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
             $('.select2').select2({ placeholder: "اختر"});
        });
    </script>
    <!-- Axios for API Requests -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const results = document.getElementById('results');

    form.addEventListener('submit', async function(e) {
        e.preventDefault(); // Prevent page reload

        // Gather form data
        const formData = new FormData(this);
        const params = new URLSearchParams(formData).toString();

        try {
            // API call with x-api-key
            const response = await axios.get('https://admin.saadatyapp.com/api/search?' + params, {
                headers: {
                    'X-API-KEY': '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0', // Replace with your actual key
                    'Accept': 'application/json'
                }
            });

            const stores = response.data;

            // Clear previous results
            results.innerHTML = '';

            if (stores.length === 0) {
                results.innerHTML = '<p>لا توجد نتائج للبحث.</p>';
                return;
            }

            // Render stores
            stores.forEach(store => {
                const storeHtml = `
                <div class="news-block_two col-lg-4 col-md-6 col-sm-12 mt-3">
                    <div class="news-block_two-inner wow fadeInLeft">
                        <div class="news-block_two-image">
                            <a href="/store/${store.id}">
                                <img src="${store.main_image_url}" alt="" />
                            </a>
                        </div>
                        <div class="news-block_two-content text-center">
                            <h4 class="news-block_two-title">
                                <a href="/store/${store.id}">${store.name}</a>
                            </h4>
                            <h6 class="news-block_two-title" style="font-size:13px;">
                                ${store.city} - ${store.district}
                            </h6>
                            <a href="/store/${store.id}"
                               style="display:inline-block; background-color:#F2B100; color:#fff; padding:10px 25px; border-radius:25px; text-decoration:none; margin-top:15px; font-weight:600;">
                               عــرض التفــاصيل
                            </a>
                        </div>
                    </div>
                </div>`;
                results.insertAdjacentHTML('beforeend', storeHtml);
            });
        } catch (error) {
            console.error(error);
            results.innerHTML = '<p>حدث خطأ أثناء الاتصال بالخادم</p>';
        }
    });
});
</script>

@endsection
