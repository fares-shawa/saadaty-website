<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>

        <meta charset="utf-8" />
        <title>تسجيل الدخول</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/envolve.jpeg') }}">

        <!-- App css -->
        <link href="{{ asset('backend/assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="{{ asset('backend/assets/css/icons-rtl.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Font Awsome -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    </head>

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
        .auth-header {
            background: #ffffff;
            padding: 30px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .logo-img {
            height: 250px;
            width: 250px;
            object-fit: cover;
            border-radius: 50%; /* circular logo */
        }

        .auth-desc {
            font-size: 17px;
            line-height: 1.8;
            color: #444;
            max-width: 500px;
            margin: 0 auto;
        }
        .form-label, .form-check-input , .form-check-label {
            font-size: 16px;
        }

    </style>
    <body class="bg-white">
        <!-- Begin page -->
        <div class="account-page">
            <div class="container-fluid p-0">
                <div class="row align-items-center g-0">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-4 mx-auto">
                                <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                                    <div class="mb-4 p-0">
                                        <div class="text-center">
                                            <a href="{{ url('/login') }}" class="auth-logo d-block">
                                            <img src="{{ asset('backend/assets/images/envolve.jpeg') }}" alt="logo" class="logo-img" />
                                            </a>
                                            <p class="auth-desc">
                                                منصة مشروع أنا اتطور الإلكترونية الخاصة ببيت العز
                                            </p>
                                        </div>
                                    </div>

                                    @session('message')
                                        <div class="alert alert-success">{{ session('message') }}</div>
                                    @endsession
                                    <div class="pt-0">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="emailaddress" class="form-label">الاسم</label><span style="color: red;">*</span>
                                                <input class="form-control" type="text" id="name" name="name" required placeholder="أدخل اسمك">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="form-group mb-3 position-relative">
                                                <label for="password" class="form-label">كلمة المرور</label><span style="color: red;">*</span>
                                                <div class="input-group">
                                                    <input class="form-control" type="password" id="password" name="password" placeholder="أدخل كلمة المرور">
                                                    <button type="button"
                                                            class="btn"
                                                            id="togglePassword"
                                                            style="background-color:#ed4135; border-color:#ed4135; color:#fff;">
                                                        <i class="fa fa-eye-slash"></i>
                                                    </button>
                                                </div>
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group d-flex mb-3">
                                                <div class="col-sm-6">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember"
                                                            style="background-color:#ed4135; border-color:#ed4135;" checked>
                                                        <label class="form-check-label" for="checkbox-signin">تذكرني</label>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-6 text-end">
                                                    <a class='text-muted fs-14' href='auth-recoverpw.html'>Forgot password?</a>
                                                </div> --}}
                                            </div>

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary" type="submit" style="background-color:#ed4135; border-color:#ed4135; font-size: 18px;">
                                                        دخول
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="text-center text-muted mt-3">
                                            <p class="mb-0">لا يوجد لديك حساب؟<a class='ms-2 fw-medium' style="color: #ed4135;" href='{{ route("register") }}'>إنشاء حساب</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-xl-6">
                        <div class="account-page-bg p-md-5 p-4">
                            <div class="text-center">
                                <div class="auth-image" style="max-width: 600px">
                                    <img src="{{ asset('backend/assets/images/baytAlez.jpeg') }}" class="mx-auto img-fluid"  alt="images">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>

        <!-- App js-->
        <script src="{{ asset('backend/assets/js/app.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const passwordInput = document.getElementById("password");
                const togglePassword = document.getElementById("togglePassword");
                const icon = togglePassword.querySelector("i");

                togglePassword.addEventListener("click", function () {
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        icon.classList.remove("fa-eye-slash");
                        icon.classList.add("fa-eye");
                    } else {
                        passwordInput.type = "password";
                        icon.classList.remove("fa-eye");
                        icon.classList.add("fa-eye-slash");
                    }
                });
            });
        </script>
    </body>
</html>
