<header class="main-header">
    <div class="header-upper">
	    <div class="auto-container">
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<div class="logo-box">
					<div class="logo">
                        <a href="{{ route('home') }}#banner">
                            <img class="logo" src="{{ asset('assets/images/logo-saadaty.png') }}"" alt="Saadati Logo">
                        </a>
                    </div>
				</div>
				<div class="nav-outer">
				    <nav class="main-menu navbar-expand-md">
					    <div class="navbar-header">
						    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
						</div>
						<div class="navbar-collapse scroll-nav collapse clearfix" id="navbarSupportedContent">
							<ul class="navigation clearfix">
                                <li class="active"><a href="{{ route('home') }}#banner"> الرئيسية</a></li>
                                <li><a href="{{ route('home') }}#about">عنـّــــا</a></li>
                                <li><a href="{{ route('home') }}#categories">الفئـــات</a></li>
                                <li><a href="{{ route('home') }}#contact">التواصل</a></li>
                            </ul>
						</div>
					</nav>
				</div>
				<div class="outer-box d-flex align-items-center flex-wrap">
				    <div class="search-box-btn">
                        <a href="https://admin.saadatyapp.com" class="btn btn-default" target="_blank">
                            بوابة تسجيل مزودين الخدمات
                        </a>
                    </div>
					<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
				</div>
			</div>
		</div>
	</div>

	<div class="sticky-header">
		<div class="auto-container">
			<div class="inner-container d-flex justify-content-between align-items-center flex-wrap">
				<!-- Logo -->
				<div class="logo">
					<a href="{{ route('home') }}">
                        <img class="logo" src="{{ asset('assets/images/logo-saadaty.png') }}" alt="Saadaty Logo">
                    </a>
				</div>
				<div class="right-box">
					<nav class="main-menu"></nav>
				</div>

				<div class="outer-box d-flex align-items-center flex-wrap">
					<div class="search-btn">
                        <a href="https://admin.saadatyapp.com" class="btn btn-default" target="_blank">
                            بوابة تسجيل مزودين الخدمات
                        </a>
                    </div>
					<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
				</div>
			</div>
		</div>
	</div>

	<div class="mobile-menu">
		<div class="menu-backdrop"></div>
		<div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
		<nav class="menu-box">
		    <div class="nav-logo">
                <a href="#">
                    <img class="logo" src="{{ asset('assets/images/logo-saadaty.png') }}" alt="Saadaty Logo" />
                </a>
            </div>
			<div class="menu-outer"></div>
		</nav>
	</div><!-- End Mobile Menu -->
</header>
