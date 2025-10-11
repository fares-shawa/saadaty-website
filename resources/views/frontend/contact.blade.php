@extends('frontend.main')

@section('content')

    <!-- Page Title -->
	<section class="banner-section-two" style="background-image:url(assets/images/background/11.jpg)">
		<div class="auto-container">
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<div class="left-box">
					<div class="page-title_big">تواصـــل معنــــا</div>
					<h2 class="page-title_heading">تواصـــل معنــــا</h2>
				</div>
			</div>
		</div>
	</section>
	<!-- End Page Title -->

	<!-- Location One -->
	<section class="location-one" id="contact" style="background-image:url(assets/images/background/5.jpg)">
		<div class="auto-container">

			<div class="row clearfix">
				<!-- Map Column -->
				<div class="location-one_map-column col-lg-8 col-md-12 col-sm-12">
					<div class="sec-title title-anim">
						<!-- <div class="sec-title_title">Get in Touch</div> -->
						<h2 class="sec-title_heading">التواصـــل</h2>
					</div>

					<!-- Contact Form -->
					<div class="contact-form">
						<form method="post" action="https://html.themerange.net/conat/conat/sendemail.php" id="contact-form">
							<div class="row clearfix">

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<input type="text" name="username" placeholder="Your Name" required="">
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<input type="text" name="email" placeholder="Email Address" required="">
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<input type="text" name="phone" placeholder="Phone Number" required="">
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
									<input type="text" name="subject" placeholder="Subject" required="">
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<textarea class="" name="message" placeholder="Your Message"></textarea>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<!-- Button Box -->
									<div class="button-box">
										<button class="btn-style-one theme-btn">
											<div class="btn-wrap">
												<span class="text-one">submit now</span>
												<span class="text-two">submit now</span>
											</div>
										</button>
									</div>
								</div>

							</div>
						</form>
					</div>
					<!-- End Contact Form -->

				</div>
				<!-- Info Column -->
				<div class="location-one_info-column col-lg-4 col-md-12 col-sm-12">
					<div class="sec-title title-anim">
						<!-- <div class="sec-title_title">Contact </div> -->
						<h2 class="sec-title_heading">المعلومــــات</h2>
					</div>
					<!-- Location Info Block -->
					<div class="location-info_block">
						<div class="location-info_block-inner">
							<div class="location-info_block-content">
								<div class="location-info_block-icon flaticon-map"></div>
								<strong>العنوان</strong>
								203 Asfan, Jeddah, KSA
							</div>
						</div>
					</div>

					<!-- Location Info Block -->
					<div class="location-info_block">
						<div class="location-info_block-inner">
							<div class="location-info_block-content">
								<div class="location-info_block-icon flaticon-clock"></div>
								<strong>الوقت</strong>
									9am - 6pm يوميا من
							</div>
						</div>
					</div>

					<!-- Location Info Block -->
					<div class="location-info_block">
						<div class="location-info_block-inner">
							<div class="location-info_block-content">
								<div class="location-info_block-icon flaticon-email-1"></div>
								<strong>الايميل</strong>
								envato@gmail.com
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Location One -->

@endsection
