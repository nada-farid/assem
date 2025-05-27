@extends('frontend.layouts.main')
@section('content')
    <!--==============================
                                    Course Area
                                ==============================-->
    @include('frontend.partials.breadcrumb', [
        'heading' => 'المراكز التدريبية',
        'text' => $center->title,
    ])

    <!--==============================
                Team Area
            ==============================-->
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row justif`y-content-center align-items-center gx-80 mb-lg-4 pb-3">
                <div class="col-lg-5 col-xl-auto order-lg-2 mb-4 mb-lg-0 pb-2 pb-lg-0">
                    <div class="img-box1 style3">
                        <div class="vs-circle">
                            <div class="mega-hover">
                                <img src="{{ $center->image->getUrl() }}" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl order-lg-1 mb-4 mb-md-0">
                    <div class="team-details">
                        <h2 class="team-name h2"> {{ $center->name }} </h2>
                        <p class="team-degi">{{ $center->specialization }}</p>
                        <span class="team-courses">تم تدريب {{ $center->beneficiar_count }} مستفيد</span>
                        <p class="team-experi">{{ $center->experience_years }}+ سنوات من الخبرة</p>
                        <div class="team-review"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="social-style2">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <h2 class="border-title2 mb-4">نبذة عن المركز</h2>
            {!! $center->description !!}
        </div>
    </section>
    <!--==============================
                Course Area
            ==============================-->
    <section class="space-top space-extra-bottom " data-bg-src="{{asset(
    'frontend/assets/img/bg/course-bg-pattern.jpg')}}">
        <div class="container">
            <div class="title-area text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="sec-icon">
                    <div class="vs-circle"><img src="{{asset('frontend/assets/img/title-icon-smoke.png')}}"> </div>
                </div>
                <h2 class="sec-title">أكتشف الدورات التدريبيه الخاصة بالمركز</h2>
            </div>
            <div class="row vs-carousel ltr" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2">


                @foreach ($center->courses as $course)
                    <div class="col-sm-6 col-xl-4">
                        <div class="course-style1">
                            <div class="course-img">
                                <a href="{{ route('frontend.course', $course->id) }}"><img class="w-100"
                                        src="{{ $course->photo->getUrl() }}" alt="Course Img"></a>
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
@endsection
