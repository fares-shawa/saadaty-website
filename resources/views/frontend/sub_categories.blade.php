@extends('frontend.main')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
@endsection
@section('content')
<style>

/* wrapper similar to .form-control-custom */
.select2-container--default .select2-selection--single {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: auto;
    padding: 13px 2.5rem 1rem .75rem; /* مساحة إضافية للسهم */
    border: 1px solid #ced4da;
    border-radius: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 15px rgba(11, 11, 11, 0.15);
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

/* text centered */
.select2-container--default .select2-selection__rendered {
    text-align: center;
    color: #495057;
    font-size: 1rem;
    line-height: 1.5;
}

/* hide default arrow */
.select2-container--default .select2-selection__arrow b {
    display: none;
}

/* custom thin gold arrow */
.select2-container--default .select2-selection__arrow::after {
    content: '';
    position: absolute;
    right: 1.5rem;
    top: 100%;
    width: 0.6rem;
    height: 0.35rem;
    transform: translateY(-50%) rotate(45deg);
    border-right: 2px solid #F2B100;
    border-bottom: 2px solid #F2B100;
    pointer-events: none;
}

/* focus effect */
.select2-container--default.select2-container--focus .select2-selection--single {
    border-color: #F2B100;
    box-shadow: 0 0 0 .2rem rgba(242,177,0,.25);
    outline: none;
}

/* dropdown list style */
.select2-container--default .select2-results__option {
    text-align: center;
    padding: .75rem;
}

</style>
    <!-- Page Title -->
	<section class="banner-section-two" style="background-image:url({{ asset('assets/images/background/stores_banner.png') }})">
		<div class="auto-container">
			<div class="text-center mb-5">
					<h2 style="color: white; margin-top: 50px">كل لحظة في زفافك… نُهديها لمسة من الجمال والرقي</h2>
			</div>
            {{-- <div class="about-one_button" style="text-align: center;">
                <a href="{{ route('home') }}#contact" class="theme-btn btn-style-one">
                    <span class="btn-wrap">
                        <span class="text-one" style="font-size: 18px; color: white;">تواصل معنا</span>
                        <span class="text-two" style="font-size: 18px; color: white;">تواصل معنا</span>
                    </span>
                </a>
            </div> --}}
		</div>
	</section>
	<!-- End Page Title -->

	<!-- Sidebar Page Container -->
	<section class="news-two" id="blog">
		<div class="auto-container">
			<div class="row clearfix">
				<div class="default-form contact-form">
                    <form method="post" action="#" id="contact-form" novalidate="novalidate">
                        <div class="row clearfix mt-5 mb-5">

                            <div class="col-lg-4 mt-3 select-wrapper">
                                <select class="form-control-custom" id="city" name="city" required>
                                    <option value="jeddah" selected>جدة</option>
                                </select>
                            </div>

                            <div class="col-lg-4 mt-3 select-wrapper">
                                <select class="form-control-custom select2" name="district" required>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district }}">{{ $district }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 mt-3 search-wrapper">
                                <input type="search" name="search-field" placeholder="البحــث..." required>
                                <button type="submit">
                                    <span class="icon fa fa-search"></span>
                                </button>
                            </div>

                            <div class="col-lg-4 mt-3 select-wrapper">
                                <select class="form-control-custom" id="leatest" name="leatest" required>
                                    <option value="leatest" selected>من الأعلى إلى الأدنى</option>
                                    <option value="leatest">من الأدنى إلى الأعلى</option>
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

				<!-- News Block -->
                @foreach ($stores as $store)
                    <div class="news-block_two col-lg-3 col-md-6 col-sm-12 mt-3">
                        <div class="news-block_two-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">

                            <div class="news-block_two-image">
                                <a href="{{ route('store', ['id' => $store['id']]) }}"><img src="{{ asset($store['main_image_url']) }}" alt="" /></a>
                                <img src="{{ asset($store['main_image_url']) }}" alt=""  />
                            </div>
                            <div class="news-block_two-content text-center">
                                <h4 class="news-block_two-title"><a href="{{ route('store', ['id' => $store['id']]) }}">{{ $store['name'] }}</a></h4>
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
             $('.select2').select2({ placeholder: "اختر", allowClear: true });
        });
    </script>
@endsection
