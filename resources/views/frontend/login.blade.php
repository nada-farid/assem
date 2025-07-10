@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.breadcrumb', [
'heading' => ' دخول المستخدمين',
'text' => 'اعتنى الإسلام بالأيتام عناية فائقة فأمر بالإحسان إليهم
ورعايتهم وكفالتهم',
])

<!--==============================
                  Login & Register
                ==============================-->
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-60 d-flex justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-style4 login" data-bg-src="{{ asset('frontend/assets/img/bg/course-bg-pattern.jpg') }}">
                        <h2 class="form-title">دخول</h2>
                        <div class="form-group">
                            <input type="text" autocomplete="off" name="email" id="email" placeholder="البريد الإلكتروني">
                        </div>

                        @if ($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                        <div class="form-group">
                            <input type="text" autocomplete="off" name="password" id="password" placeholder="كلمة المرور">
                        </div>

                        @if ($errors->has('password'))
                        <div class="text-danger">
                            {{ $errors->first('password') }}
                        </div>
                        @endif

                        <x-captcha />

                        <div class="row justify-content-between">
                            <div class="col-auto form-group d-flex align-items-center">
                                <input type="checkbox" name="remember" id="rememberlogin">
                                <label for="rememberlogin">تذكرني</label>
                            </div>
                            <div class="col-auto form-group">
                                <a class="forget-link" href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
                            </div>
                        </div>
                        <button type="submit" class="vs-btn">دخول</button>
                        <div class="text-center mt-3">
                            <span>ليس لديك حساب؟</span>
                            <a href="{{ route('frontend.register') }}" class="forget-link fw-bold">سجل الآن</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
