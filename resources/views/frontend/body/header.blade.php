<header class="main-header">

		<!-- Header Upper -->
		<div class="header-upper">
			<div class="auto-container">
				<div class="d-flex justify-content-between align-items-center flex-wrap">

					<div class="logo-box">
						<div class="logo"><a href="{{ route('home') }}#banner"><img src="{{ asset('assets/images/logo-saadaty.png') }}" width="100px" height="100px" alt="" title=""></a></div>
					</div>

					<div class="nav-outer">
						<!-- Main Menu -->
						<nav class="main-menu navbar-expand-md">
							<div class="navbar-header">
								<!-- Toggle Button -->
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<div class="navbar-collapse scroll-nav collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
                                    <li class="active"><a href="{{ route('home') }}#benner"> الرئيسية</a></li>
                                    <li><a href="{{ route('home') }}#about">عنـّــــا</a></li>
                                    <li><a href="{{ route('home') }}#categories">الفئـــات</a></li>
                                    <li><a href="{{ route('home') }}#contact">التواصل</a></li>
                                </ul>
							</div>
						</nav>
					</div>

					<!-- Main Menu End-->
					<div class="outer-box d-flex align-items-center flex-wrap">

						<!-- Search Btn -->
						<div class="search-box-btn">
                            <a href="https://admin.saadatyapp.com" class="btn btn-default">بوابة تسجيل مزودين الخدمات</a>
                        </div>



						<!-- Mobile Navigation Toggler -->
						<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
					</div>

				</div>
			</div>
		</div>
		<!--End Header Upper-->

		<!-- Sticky Header  -->
		<div class="sticky-header">
			<div class="auto-container">
				<div class="inner-container d-flex justify-content-between align-items-center flex-wrap">

				<!-- Logo -->
				<div class="logo">
					<a href="{{ route('home') }}" title=""><img src="{{ asset('assets/images/logo-saadaty.png') }}" width="100px" height="100px" alt="" title=""></a>
				</div>

				<!-- Right Box -->
				<div class="right-box">
					<!-- Main Menu -->
					<nav class="main-menu">
						<!--Keep This Empty / Menu will come through Javascript-->
					</nav>
					<!-- Main Menu End-->
				</div>

				<!-- Main Menu End-->
				<div class="outer-box d-flex align-items-center flex-wrap">

					<!-- Search Btn -->
					<div class="search-btn">
                        <a href="https://admin.saadatyapp.com" class="btn btn-default">بوابة تسجيل مزودين الخدمات</a>
                    </div>

					<!-- Mobile Navigation Toggler -->
					<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
				</div>

			</div>
		</div><!-- End Sticky Menu -->
		</div>

		<!-- Mobile Menu  -->
		<div class="mobile-menu">
			<div class="menu-backdrop"></div>
			<div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>

			<nav class="menu-box">
				<div class="nav-logo"><a href="index.html"><img src="{{ asset('assets/images/logo-saadaty.png') }}" width="100px" height="100px" alt="" title=""></a></div>
				<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
			</nav>
		</div><!-- End Mobile Menu -->

	</header>
