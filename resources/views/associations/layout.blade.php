<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>جمعية عاصم .. لتدريب وتأهيل الأيتام</title>

    <!-- vendor css -->
    <link href="{{ asset('association/lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('association/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('association/lib/typicons.font/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('association/lib/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- azia CSS -->
    <link rel="stylesheet" href="{{ asset('association/css/azia.css') }}">
    <!-------------counter-------------->

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
</head>

<body>

    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="index.html" class="az-logo"><span></span> <img src="img/logo.png" width="200" /></a>
                <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div><!-- az-header-left -->
            <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="index.html" class="az-logo"><span></span> <img src="img/logo.png" width="150" /></a>
                    <a href="" class="close">&times;</a>
                </div><!-- az-header-menu-header -->
                <ul class="nav">
                    <li class="nav-item active show">
                        <a href="{{route('association.home')}}" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>
                            الرئيسية</a>
                    </li>


                    <li class="nav-item">
                        <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> الدورات
                            والطلبات</a>
                        <nav class="az-menu-sub">
                            <a href="{{ route('frontend.courses') }}" class="nav-link">عرض الدورات التدريبية</a>
                            <a href="{{ route('association.courses.add') }}" class="nav-link">طلب الانضمام</a>
                            <a href="{{ route('association.courses.requests') }}" class="nav-link">متابعة الطلبات </a>
                        </nav>
                    </li>

                    <li class="nav-item">
                        <a href="asso_report.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> تقارير
                            وإحصائيات</a>
                    </li>


                </ul>
            </div><!-- az-header-menu -->
            <div class="az-header-right">
                {{-- <div class="az-header-message">
                    <a href="asso_message.html"><i class="typcn typcn-messages"></i></a>
                </div><!-- az-header-message -->
                <div class="dropdown az-header-notification">
                    <a href="" class="new"><i class="typcn typcn-bell"></i></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header mg-b-20 d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                          @php($alertsCount = \Auth::user()->userUserAlerts()->where('read', false)->count())
                             
                        <h6 class="az-notification-title">الأشعارات</h6>
                        <p class="az-notification-text">You have {{$alertsCount}} unread notification</p>
                        <div class="az-notification-list">
                            <div class="media new">
                                <div class="az-img-user"><img src=" img/faces/face2.jpg" alt=""></div>
                                <div class="media-body">
                                    <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                                    <span>Mar 15 12:32pm</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media new">
                                <div class="az-img-user online"><img src=" img/faces/face3.jpg" alt=""></div>
                                <div class="media-body">
                                    <p><strong>Joyce Chua</strong> just created a new blog post</p>
                                    <span>Mar 13 04:16am</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media">
                                <div class="az-img-user"><img src=" img/faces/face4.jpg" alt=""></div>
                                <div class="media-body">
                                    <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                                    <span>Mar 13 02:56am</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media">
                                <div class="az-img-user"><img src=" img/faces/face5.jpg" alt=""></div>
                                <div class="media-body">
                                    <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                                    <span>Mar 12 10:40pm</span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </div><!-- az-notification-list -->
                        <div class="dropdown-footer"><a href="">View All Notifications</a></div>
                    </div><!-- dropdown-menu -->
                </div><!-- az-header-notification --> --}}
                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src=" img/daam.jpg" alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src=" img/daam.jpg" alt="">
                            </div><!-- az-img-user -->
                            <h6> جمعية دعم</h6>
                            <span>لرعاية الأرامل والمطلقات</span>
                        </div><!-- az-header-profile -->

                        <a href="asso_profile.html" class="dropdown-item"><i class="typcn typcn-user-outline"></i>
                            الملف الشخصي</a>
                        <a href="asso_profile_edit.html" class="dropdown-item"><i class="typcn typcn-edit"></i> تعديل
                            البيانات</a>

                        <a href="asso_setting.html" class="dropdown-item"><i class="typcn typcn-cog-outline"></i>
                            إعدادات الحساب</a>
                        <a onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                            class="dropdown-item"><i class="typcn typcn-power-outline"></i>
                            تسجيل الخروج</a>
                        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->
    @yield('content')

    <div class="az-footer ht-40">
        <div class="container ht-100p pd-t-0-f">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> 2025 جمعية عاصم. جميع الحقوق
                محفوظة تكامل الرؤى ©</span>
        </div><!-- container -->
    </div><!-- az-footer -->



    <script src="{{ asset('association/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('association/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('association/lib/ionicons/ionicons.js') }}"></script>
    <script src="{{ asset('association/lib/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('association/js/azia.js') }}"></script>

    <!-------------counter--------->
    <script id="rendered-js">
        const counters = document.querySelectorAll(".counter");

        counters.forEach(counter => {
            counter.innerText = "0";
            const updateCounter = () => {
                const target = +counter.getAttribute("data-target");
                const count = +counter.innerText;
                const increment = target / 200;
                if (count < target) {
                    counter.innerText = `${Math.ceil(count + increment)}`;
                    setTimeout(updateCounter, 1);
                } else counter.innerText = target;
            };
            updateCounter();
        });
        //# sourceURL=pen.js
    </script>
    @yield('scripts')
    @include('sweetalert::alert')

</body>

</html>
