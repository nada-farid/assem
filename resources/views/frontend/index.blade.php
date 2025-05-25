@extends('frontend.layouts.main')

@section('content')
    <!--==============================
                                        Hero Area
                                        ==============================-->
    <section class="hero-layout1 ltr">
        <div class="vs-carousel" data-fade="true" data-arrows="true" data-dots="true">
            @foreach ($sliders as $slider)
                <div>
                    <div class="hero-inner">
                        <div class="hero-bg" data-bg-src="{{ $slider->image->getUrl() }}"></div>
                        <div class="container">
                            <div class="hero-content">
                                <h1 class="hero-title animated">{{ $slider->title }}
                                </h1>
                                <p class="hero-text animated">{{ $slider->sub_title }}</p>
                                <div class="hero-btns animated">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--==============================
                                            Features
                                        ==============================-->
    <section>
        <div class="container">
            <div class="row home-features">


                <div class="col-6 col-lg-3 ">
                    <div class="media-style1">
                        <div class="media-icon"><img src="{{ asset('frontend/assets/img/icon01.png') }}" alt="">
                        </div>
                        <div>
                            <h5 class="media-title">{{ get_setting('count_courses') }}+ </h5>
                            <p>دورة تدريبية</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 ">
                    <div class="media-style1">
                        <div class="media-icon"><img src="{{ asset('frontend/assets/img/icon02.png') }}" alt="">
                        </div>
                        <div>
                            <h5 class="media-title">{{ get_setting('count_benificair') }}+ </h5>
                            <p>مستفيد </p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 ">
                    <div class="media-style1">
                        <div class="media-icon"><img src="{{ asset('frontend/assets/img/icon03.png') }}" alt="">
                        </div>
                        <div>
                            <h5 class="media-title">{{ get_setting('count_centers') }} + </h5>
                            <p>مركز تدريبي </p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 ">
                    <div class="media-style1">
                        <div class="media-icon"><img src="{{ asset('frontend/assets/img/icon04.png') }}" alt="">
                        </div>
                        <div>
                            <h5 class="media-title">{{ get_setting('count_associations') }} + </h5>
                            <p>جمعية خيرية</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--==============================
                                            about
                                        ==============================-->
    @if ($courses->count() > 0)
        <section class="space-top space-extra-bottom ltr">
            <div class="container-lg">
                <div class="title-area text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="sec-icon">
                        <div class="vs-circle"> <img src="{{ asset('frontend/assets/img/title-icon.png') }}" /></div>
                    </div>
                    <span class="sec-subtitle">الدورات التدريبية</span>
                    <h2 class="sec-title">تعرف على احدث الدورات التدريبية المضافة</h2>
                </div>
                <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.4s" data-slide-show="3" data-lg-slide-show="2"
                    data-md-slide-show="2" data-sm-slide-show="2" data-center-mode="true" data-dots="true">
                    @foreach ($courses as $course)
                        <div class="col-sm-6 col-xl-4">
                            <div class="course-style1">
                                <div class="course-img">
                                    <a href="{{ route('frontend.course', $course->id) }}"><img class="w-100"
                                            src="{{ $course->photo?->getUrl() }}" alt="Course Img"></a>
                                    <div class="course-category"><a
                                            href="{{ route('frontend.course', $course->id) }}">{{ $course->category->title }}</a>
                                    </div>
                                    <a href="{{ $course->video_url }}" class="vs-btn style2 popup-video"><i
                                            class="fas fa-play"></i>عرض الدورة </a>
                                </div>
                                <div class="course-content">

                                    <h3 class="h5 course-name"><a
                                            href="{{ route('frontend.course', $course->id) }}">{{ $course->title }} </a>
                                    </h3>
                                    <div class="course-teacher"><a href="{{ route('frontend.center', $course->id) }}l"
                                            class="text-inherit"> بواسطة :
                                            {{ $course->center->name }} </a></div>
                                </div>
                                <div class="course-meta">
                                    <span><i class="fal fa-users"></i>{{ $course->beneficiary_count }} مستفيد</span>
                                    <span><i class="fal fa-clock"></i>{{ $course->duration }} </span>
                                    <span><i class="fal fa-calendar-alt"></i> {{ $course->start_date }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--==============================
                                            About Area
                                        ==============================-->
    <section class="overflow-hidden space-extra-bottom">

        <div class="shape-mockup jump-reverse d-none d-xxxl-block" data-right="7%" data-top="38%">
            <div class="shape-dotted"></div>
        </div>
        <div class="container">

            <div class="row gx-70">
                <div class="col-lg-5 col-xxl-5">
                    <div class="img-box3">
                        <div class="img-1 mega-hover"><img class="w-100" src="{{ asset(get_setting('about')) }}"
                                alt="About Img">
                        </div>
                        <div class="shape-dotted jump"></div>
                    </div>
                </div>
                <div class="col-lg-7 col-xxl-7 align-self-center">
                    <div class=" wow fadeInUp" data-wow-delay="0.3s">
                        <div class="title-area">
                            <div class="sec-icon"><img src="{{ asset('frontend/assets/img/title-icon.png') }}" /></div>
                            <span class="sec-subtitle">من نحن</span>
                            <h2 class="sec-title h1">عن جمعية عاصم لتأهيل وتدريب الايتام</h2>
                        </div>
                    </div>
                    {!! get_setting('description') !!}

                </div>
            </div>
        </div>
    </section>
    <!--==============================
                                            Course Area
                                        ==============================-->
    <!--==============================
                                            Upcoming Events Area
                                        ==============================-->
    @if ($centers->count() > 0)
        <section class="overflow-hidden space-top space-extra-bottom ltr">
            <div class="event-shape1"></div>
            <div class="shape-mockup jump d-none d-xxl-block" data-bottom="26%" data-right="-270px">
                <div class="vs-border-circle"></div>
            </div>
            <div class="container">
                <div class="row gx-80 ltr">
                    <span class="sec-subtitle2 text-white">المراكز التدريبية المشاركة </span>

                    <div class="row vs-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2"
                        data-sm-slide-show="2" data-center-mode="true">
                        @foreach ($centers as $center)
                            <div class="col-sm-6 col-xl-3">
                                <div class="team-style2">
                                    <div class="team-content">

                                        <div class="team-img">
                                            <img src="{{ $center->image?->getUrl() }}" alt="member">
                                        </div>

                                        <h4 class="team-name h5"><a
                                                href="{{ route('frontend.center', $center->id) }}">{{ $center->name }}</a>
                                        </h4>
                                        <p class="team-degi">{{ $center->specialization }}</p>
                                        <span class="team-courses">تم تدريب {{ $center->beneficiar_count }} مستفيد</span>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif


    <!--==============================
                                            Brand Area
                                        ==============================-->
    @if ($partners->count() > 0)
        <div class="space-bottom space-top ltr">
            <div class="container text-center">
                <span class="sec-subtitle2">الجمعيات المشاركة </span>
                <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.4s" data-slide-show="5"
                    data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">

                    @foreach ($partners as $partner)
                        <div class="col-auto"><img src="{{ $partner->image->getUrl() }}" alt="brand"></div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
