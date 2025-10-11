<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>

        <meta charset="utf-8" />
        <title>إنشاء حساب</title>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
            font-weight: 500
        }

        .toggle-password {
            position: absolute;
            top: 72%;
            left: 0;
            transform: translateY(-50%);
            cursor: pointer;
            color: #fff;
            background-color: #ed4135;
            padding: 7px;
            border-radius: 10%;
        }

    </style>
    <body class="bg-white">
        <!-- Begin page -->
        <div class="account-page">
            <div class="container-fluid p-5">
                <div class="row align-items-center g-0">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-10 mx-auto">
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

                                    <div class="pt-0">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="emailaddress" class="form-label">الاسم</label><span style="color: red;">*</span>
                                                        <input class="form-control" type="text" name="name" required placeholder="أدخل اسمك">
                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="emailaddress" class="form-label">تاريخ الميلاد</label><span style="color: red;">*</span>
                                                        <input class="form-control" type="date" name="birthdate" required placeholder="أدخل تاريخ ميلادك">
                                                        @error('birthdate')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="emailaddress" class="form-label">الجنس</label><span style="color: red;">*</span>
                                                        <select class="selectpicker form-control" name="gender" required>
                                                            <option value="" disabled selected>اختر الجنس</option>
                                                            <option value="male">ذكر</option>
                                                            <option value="female">أنثى</option>
                                                        </select>
                                                        @error('gender')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="emailaddress" class="form-label">أفضل طرق التعلم لدى الطفل</label>
                                                        <select class="selectpicker form-control" multiple data-live-search="true" dir="rtl" name="learning_methods[]">
                                                            <option value="paper">مهام ورقية</option>
                                                            <option value="movement">مهام حركية</option>
                                                            <option value="auditory">مهام سمعية</option>
                                                            <option value="visual">مهام بصرية</option>
                                                            <option value="creative">مهام فكرية وإبداعية</option>
                                                            <option value="imagination">خيال</option>
                                                            <option value="electronic">مهام إلكترونية</option>
                                                            <option value="practical">مهام عملية</option>
                                                        </select>
                                                        @error('learning_methods')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 position-relative">
                                                        <label for="password" class="form-label">كلمة المرور</label><span style="color: red;">*</span>
                                                        <input class="form-control" type="password" required name="password" id="password" placeholder="أدخل كلمة المرور">
                                                        <span class="toggle-password" toggle="#password">
                                                            <i class="fa fa-eye-slash"></i>
                                                        </span>
                                                        @error('password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 position-relative">
                                                        <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label><span style="color: red;">*</span>
                                                        <input class="form-control" type="password" required name="password_confirmation" id="password_confirmation" placeholder="أدخل تأكيد كلمة المرور">
                                                        <span class="toggle-password" toggle="#password_confirmation">
                                                            <i class="fa fa-eye-slash"></i>
                                                        </span>
                                                        @error('password_confirmation')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="password" class="form-label">مهارات الطفل</label>
                                                        <textarea name="child_skills" id="" class="form-control" rows="3">

                                                        </textarea>
                                                         @error('child_skills')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mx-auto mt-4">
                                                <div class="d-grid">
                                                <button class="btn btn-primary" type="submit"
                                                        style="background-color:#ed4135; border-color:#ed4135; font-size: 18px;">
                                                    إنشاء حساب
                                                </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="text-center text-muted m-3">
                                            <p class="mb-0">لديك حساب بالفعل ؟<a class='ms-2 fw-medium' style="color: #ed4135;" href='{{ route("login") }}'>تسجيل الدخول</a></p>
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
            document.querySelectorAll('.toggle-password').forEach(function (element) {
                element.addEventListener('click', function () {
                    let input = document.querySelector(this.getAttribute('toggle'));
                    if (input.type === "password") {
                        input.type = "text";
                        this.querySelector('i').classList.remove("fa-eye-slash");
                        this.querySelector('i').classList.add("fa-eye");
                    } else {
                        input.type = "password";
                        this.querySelector('i').classList.remove("fa-eye");
                        this.querySelector('i').classList.add("fa-eye-slash");
                    }
                });
            });
        </script>

    </body>
</html>
