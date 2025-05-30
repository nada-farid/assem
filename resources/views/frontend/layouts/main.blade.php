<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>جمعية عاصم .. لتدريب وتأهيل الأيتام</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" type="image/x-icon">

    <!--==============================
 Google Fonts
 ============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">


    <!--==============================
 All CSS File
 ============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/app.min.css') }}"> -->
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    @yield('styles')

</head>


<body>


    <!--==============================
       Preloader
    ==============================-->
    <div class="preloader">
        <button class="vs-btn preloaderCls">Cancel Preloader </button>
        <div class="preloader-inner">
            <div class="loader"></div>
        </div>
    </div>
    <!--==============================
      Mobile Menu
    ============================== -->
    <div class="vs-menu-wrapper">
        <div class="vs-menu-area text-center">
            <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ route('frontend.home') }}"><img src="{!! asset(get_setting('logo')) !!}" alt="عاصم"></a>
            </div>
            <div class="vs-mobile-menu">
                <ul>
                    <li> <a href="{{ route('frontend.home') }}"> الرئيسية</a> </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('frontend.about') }}">عن الجمعية</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('frontend.about') }}">عن الجمعية</a></li>
                            <li><a href="{{ route('frontend.structure') }}"> الهيكل الإداري</a></li>
                            <li><a href="{{ route('frontend.needs') }}">تحديد الإحتياج</a></li>
                            <li><a href="{{ route('frontend.beneficars') }}">الفئة المستفيدة </a></li>
                            <li><a href="{{ route('frontend.programs') }}"> البرامج </a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">الحوكمة </a>
                        <ul class="sub-menu">
                            @foreach ($hawkma_categories as $category)
                                <li><a href="{{ route('frontend.hawkma', $category->id) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach


                        </ul>
                    </li>




                    <li><a href="{{ route('frontend.courses') }}"> الدورات التدريبية </a></li>


                    <li><a href="{{ route('frontend.centers') }}"> المراكز التدريبية</a></li>

                    <li class="menu-item-has-children">
                        <a href="#">المركز الإعلامي </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('frontend.news') }}">الأخبار </a></li>


                        </ul>
                    </li>
                    <li><a href="{{ route('frontend.contact') }}">تواصل معنا</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
    Popup Search Box
    ============================== -->
    <div class="popup-search-box d-none d-lg-block  ">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" class="border-theme" placeholder="كلمة البحث">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    <!--==============================
    Header Area
    ==============================-->
    <header class="vs-header header-layout1 ">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-between align-items-center gx-50">
                    <div class="col d-none d-xl-block">
                        <div class="header-links">
                            <ul>
                                <li><i class="fas fa-phone-alt"></i> <a href="tel:{{ get_setting('phone') }}">
                                        {{ get_setting('phone') }}</a></li>
                                <li><i class="fas fa-envelope"></i> <a
                                        href="mailto:{{ get_setting('email') }}">{{ get_setting('email') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-xl-auto d-none d-md-block">
                        @auth
                            <a class="user-login" href="{{ route('association.home') }}"><i class="fas fa-user-circle"></i>
                                لوحة التحكم</a>
                        @else
                            <a class="user-login" href="{{ route('frontend.login-register') }}"><i
                                    class="fas fa-user-circle"></i> مستخدم جديد
                                / دخول</a>
                        @endauth
                    </div>
                    <div class="col-md-auto text-center">
                        <div class="header-social">
                            <a href="{{ get_setting('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ get_setting('twitter') }}"><i class="fab fa-twitter"></i></a>
                            <a href="{{ get_setting('linkedin') }}"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <div class="sticky-active">
                <div class="container position-relative z-index-common">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="vs-logo"> <a href="{{ route('frontend.home') }}"><img
                                       src="{!! asset(get_setting('logo')) !!}" alt="logo"></a> </div>
                        </div>
                        <div class="col text-end text-xl-center">
                            <nav class="main-menu menu-style1 ">
                                <ul>
                                    <li> <a href="{{ route('frontend.home') }}"> الرئيسية</a> </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('frontend.about') }}">عن الجمعية</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('frontend.about') }}">عن الجمعية</a></li>
                                            <li><a href="{{ route('frontend.structure') }}"> الهيكل الإداري</a></li>
                                            <li><a href="{{ route('frontend.needs') }}">تحديد الإحتياج</a></li>
                                            <li><a href="{{ route('frontend.beneficars') }}">الفئة المستفيدة </a></li>
                                            <li><a href="{{ route('frontend.programs') }}"> البرامج </a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">الحوكمة </a>
                                        <ul class="sub-menu">
                                            @foreach ($hawkma_categories as $category)
                                                <li><a
                                                        href="{{ route('frontend.hawkma', $category->id) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>


                                    <li><a href="{{ route('frontend.courses') }}"> الدورات التدريبية </a></li>


                                    <li><a href="{{ route('frontend.centers') }}"> المراكز التدريبية</a></li>

                                    <li class="menu-item-has-children">
                                        <a href="#">المركز الإعلامي </a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('frontend.news') }}">الأخبار </a></li>


                                        </ul>
                                    </li>


                                    <li><a href="{{ route('frontend.contact') }}">تواصل معنا</a></li>
                                </ul>
                            </nav>
                            <button class="vs-menu-toggle "><i class="fal fa-bars"></i></button>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-btns">
                                <button type="button" class="searchBoxTggler"><i class="far fa-search"></i></button>
                                <a href="{{ route('frontend.courses') }}" class="vs-btn style4"><i
                                        class="fal fa-graduation-cap"></i> الدورات الحالية</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')


    <!--==============================
      Footer Area
    ==============================-->
    <footer class="footer-wrappper footer-layout1">

        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <div class="vs-widget-about">
                                <div class="footer-logo"> <a href="{{ route('frontend.home') }}"><img
                                           src="{!! asset(get_setting('logo_footer')) !!}" 
                                            alt="logo"></a> </div>
                                <p class="footer-text">
                                    {!! get_setting('description_2') !!}
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-xl-auto">
                        <div class="widget nav_menu footer-widget">
                            <h3 class="widget_title">روابط سريعة</h3>
                            <div class="menu-all-pages-container footer-menu">
                                <ul class="menu">
                                    <li><a href="{{ route('association.profile.edit') }}">حسابي الشخصي </a></li>
                                    <li><a href="{{ route('frontend.courses') }}">الدورات التدريبية</a></li>
                                    <li><a href="{{ route('frontend.about') }}">عن الجمعية</a></li>
                                    <li><a href="#">الحوكمة والتقارير </a></li>
                                    <li><a href="#">كيف نعمل</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-xl-auto">
                        <div class="widget nav_menu footer-widget">
                            <h3 class="widget_title">روابط اخرى</h3>
                            <div class="menu-all-pages-container footer-menu">
                                <ul class="menu">
                                    <li><a href="{{ route('frontend.contact') }}">اتصل بنا</a></li>
                                    <li><a href="{{ route('frontend.news') }}">الأخبار </a></li>
                                     <li><a href="{{ route('frontend.programs') }}"> البرامج </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget  footer-widget">
                            <h3 class="widget_title">تواصل معنا</h3>
                            <p class="footer-info"><i class="fal fa-phone-alt"></i><a class="text-inherit"
                                    href="tel: {{ get_setting('phone') }}"> {{ get_setting('phone') }}</a></p>
                            <p class="footer-info"><i class="fal fa-envelope"></i><a class="text-inherit"
                                    href="mailto:{{ get_setting('email') }}">{{ get_setting('email') }}</a></p>
                            <p class="footer-info"><i class="fa fa-globe"></i><a class="text-inherit"
                                    href="mailto:{{ get_setting('website') }}">{{ get_setting('website') }}</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="text-center col-lg-auto">
                        <p class="copyright-text"> <i class="fal fa-copyright"></i> 2025 <a
                                href="{{ route('frontend.home') }}">جمعية عاصم</a>. جميع الحقوق محفوظة <a
                                href="#">تكامل الرؤى</a></p>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <div class="social-style1">
                            <a href="{{ get_setting('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ get_setting('twitter') }}"><i class="fab fa-twitter"></i></a>
                            <a href="{{ get_setting('instagram') }}"><i class="fab fa-instagram"></i></a>
                            <a href="{{ get_setting('linkedin') }}"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> <!-- Scroll To Top -->
    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>


    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <!-- <script src="{{ asset('frontend/assets/js/app.min.js') }}"></script> -->
    <!-- Bootstrap -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- Wow.js')}} Animation -->
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    @yield('scripts')
    @include('sweetalert::alert')



</body>

</html>
