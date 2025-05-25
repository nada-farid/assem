@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => ' الحوكمة',
    ])

    <section class="space background-image" style="background-image: url(&quot;{{asset('frontend/assets/img/bg/course-bg-pattern.jpg')}}&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 m-auto">
                    <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <div class="sec-icon">
                            <div class="vs-circle"><img src="{{ asset('frontend/assets/img/title-icon-smoke.png') }}"></div>
                        </div>
                        <span class="sec-subtitle">الحوكمة</span>
                        <h2 class="sec-title h1">{{ $category->name }}</h2>
                    </div>
                </div>
            </div>
            <div class="row wow fadeInUp wow-animated" data-wow-delay="0.4s"
                style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                @foreach ($files as $file)
                    @if ($file->file)
                        <div class="col-sm-6 col-xl-4">
                            <a href="{{ $file->file->getUrl() }}">
                                <div class="media-style9">
                                    <div class="media-icon"><img src="{{ asset('frontend/assets/img/policies-icon.png') }}"
                                            alt="icon"></div>
                                    <h5 class="media-title">{{ $file->title }}</h5>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>
@endsection