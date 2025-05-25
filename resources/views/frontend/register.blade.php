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
            <div class="row gx-60">
                <div class="col-lg-6">
                    <form action = "{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-style4 login"
                            data-bg-src="{{ asset('frontend/assets/img/bg/course-bg-pattern.jpg') }}">
                            <h2 class="form-title">دخول</h2>
                            <div class="form-group">
                                <input type="text" autocomplete="off" name="email" id="email"
                                    placeholder="البريد الإلكتروني">
                            </div>

                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="text" autocomplete="off" name="password" id="password"
                                    placeholder="كلمة المرور">
                            </div>

                            @if ($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <div class="row justify-content-between">
                                <div class="col-auto form-group">
                                    <input type="checkbox" name="rememberlogin" id="rememberlogin">
                                    <label for="rememberlogin">تذكرني</label>
                                </div>
                                {{-- <div class="col-auto form-group">
                                <a class="forget-link" href="#">نسيت كلمة المرور؟</a>
                            </div> --}}
                            </div>
                            <button type="submit" class="vs-btn">دخول</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6">
                    <form action="{{ route('association.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-style4 signup"
                            data-bg-src="{{ asset('frontend/assets/img/bg/course-bg-pattern.jpg') }}">
                            <h2 class="form-title">مستخدم جديد</h2>
                            <div class="form-group">
                                <input type="text" autocomplete="off" name="name" id="signupname"
                                    placeholder=" اسم الجمعية" required>
                            </div>
                            <div class="form-group">
                                <input type="text" autocomplete="off" name="email" id="signupemail"
                                    placeholder="البريد الإلكتروني" required>
                            </div>
                            <div class="form-group">
                                <input type="password" required autocomplete="off" name="password" id="signupphone"
                                    placeholder="كلمة المرور">
                            </div>
                            <div class="form-group">
                                <input type="text" autocomplete="off" name="phone" id="signupemail"
                                    placeholder="جوال الجمعية" required>
                            </div>
                            <button type="submit" class="vs-btn mb-2">تسجيل</button>
                            <div class="note">
                                <p>تسجيل الدخول متاح فقط للجمعيات ولا تتم عملية التسجيل إلا بعد الموافقه</p>
                                <p> رجاء تسجيل الدخول الى لوحة التحكم لاستكمال البيانات</p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
