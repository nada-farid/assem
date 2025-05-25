@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'عن الجمعية',
        'text' => 'اعتنى الإسلام بالأيتام عناية فائقة فأمر بالإحسان إليهم
                                            ورعايتهم وكفالتهم',
    ])

    <!--==============================
                            About Area
                        ==============================-->
    <section class="space-top ">
        <div class="container">
            <div class="row">

                <div class="col-md-7 col-xl-7 mb-30 mb-xl-0">
                    <div class="title-area mb-3 mb-xl-5">
                        <span class="sec-subtitle">مرحبا بكم</span>
                        <h2 class="sec-title">عن جمعية عاصم لتأهيل وتدريب الايتام</h2>
                    </div>
                    {!! get_setting('description_2') !!}
                </div>

                <div class="col-xl-5 mt-n5 pt-5 pt-xl-0">
                    <div class="img-box3">
                        <div class="img-1 mega-hover"><img class="w-100" src="{{ asset(get_setting('about')) }}"
                                alt="About Img"></div>
                        <div class="shape-dotted jump"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="space-top space-extra-bottom ">
        <div class="container-md">

            <div class="row gx-1px">




                <div class="col-sm-6 col-xl-4 " aria-hidden="true" tabindex="0">
                    <div class="program-style2">
                        <div class="program-icon"><img src="{{asset('frontend/assets/img/icon/vision.png')}}" alt=""></div>
                        <div class="program-content">
                            <h5 class="program-title">الرؤية :</h5>
                            <p class="program-text">{!!get_setting('vision_text') !!}</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4 " aria-hidden="true" tabindex="0">
                    <div class="program-style2">
                        <div class="program-icon"><img src="{{ asset('frontend/assets/img/icon/message.png') }}"
                                alt=""></div>
                        <div class="program-content">
                            <h5 class="program-title">الرسالة :</h5>
                            <p class="program-text">{!! get_setting('mission_text') !!}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4 " aria-hidden="true" tabindex="0">
                    <div class="program-style2">
                        <div class="program-icon"><img src="{{ asset('frontend/assets/img/icon/values.png') }}"
                                alt=""></div>
                        <div class="program-content">
                            <h5 class="program-title">القيم :</h5>
                            <p class="program-text">{!! get_setting('values_text') !!}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!--==============================
                            Team Area
                        ==============================-->
    <section class="space-top space-extra-bottom bg-smoke ltr">
        <div class="container">
            <div class="title-area text-center">
                <div class="sec-icon">
                    <div class="vs-circle"><img src="{{asset('frontend/assets/img/title-icon-smoke.png')}}" /></div>
                </div>
                <span class="sec-subtitle">أعضاء جميعة عاصم للتدريب</span>
                <h2 class="sec-title h1">أعضاء مجلس الإدارة</h2>
            </div>
            <div class="row vs-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2"
                data-sm-slide-show="2" data-center-mode="true">
                @foreach ($directors as $director)
                    <div class="col-sm-6 col-xl-3">
                        <div class="team-style2 text-center">
                            <div class="team-img">
                                <img src="assets/img/team/team-s-3-1.png" class="rounded-circle" alt="member">
                            </div>
                            <div class="team-content text-center">
                                <h4 class="team-name h5"><a href="#">{{ $director->name }}</a></h4>
                                <p class="team-degi text-center mt-10">{{ $director->position }} </p>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!--==============================
                        Call To Action
                        ==============================-->
    <section class="  " data-bg-src="assets/img/bg/divider-bg-1-1.jpg">
        <div class="container">
            <div class="row align-items-center  ">
                <div class="col-lg-5 col-xl-6 space-extra">
                    <h2 class="sec-title text-white mb-3 text-right">أهداف الجمعية</h2>
                    <div class="row gx-60 mb-4 pb-xl-3 text-start justify-content-center justify-content-lg-start">
                        <div class="col-auto col-lg-12 col-xl-auto">
                            <div class="list-style4 vs-list ">
                                <ul class="list-unstyled m-0">
                                    @foreach ($goals as $goal)
                                        <li>
                                            {{ $goal->reason }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-7 col-xl-6 align-self-end">
                    <div class="img-box2">
                        <div class="vs-circle"></div>
                        <img class="img-1" src="{{ asset('frontend/assets/img/about/about-1-2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==============================
                            Brand Area
                        ==============================-->
    <div class="space-top space-bottom">
        <div class="container text-center">
            <span class="sec-subtitle2 ">
                الجمعيات المشاركة
            </span>
            <div class="row ltr vs-carousel wow fadeInUp" data-wow-delay="0.4s" data-slide-show="5" data-lg-slide-show="4"
                data-md-slide-show="3" data-sm-slide-show="2">

                @foreach ($partners as $partner)
                    <div class="col-auto"><img src="{{ $partner->image->getUrl() }}" alt="brand"></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
