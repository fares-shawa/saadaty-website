@extends('admin.admin_master')

@section('header_styles')
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0"> الملف الشخصي {{ $user->name }}</h4>
                </div>
            </div>
            @session('success')
                <div class="alert alert-success">{{ session('success') }}</div>
            @endsession

            <!-- start row -->
            <!-- Responsive Datatable -->
            <form action="{{ route('profile.update', $user->id) }}" method="POST">
                <div class="row">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="emailaddress" class="form-label">الاسم</label><span style="color: red;">*</span>
                            <input class="form-control" type="text" name="name" value="{{ $user->name }}" required placeholder="أدخل اسمك">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="emailaddress" class="form-label">تاريخ الميلاد</label><span style="color: red;">*</span>
                            <input class="form-control" type="date" name="birthdate" value="{{ $user->birthdate }}" required placeholder="أدخل تاريخ ميلادك">
                            @error('birthdate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="emailaddress" class="form-label">الجنس</label><span style="color: red;">*</span>
                            <select class="selectpicker form-select" name="gender" required>
                                <option value="" disabled selected>اختر الجنس</option>
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>ذكر</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>أنثى</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="learning_methods" class="form-label">أفضل طرق التعلم لدى الطفل</label>
                            <select id="learning_methods" class="form-control" name="learning_methods[]" multiple="multiple">
                                @foreach($options as $value => $label)
                                    <option value="{{ $value }}" @selected(in_array($value, $selected ?? []))>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('learning_methods')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">كلمة المرور</label><span style="color: red;">*</span>
                            <input class="form-control" type="password"  name="password" placeholder="أدخل كلمة المرور">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">مهارات الطفل</label>
                            <textarea name="child_skills" id="" class="form-control" rows="3">
                                {{ old('child_skills', $user->child_skills) }}
                            </textarea>
                                @error('child_skills')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary" style="background-color:#ed4135; border-color:#ed4135;">حفظ</button>
            </form>
            <!-- end row -->


        </div> <!-- container-fluid -->
    </div> <!-- content -->

    @section('footer_scripts')
        <!-- JS (after jQuery) -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#learning_methods').select2({
                    placeholder: "اختر طريقة التعلم",
                    allowClear: true,
                    dir: "rtl",
                    closeOnSelect: false, // keeps dropdown open after selecting one
                    width: '100%'
                });
            });
        </script>
    @endsection

@endsection
