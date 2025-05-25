@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'المراكز التدريبيه',
    ])

    <section class="space-top space-bottom ">
        <div class="container">
            <div class="row gx-80 ltr">
                <span class="sec-subtitle2 text-white">المراكز التدريبية المشاركة </span>

                <div class="row ">
                    @foreach ($centers as $center)
                        <div class="col-sm-6 col-xl-3">
                            <div class="team-style2">
                                <div class="team-content">

                                    <div class="team-img">
                                        <img src="{{ $center->logo?->getUrl() }}" alt="member">
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
@endsection
