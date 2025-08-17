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


    <style>
        #chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--theme-color);
            color: white;
            padding: 12px;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            z-index: 999;
        }

        #chat-box {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 320px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            font-family: 'Tahoma', sans-serif;
            overflow: hidden;
            z-index: 9999;
        }

        .chat-header {
            background: var(--theme-color);
            color: #fff;
            padding: 10px;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-header button {
            background: none;
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }

        .chat-messages,
        #messages {
            height: 150px;
            overflow-y: auto;
            padding: 10px;
            background: #f8f9fa;
        }

        .chat-input {
            display: flex;
            border-top: 1px solid #ddd;
        }

        .chat-input input {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        .chat-input button {
            background: var(--theme-color);
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        .chat-input button:hover {
                 background: var(--theme-color);
        }

        .chat-footer {
            text-align: center;
            padding: 8px;
            background: #f1f1f1;
            font-size: 13px;
        }

        .chat-footer a {
            {{-- background: var(--theme-color); --}}
            text-decoration: none;
        }

        /* رسائل المستخدم والرد */
        .text-ends {
            text-align: right;
            background: #d1e7ff;
            padding: 8px 10px;
            margin: 5px 0;
            border-radius: 10px 10px 0 10px;
            display: inline-block;
            max-width: 80%;
        }

        .text-starts {
            text-align: left;
            background: #e9ecef;
            padding: 8px 10px;
            margin: 5px 0;
            border-radius: 10px 10px 10px 0;
            display: inline-block;
            max-width: 80%;
        }

        /* الأزرار السريعة */
        #quick-replies {
            padding: 5px 10px;
            border-top: 1px solid #ddd;
            background: #fafafa;
            max-height: 80px;
            overflow-y: auto;
        }

        #quick-replies button {
            border-radius: 20px;
        }

    </style>




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
                            <li><a href="{{ route('frontend.certificate') }}"> تصريح الجمعية </a></li>
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
                    <li class="menu-item-has-children">
                        <a href="#"> التقارير </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('frontend.reports', 'yearly') }}"><span> تقارير سنوية
                                    </span></a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.reports', 'money') }}"><span> تقارير مالية
                                    </span></a>
                            </li>
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
                                <li><i class="fas fa-envelope"></i> <a href="mailto:{{ get_setting('email') }}">{{ get_setting('email') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-xl-auto d-none d-md-block">
                        @auth
                        <a class="user-login" href="{{ route('admin.home') }}"><i class="fas fa-user-circle"></i>
                            لوحة التحكم</a>
                        @else
                        <a class="user-login" href="{{ route('frontend.login') }}"><i class="fas fa-user-circle"></i> مستخدم جديد
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
                            <div class="vs-logo"> <a href="{{ route('frontend.home') }}"><img src="{!! asset(get_setting('logo')) !!}" alt="logo"></a> </div>
                        </div>
                        <div class="col p-0 text-end text-xl-center">
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
                                            <li><a href="{{ route('frontend.certificate') }}"> تصريح الجمعية </a></li>
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
                                    <li class="menu-item-has-children">
                                        <a href="#"> التقارير </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ route('frontend.reports', 'yearly') }}"><span> تقارير سنوية
                                                    </span></a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.reports', 'money') }}"><span> تقارير مالية
                                                    </span></a>
                                            </li>
                                        </ul>
                                    </li>
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
                                <a href="{{ route('frontend.courses') }}" class="vs-btn style4"><i class="fal fa-graduation-cap"></i> الدورات الحالية</a>
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
                                <div class="footer-logo"> <a href="{{ route('frontend.home') }}"><img src="{!! asset(get_setting('logo_footer')) !!}" alt="logo"></a> </div>
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
                            <p class="footer-info"><i class="fal fa-phone-alt"></i><a class="text-inherit" href="tel: {{ get_setting('phone') }}"> {{ get_setting('phone') }}</a></p>
                            <p class="footer-info"><i class="fal fa-envelope"></i><a class="text-inherit" href="mailto:{{ get_setting('email') }}">{{ get_setting('email') }}</a></p>
                            <p class="footer-info"><i class="fa fa-globe"></i><a class="text-inherit" href="mailto:{{ get_setting('website') }}">{{ get_setting('website') }}</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="text-center col-lg-auto">
                        <p class="copyright-text"> <i class="fal fa-copyright"></i> 2025 <a href="{{ route('frontend.home') }}">جمعية عاصم</a>. جميع الحقوق محفوظة <a href="#">تكامل الرؤى</a></p>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {!! NoCaptcha::renderJs(app()->getLocale()) !!}
    <div id="chat-icon">💬</div>
    <div id="chat-box">
        <div class="chat-header">
            <span>خدمة العملاء</span>
            <button id="close-chat">×</button>
        </div>
        <div class="chat-messages" id="chat-messages">
            <div class="bot-msg">👋 أهلاً بك! كيف أقدر أساعدك؟</div>
        </div>
        <div id="messages" class="mb-3"></div>

        <!-- اختيارات سريعة -->
        <div id="quick-replies" class="mb-3"></div>
        <div class="chat-input">
            <input type="text" id="user-input" placeholder="اكتب رسالتك...">
            <button id="send-btn">إرسال</button>
        </div>
        <div class="chat-footer">
            <a href="https://wa.me/{{get_setting('phone')}}" target="_blank">📲 تواصل عبر واتساب</a>
        </div>
    </div>

    <script>
        document.getElementById('chat-icon').onclick = () => {
            document.getElementById('chat-box').style.display = 'block';
        };
        document.getElementById('close-chat').onclick = () => {
            document.getElementById('chat-box').style.display = 'none';
        };
        document.getElementById('send-btn').onclick = sendMessage;
        document.getElementById('user-input').addEventListener('keypress', e => {
            if (e.key === 'Enter') sendMessage();
        });

        function loadQuickReplies() {
            fetch('/api/quick-replies')
                .then(res => res.json())
                .then(data => {
                    let container = document.getElementById('quick-replies');
                    container.innerHTML = '';
                    data.forEach(item => {
                        container.innerHTML += `
                <button class="btn btn-outline-primary btn-sm m-1" onclick="sendQuick('${item.keyword}')">
                    ${item.keyword}
                </button>`;
                    });
                });
        }

        function sendQuick(text) {
            document.getElementById('user-input').value = text;
            sendMessage();
        }

        function sendMessage() {
            let msg = document.getElementById('user-input').value;
            if (!msg) return;

            document.getElementById('messages').innerHTML += `<br><div class="text-ends mb-2"><b>أنت:</b> ${msg}</div>`;

            fetch(`/api/chat-reply?message=${encodeURIComponent(msg)}`)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('messages').innerHTML += `<br><div class="text-starts mb-2"><b>الرد الألي:</b> ${data.reply}</div>`;
                });

            document.getElementById('user-input').value = '';
        }

        loadQuickReplies();

    </script>

</body>

</html>
