@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'تحديد الاحتياجات  ',
    ])

    <!--==============================
                                                    About Area
                                                ==============================-->
    <section class="space-top space-bottom ">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 text-right">

                    <div class="row gx-80 gy-xl-4 mb-4 mb-xl-0">
                        @foreach ($programs as $program)
                            <div class="col-md-6 col-xl-6 wow fadeInUp wow-animated" data-wow-delay="0.2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <div class="media-style4">
                                    <div class="media-icon"><img src="{{$program->image->getUrl()}}}" width="120"
                                            alt=""></div>
                                    <h5 class="media-title">{{$program->title}}</h5>
                                    <p>
                                       {{$program->description}}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
