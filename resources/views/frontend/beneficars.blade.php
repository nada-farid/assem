@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'الفئات المستفيدة',
    ])

    <!--==============================
                                About Area
                            ==============================-->
    <section class="space-top space-bottom ">
        <div class="container">
            <div class="row">


                <div class="col-xl-2"></div>

                <div class="col-xl-8 mt-n5 pt-5 pt-xl-0">
                    <div class="img-box3">
                        <div class="img-1 mega-hover"><img class="w-100" src="{{ get_setting('benficiar')}}" alt="About Img">
                        </div>
                        <div class="shape-dotted jump"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
