@extends('associations.layout')
@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">مرحبــا، اهلا بعودتك مره اخرى</h2>
                    </div>
                    <div class="az-content-header-right">
                        <div class="media">
                            <div class="media-body">
                                <label>تاريخ بداية الاشتراك</label>
                                <h6>أكتوبر 10, 2023</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->


                        <a href="{{ route('association.courses.add') }}" class="btn btn-purple btn-rounded">إضافة المتدربين
                            الى دورة</a>
                    </div>
                </div><!-- az-dashboard-one-title -->




                <div class="row row-sm">
                    <div class="col-sm-8 col-md-6 col-xl-4 mb-2">
                        <div class="card card-dashboard-five">
                            <div class="az-content-label az-content-label-sm mg-b-15">Solid Color</div>
                            <div class="ht-200 ht-lg-250"><canvas id="chartBar1"></canvas></div>
                        </div>
                    </div><!-- col-6 -->
                    <div class="col-sm-8 col-md-6 col-xl-4 mg-t-20 mg-md-t-0">
                        <div class="card card-dashboard-five">
                            <div class="az-content-label az-content-label-sm mg-b-15">عنوان التقرير</div>
                            <div class="ht-200 ht-lg-250"><canvas id="chartBar2"></canvas></div>
                        </div>
                    </div><!-- col-6 -->
                    <div class="col-sm-8 col-md-6 col-xl-4 mg-t-20 mg-xl-t-0">
                        <div class="card card-dashboard-five">
                            <div class="az-content-label az-content-label-sm mg-b-15">عنوان التقرير</div>
                            <div class="ht-200 ht-lg-250"><canvas id="chartBar3"></canvas></div>
                        </div>
                    </div><!-- col-6 -->
                </div><!-- row -->



                <div class="row">
                    <div class="col-md-4">
                        <div class="counter-container">
                            <i class="fa-solid fa-users"></i>
                            <div class="counter" data-target="600"></div>
                            <span>عدد المتدربين</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter-container">
                            <i class="fa-solid fa-chalkboard"></i>
                            <div class="counter" data-target="30"></div>
                            <span>عدد الدورات التدريبية</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter-container">
                            <i class="fa-regular fa-file"></i>
                            <div class="counter" data-target="16"></div>
                            <span>عدد الطلبات</span>
                        </div>
                    </div>
                </div>


                <div class="row row-sm mg-b-20 mg-lg-b-0">
                    <div class="col-md-12 ">

                        <div class="card card-dashboard-five">
                            <div class="az-content-label az-content-label-sm mg-b-15"> عنوان التقرير</div>

                            <div class="chartjs-wrapper-demo"><canvas id="chartBar4"></canvas></div>


                        </div><!-- row -->
                    </div><!-- col-lg-3 -->


                </div><!-- row -->



            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection
@section('scripts')
    <script src="{{ asset('association/js/chart.chartjs.js') }}"></script>
    <script src="{{ asset('association/js/jquery.cookie.js" type="text/javascript') }}"></script>
@endsection
