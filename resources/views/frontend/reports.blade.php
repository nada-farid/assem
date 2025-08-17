@extends('frontend.layouts.main')
@section('content')
@include('frontend.partials.breadcrumb', [
'heading' => ' التقارير',
])

<section class="space background-image" style="background-image: url(&quot;{{asset('frontend/assets/img/bg/course-bg-pattern.jpg')}}&quot;);">
    <div class="container">

        <div class="overflow-hidden space-extra-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="accordion-style3 wow fadeInUp wow-animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="accordion" id="faqVersion1">
                                @foreach ($categories as $cate)
                                <div class="accordion-item">
                                    <div class="accordion-header" id="heading{{$loop->index}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}" aria-expanded="false" aria-controls="collapseOne">{{$cate->name}}</button>
                                    </div>
                                    <div id="collapse{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$loop->index}}" data-bs-parent="#faqVersion1" style="">
                                        <div class="accordion-body">
                                            <div class="row wow fadeInUp wow-animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                                @foreach ($cate->reports as $report)
                                                <div class="col-sm-6 col-xl-3">
                                                    <div class="media-style9">
                                                        <div class="media-icon"><img src="{{asset('frontend/assets/img/policies-icon.png')}}" alt="icon"></div>
                                                        <h5 class="media-title">
                                                            @if ($report->file)
                                                            <a href="{{ $report->file->getUrl() }}">{{ $report->name }} </a>
                                                            @endif</h5>

                                                    </div>
                                                </div>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
