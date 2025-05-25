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

                <div class="col-md-7 col-xl-7 mb-30 mb-xl-0">
                    <div class="title-area mb-3 mb-xl-5">
                        <span class="sec-subtitle">مرحبا بكم</span>
                        <h2 class="sec-title">كيف تم تحديد الاحتياج ؟</h2>
                    </div>

                    <div class="row gx-60 mb-4 pb-xl-3 text-start justify-content-center justify-content-lg-start">
                        <div class="col-auto col-lg-12 col-xl-auto">
                            <div class="list-style4 vs-list ">
                                <ul class="list-unstyled m-0">
                                    @foreach ($needs as $need)
                                        <li style="color:var(--title-color);">
                                            {{ $need->reason }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-xl-5 mt-n5 pt-5 pt-xl-0">
                    <div class="img-box3">
                        <div class="img-1 mega-hover"><img class="w-100" src="{{asset('frontend/assets/img/about2.png')}}" alt="About Img"></div>
                        <div class="shape-dotted jump"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
