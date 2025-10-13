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
                    <form method="get" action="#" id="contact-form" novalidate="novalidate">
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
                                <input class="form-control-custom" type="text" name="search" placeholder="ابحث باسم القاعة" required>
                            </div>
                            <div class="col-lg-4 mt-3 select-wrapper">
                                <select class="form-control-custom" id="leatest" name="leatest" required>
                                    <option value="leatest" selected>من الأعلى إلى الأدنى</option>
                                    <option value="lowest">من الأدنى إلى الأعلى</option>
                                </select>
                            </div>
                            <div class="col-lg-4 mt-3 select-wrapper">
                                <select class="form-control-custom" id="new" name="new" required>
                                    <option value="new" selected>الأحدث</option>
                                    <option value="new">الأقدم</option>
                                </select>
                            </div>
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
                @foreach ($stores as $store)
                    <div class="news-block_two col-lg-4 col-md-6 col-sm-12 mt-3">
                        <div class="news-block_two-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="news-block_two-image">
                                <a href="{{ route('store', ['id' => $store['id']]) }}">
                                    <img src="{{ asset($store['main_image_url']) }}" alt="" />
                                </a>
                                <img src="{{ asset($store['main_image_url']) }}" alt=""  />
                            </div>
                            <div class="news-block_two-content text-center">
                                <h4 class="news-block_two-title">
                                    <a href="{{ route('store', ['id' => $store['id']]) }}">{{ $store['name'] }}</a>
                                </h4>
                                <h6 class="news-block_two-title" style="font-size:13px;">
                                    جدة -  {{ $store['district'] }}
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
	</section>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
             $('.select2').select2({ placeholder: "اختر"});
        });
    </script>
@endsection
